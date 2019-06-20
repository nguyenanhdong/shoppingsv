<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
img {
    vertical-align: middle;
    width: 30px;
    height: 30px;
    margin-right: 10px;
}
</style>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'productname',
            [
                'attribute'=>'image',
                'format' =>'raw',
                'value' => function($model){
                    $list_image = explode(';',$model->image);
                    $html = '';
                    foreach( $list_image as $image){
                        $html .= Html::img($image);
                        
                    }
                    return $html;
                }
            ],
            'video',
            [
                'attribute'=>'des',
                'format' =>'raw',
                'value' => function($model){
                    $des = explode(';',$model->des);
                    $html = '';
                    foreach( $des as $row){
                        $html .= $row.'<br>';
                        
                    }
                    return $html;
                }
            ],
            [
                'attribute'=>'status',
                'value'=>function($model){
                    if( $model->status == 0)
                        return 'Không bán bán';
                    if( $model->status == 1)
                        return 'Đang bán';
                    if( $model->status == 2)
                        return 'Hết giờ';
                    if( $model->status == 3)
                        return 'Hàng hot';
                   
                },
                // 'format' =>['decimal',0]
            ],
           
            [
                'attribute'=>'price',
                'format' =>['decimal',0]
            ],
            [
                'attribute'=>'pricesale',
                'format' =>['decimal',0]
            ],
            'size',
            'color',
            'brand',
            'timesale',
            [
                'attribute'=>'created_at',
                'label'=>'Thời gian tạo',
                'value' =>function($model){
                    return Yii::$app->formatter->asTime($model['created_at'],'y-mm-dd hh:mm:ss');
                }
            ],
            [
                'attribute'=>'updated_at',
                'label'=>'Cập nhật lần cuối',
                'value' =>function($model){
                    return Yii::$app->formatter->asTime($model['updated_at'],'y-mm-dd hh:mm:ss');
                }
            ],
        ],
    ]) ?>

</div>
