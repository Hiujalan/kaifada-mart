<?php

namespace app\controllers;

use app\models\Barang;
use app\models\DetailPemasokan;
use app\models\Pemasok;
use Yii;
use app\models\Pemasokan;
use app\models\PemasokanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PemasokanController implements the CRUD actions for Pemasokan model.
 */
class PemasokanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pemasokan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemasokanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->view->params['activeMenu'] = 'Pemasokan';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dt_pemasokan' => Pemasokan::find()->joinWith('pemasok')->all(),
        ]);
    }

    /**
     * Displays a single Pemasokan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Pemasokan::find()
            ->with('detailPemasokans.kodeBarang')
            ->where(['id_pemasokan' => $id])
            ->one();

        if ($model === null) {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Pemasokan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pemasokan();
        $detailModel = new DetailPemasokan();

        if ($model->load(Yii::$app->request->post()) && $detailModel->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save();

                $detailModel->id_pemasokan = $model->id_pemasokan;
                $detailModel->save();

                $barang = Barang::findOne($detailModel->kode_barang);
                $barang->stok_barang += $detailModel->jumlah_barang;
                $barang->save();

                $transaction->commit();

                Yii::$app->session->setFlash('success', 'Pemasokan berhasil dilakukan!');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat menyimpan pemasokan.');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'detailModel' => $detailModel,
            'dt_pemasok' => ArrayHelper::map(Pemasok::find()->all(), 'id_pemasok', 'nama_pemasok'),
        ]);
    }

    /**
     * Updates an existing Pemasokan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $detailModel = $model->detailPemasokans[0] ?? new DetailPemasokan();

        if ($model === null || $detailModel === null) {
            throw new NotFoundHttpException('Data pemasokan tidak ditemukan.');
        }

        $stokAwal = $detailModel->jumlah_barang;
        $barangAwal = $detailModel->kode_barang;

        if ($model->load(Yii::$app->request->post()) && $detailModel->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save();

                $detailModel->id_pemasokan = $model->id_pemasokan;
                $detailModel->save();

                $barang = Barang::findOne($barangAwal);
                if ($barang) {
                    $barang->stok_barang -= $stokAwal;
                    $barang->save();
                }

                $barangBaru = Barang::findOne($detailModel->kode_barang);
                if ($barangBaru) {
                    $barangBaru->stok_barang += $detailModel->jumlah_barang;
                    $barangBaru->save();
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Pemasokan berhasil diperbarui!');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat memperbarui pemasokan.');
            }
        }




        return $this->render('update', [
            'model' => $model,
            'detailModel' => $detailModel,
            'dt_pemasok' => ArrayHelper::map(Pemasok::find()->all(), 'id_pemasok', 'nama_pemasok'),
        ]);
    }

    /**
     * Deletes an existing Pemasokan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model === null) {
            throw new NotFoundHttpException('Data pemasokan tidak ditemukan.');
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            $detailPemasokan = $model->detailPemasokans;

            // Kembalikan stok barang
            foreach ($detailPemasokan as $detail) {
                $barang = Barang::findOne($detail->kode_barang);
                if ($barang) {
                    $barang->stok_barang -= $detail->jumlah_barang;
                    $barang->save(false);
                }
            }

            foreach ($detailPemasokan as $detail) {
                $detail->delete();
            }

            $model->delete();

            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Data pemasokan berhasil dihapus.');
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pemasokan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pemasokan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemasokan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
