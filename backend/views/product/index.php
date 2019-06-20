<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
 /* table td:nth-child(4) {
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
} */
img {
    vertical-align: middle;
    width: 40px;
    height: 40px;
}
</style>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'productname',
            [
                'attribute'=>'avatar',
                'format' =>'raw',
                'value' => function($model){
                    return Html::img($model->avatar);
                }
            ],
            // 'video',
            // 'des',
            [
                'attribute'=>'status',
                'value'=>function($model){
                    if( $model->status == 0)
                        return 'Không bán';
                    if( $model->status == 1)
                        return 'Đang bán';
                    if( $model->status == 2)
                        return 'Hết giờ';
                   
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
            // 'size',
            // 'color',
            // 'brand',
            // 'timesale',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
