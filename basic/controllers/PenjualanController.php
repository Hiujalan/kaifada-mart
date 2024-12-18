<?php

namespace app\controllers;

use app\models\Barang;
use app\models\DetailPenjualan;
use app\models\Karyawan;
use Yii;
use app\models\Penjualan;
use app\models\PenjualanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PenjualanController implements the CRUD actions for Penjualan model.
 */
class PenjualanController extends Controller
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
     * Lists all Penjualan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenjualanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->view->params['activeMenu'] = 'Penjualan';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dt_penjualan' => Penjualan::find()->asArray()->all(),
        ]);
    }

    /**
     * Displays a single Penjualan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Penjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penjualan();
        $detailModel = new DetailPenjualan();

        if ($model->load(Yii::$app->request->post()) && $detailModel->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try {
                $model->save();

                $detailModel->id_penjualan = $model->id_penjualan;
                $detailModel->save();

                $barang = Barang::findOne($detailModel->kode_barang);
                $barang->stok_barang -= $detailModel->jumlah_barang;
                $barang->save();

                $transaction->commit();

                Yii::$app->session->setFlash('success', 'Penjualan berhasil dilakukan!');
                return $this->redirect(['index']);
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat menyimpan penjualan.');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'detailModel' => $detailModel,
            'dt_karyawan' => ArrayHelper::map(Karyawan::find()->all(), 'id_karyawan', 'nama_karyawan'),
        ]);
    }

    /**
     * Updates an existing Penjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_penjualan]);
        }

        return $this->render('update', [
            'model' => $model,
            // 'detailModel' => $detailModel,
            'dt_karyawan' => ArrayHelper::map(Karyawan::find()->all(), 'id_karyawan', 'nama_karyawan'),
        ]);
    }

    /**
     * Deletes an existing Penjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penjualan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
