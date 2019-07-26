<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','Login');
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div style="text-align:center">
        <h1>__ SHOP ERP __</h1>
        <h4 class="form-title"><?= $this->title ?></h4>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=>'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Tài khoản'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder'=> 'Mật khẩu'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton( 'Đăng nhập', ['class' => 'btn btn-danger', 'name' => 'login-button', 'style' => 'width:100%']) ?>
    </div>
    <?php /*
    <div class="login-options">
        <h4><?= Yii::t('backend/login', 'Or login with'); ?></h4>
        <ul class="social-icons">
            <li>
                <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
            </li>
            <li>
                <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
            </li>
        </ul>
    </div> */ ?>
    <?php ActiveForm::end(); ?>  
</div>

