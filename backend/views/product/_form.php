<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$product_status = Yii::$app->params['product_status'];
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'productname')->textInput() ?>
    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pricesale')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList($product_status,['prompt' => 'Chọn trạng thái']) ?> 
    <?= $form->field($model, 'timesale')->widget(DateTimePicker::class, [
    // if you are using bootstrap, the following line will set the correct style of the input field
				'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
				'removeButton' => false,
				'pickerButton' => ['icon' => 'calendar'],
				'language' => 'vi',
				'options' => ['autocomplete'=>'off'],
				'pluginOptions' => [
					'autoclose' => true,
					'format' => 'yyyy-mm-dd hh:ii'
				]
    // ... you can configure more DatePicker properties here
]) ?>
 
    <?= $form->field($model, 'des')->textarea(['rows' => '6','style'=>'width:100%']) ?> 
    <?= $form->field($model, 'image_avt[]')->fileInput(['accept' => 'image/*',]) ?>
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>


    <div class="form-group button-submit">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>       
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(function(){
        $('#product-size').change(function(){
                        alert($(this).val());
                    });
    });
                   
</script>
