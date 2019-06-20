<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Employee;
use common\models\Order;
use yii\web\NotFoundHttpException;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'actions' => ['login', 'error'],
            //             'allow' => true,
            //         ],
            //         [
            //             'actions' => ['logout', 'index','update','delete'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $order = new Order();
        $AllOrder = $order->getOrder('all');
        $WaittingOrder = $order->getOrder('waitting');
        $ProcessingOrder = $order->getOrder('processing');
        $DeleteOrder = $order->getOrder('delete');
        // echo '<pre>';
       
        // var_dump($AllOrder);
        // echo '<pre>';die;
        $dataProviderAllOrder = new \yii\data\ArrayDataProvider([
                'allModels' => $AllOrder,
                'pagination' => false,
            ]);
        $dataProviderWaittingOrder = new \yii\data\ArrayDataProvider([
                'allModels' => $WaittingOrder,
                'pagination' => false,
            ]);
        $dataProviderProcessingOrder = new \yii\data\ArrayDataProvider([
                'allModels' => $ProcessingOrder,
                'pagination' => false,
            ]);
        $dataProviderDeleteOrder = new \yii\data\ArrayDataProvider([
                'allModels' => $DeleteOrder,
                'pagination' => false,
            ]);
        return $this->render('index',[
            'dataProviderAllOrder'=>$dataProviderAllOrder,
            'dataProviderWaittingOrder'=>$dataProviderWaittingOrder,
            'dataProviderProcessingOrder'=>$dataProviderProcessingOrder,
            'dataProviderDeleteOrder'=>$dataProviderDeleteOrder
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->status = 2;
        $model->update();
        return $this->redirect(['site/index']);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 3;
        $model->update();
        return $this->redirect(['site/index']);
    }
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // var_dump(Yii::$app->user);die;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Employee();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
