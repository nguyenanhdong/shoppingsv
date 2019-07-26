<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use \common\models\Users;
class ApiController extends Controller{

	 public function behaviors()
    {
        return [
         	'corsFilter' => [
	            'class' => \yii\filters\Cors::className(),
	            'cors' => [
	                // restrict access to
	                'Origin' => ['*'],
	                'Access-Control-Request-Method' => ['POST','GET'],
	                // Allow only POST and PUT methods
	                'Access-Control-Request-Headers' => ['*'],
	                // Allow only headers 'X-Wsse'
	                'Access-Control-Allow-Credentials' => true,
	                // Allow OPTIONS caching
	                'Access-Control-Max-Age' => 3600,
	                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
	                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
	            ],

	        ],

        ];
    }
    /**
     * API Function Login
     * Input [username=>'test',password=>'123456']
     * Output: JSON object
     */
    public function actionLogin(){
    	// return json_encode(array('status'=>false,'error'=>'Incorrect username or password'));
		try{
        	$params         = $_REQUEST;
        	$username       = null;
            $password       = null;
        	if (isset($params['username'])  && isset($params['password'])) {
                $username = $params['username'];
                $password = $params['password'];
        	}else {
                $params =json_decode(file_get_contents('php://input'), true);
                if ( is_array($params) && isset($params['username']) && isset($params['password'])  ){
                
                    $username = $params['username'];
                    $password = $params['password'];
                }else
                    return json_encode(array('status'=>false,'error'=>'Bad params'));
            }
            if($username && $password){
                $user = Users::findByUsername($username);
                
                if (!$user || !$user->validatePassword($password)) {
                    return json_encode(array('status'=>false,'error'=>'Incorrect username or password'));
                    
                }else {
                    $resUser                = $user;
                    $responseObj            = new \stdClass();
                    $responseObj->id        = $resUser->id;
                    $responseObj->username  = $resUser->username;
                    $responseObj->fullname  = $resUser->fullname;
                    $responseObj->phone     = $resUser->phone;
                    $responseObj->email     = $resUser->email;
                    $responseObj->device_id = $resUser->device_id;
                    // var_dump($resUser);
                    return json_encode(array('status'=>true,'userinfo'=>$responseObj));
                }
            }
        	return json_encode(array('status'=>false,'error'=>'Bad params'));
        }catch(Exception $e){
            return json_encode(array('status'=>false,'error'=>$e->getMessage()));
        }
        return json_encode(array('status'=>false,'error'=>'Bad params'));
        die;
	}
}