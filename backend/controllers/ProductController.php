<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $params = $_REQUEST;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            // var_dump(UploadedFile::getInstances($model, 'image_avt'));echo '<br>';
            // var_dump(UploadedFile::getInstances($model, 'image_avt'));die;
            $model->image_avt = UploadedFile::getInstances($model, 'image_avt');
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if( count( $model->image_avt) ==  0 || count( $model->imageFiles) ==  0 ){
                Yii::$app->session->setFlash('error', 'Chưa thêm ảnh sản phẩm');
            }else{  
                if ($model->upload() && $model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Thêm sản phẩm thành công');
                    // return $this->redirect(['product/index']);
                    return $this->redirect(['index']);
                }
                Yii::$app->session->setFlash('error', 'Có lỗi khi thêm sản phẩm');
            }
            
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->image_avt = UploadedFile::getInstances($model, 'image_avt');
            if ($model->upload() &&  $model->save()) {
                Yii::$app->session->setFlash('success', 'Cập nhật phẩm thành công');
                // return $this->redirect(['product/index']);
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('error', 'Có lỗi khi cập nhật sản phẩm');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
