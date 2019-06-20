<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

$this->title = 'Danh sách yêu cầu';
?>
<div class="site-index">
<h1><?= Html::encode($this->title) ?></h1>
<?php 
        echo Tabs::widget([
            'items' => [
                [
                    'label' => 'Tất cả',
                    'content' => GridView::widget([

                        'dataProvider' => $dataProviderAllOrder,


                        'tableOptions' => ['id' => 'inquiry-claimed-grid', 'class' => 'table table-striped table-bordered'],

                        'columns' => [

                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'username',
                                'label' => 'Khách hàng',
                            ],
                            [
                                'attribute'=>'phone',
                                'label' => 'SĐT',
                            ],
                            [
                                'attribute'=>'link',
                                'label' => 'Link ảnh',
                                'format'=>'raw',
								'value' =>function($url) {
									return Html::a('link ảnh',$url['link'],['target' => '_blank']);
								}
                            ],
                            [
                                'attribute'=>'status',
                                'label'=>'Trạng thái',
                                'value'=>function($model){
                                    if($model['status'] == 1)
                                        return 'Chờ xác nhận';
                                    if($model['status'] == 2)
                                        return 'Đang xử lý';
                                    if($model['status'] == 3)
                                        return 'Đã huỷ';
                                }
                            ],
                            [
                                'attribute'=>'created_at',
                                'label'=>'Thời gian tạo',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['created_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'attribute'=>'updated_at',
                                'attribute'=>'Cập nhật lần cuối',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['updated_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => ' {create}{update}{delete}',
                                'buttons'=>[

                                    'update' => function ($url, $model) {
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-ok"></span>','/site/update?id='.$model['id'], [
                                        'title' => 'Xác nhận đơn hàng',
                                        'data' => [
                                            'confirm' => 'Bạn có chắc chắn muốn xác nhận yêu cầu này từ khách hàng',
                                        ],
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {	
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>','/site/delete?id='.$model['id'], [
                                        'title' => 'Huỷ yêu cầu','style'=>'float:right',
                                        'data' => [
                                            'confirm' => 'Huỷ yêu cầu. Bạn có chắc chắn muốn huỷ yêu cầu này của khách hàng',
                                        ],
                                        ]);
                                    },
                                    'create' => function ($url, $model) {
                                        if($model['status'] ==2)	
                                        return Html::a('<span class="glyphicon glyphicon-plus"></span>','/invoice/create?username='.$model['username'], [
                                        'title' => 'Tạo đơn hàng',
                                        
                                        ]);
                                    },
                                ]
                            ]
                        ],

                     ]),
                    'active' => true
                ],
                [
                    'label' => 'Chưa xử lý',
                    'content' => GridView::widget([

                        'dataProvider' => $dataProviderWaittingOrder,


                        'tableOptions' => ['id' => 'inquiry-claimed-grid', 'class' => 'table table-striped table-bordered'],

                        'columns' => [

                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'username',
                                'label' => 'Khách hàng',
                            ],
                            [
                                'attribute'=>'phone',
                                'label' => 'SĐT',
                            ],
                            [
                                'attribute'=>'link',
                                'label' => 'Link ảnh',
                                'format'=>'raw',
								'value' =>function($url) {
									return Html::a('link ảnh',$url['link'],['target' => '_blank']);
								}
                            ],
                            [
                                'attribute'=>'status',
                                'label'=>'Trạng thái',
                                'value'=>function($model){
                                    if($model['status'] == 1)
                                        return 'Chờ xác nhận';
                                    if($model['status'] == 2)
                                        return 'Đang xử lý';
                                    if($model['status'] == 3)
                                        return 'Đã huỷ';
                                }
                            ],
                            [
                                'attribute'=>'created_at',
                                'label'=>'Thời gian tạo',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['created_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'attribute'=>'updated_at',
                                'attribute'=>'Cập nhật lần cuối',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['updated_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => ' {update}{delete}',
                                'buttons'=>[

                                    'update' => function ($url, $model) {
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-ok"></span>','/site/update?id='.$model['id'], [
                                        'title' => 'Xác nhận đơn hàng',
                                        'data' => [
                                            'confirm' => 'Bạn có chắc chắn muốn xác nhận yêu cầu này từ khách hàng',
                                        ],
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {	
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>','/site/delete?id='.$model['id'], [
                                        'title' => 'Huỷ yêu cầu','style'=>'float:right',
                                        'data' => [
                                            'confirm' => 'Huỷ yêu cầu. Bạn có chắc chắn muốn huỷ yêu cầu này của khách hàng',
                                        ],
                                        ]);
                                    }
                                ]
                            ]
                        ],

                     ]),
                ],
                [
                    'label' => 'Đã xử lý',
                    'content' => GridView::widget([

                        'dataProvider' => $dataProviderProcessingOrder,


                        'tableOptions' => ['id' => 'inquiry-claimed-grid', 'class' => 'table table-striped table-bordered'],

                        'columns' => [

                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'username',
                                'label' => 'Khách hàng',
                            ],
                            [
                                'attribute'=>'phone',
                                'label' => 'SĐT',
                            ],
                            [
                                'attribute'=>'link',
                                'label' => 'Link ảnh',
                                'format'=>'raw',
								'value' =>function($url) {
									return Html::a('link ảnh',$url['link'],['target' => '_blank']);
								}
                            ],
                            [
                                'attribute'=>'status',
                                'label'=>'Trạng thái',
                                'value'=>function($model){
                                    if($model['status'] == 1)
                                        return 'Chờ xác nhận';
                                    if($model['status'] == 2)
                                        return 'Đang xử lý';
                                    if($model['status'] == 3)
                                        return 'Đã huỷ';
                                }
                            ],
                            [
                                'attribute'=>'created_at',
                                'label'=>'Thời gian tạo',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['created_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'attribute'=>'updated_at',
                                'attribute'=>'Cập nhật lần cuối',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['updated_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => ' {create}',
                                'buttons'=>[

                                    'create' => function ($url, $model) {
                                        if($model['status'] ==2)	
                                        return Html::a('<span class="glyphicon glyphicon-plus"></span>','/invoice/create?username='.$model['username'], [
                                        'title' => 'Tạo đơn hàng',
                                        
                                        ]);
                                    },
                                    
                                ]
                            ]
                        ],

                     ]),
                ],
                [
                    'label' => 'Đã huỷ',
                    'content' => GridView::widget([

                        'dataProvider' => $dataProviderDeleteOrder,


                        'tableOptions' => ['id' => 'inquiry-claimed-grid', 'class' => 'table table-striped table-bordered'],

                        'columns' => [

                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'username',
                                'label' => 'Khách hàng',
                            ],
                            [
                                'attribute'=>'phone',
                                'label' => 'SĐT',
                            ],
                            [
                                'attribute'=>'link',
                                'label' => 'Link ảnh',
                                'format'=>'raw',
								'value' =>function($url) {
									return Html::a('link ảnh',$url['link'],['target' => '_blank']);
								}
                            ],
                            [
                                'attribute'=>'status',
                                'label'=>'Trạng thái',
                                'value'=>function($model){
                                    if($model['status'] == 1)
                                        return 'Chờ xác nhận';
                                    if($model['status'] == 2)
                                        return 'Đang xử lý';
                                    if($model['status'] == 3)
                                        return 'Đã huỷ';
                                }
                            ],
                            [
                                'attribute'=>'created_at',
                                'label'=>'Thời gian tạo',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['created_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'attribute'=>'updated_at',
                                'attribute'=>'Cập nhật lần cuối',
                                'value' =>function($model){
                                    return Yii::$app->formatter->asTime($model['updated_at'],'y-mm-dd hh:mm:ss');
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => ' {update}{delete}',
                                'buttons'=>[

                                    'update' => function ($url, $model) {
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-ok"></span>','/site/update?id='.$model['id'], [
                                        'title' => 'Xác nhận đơn hàng',
                                        'data' => [
                                            'confirm' => 'Bạn có chắc chắn muốn xác nhận yêu cầu này từ khách hàng',
                                        ],
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {	
                                        if($model['status'] ==1)	
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>','/site/delete?id='.$model['id'], [
                                        'title' => 'Huỷ yêu cầu','style'=>'float:right',
                                        'data' => [
                                            'confirm' => 'Huỷ yêu cầu. Bạn có chắc chắn muốn huỷ yêu cầu này của khách hàng',
                                        ],
                                        ]);
                                    }
                                ]
                            ]
                        ],

                     ]),
                ]
                
               
            ],
        ]);
    ?>
    
</div>
