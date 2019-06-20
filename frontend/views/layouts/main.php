<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'my-navbar navbar-inverse navbar-fixed-top my-navbar',
        ],
    ]);
    $menuItems = [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Đăng ký', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Lịch sử đặt hàng', 'url' => ['/customer/history']];
        $menuItems[] = ['label' => 'Đơn hàng', 'url' => ['/customer/invoice']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->
<!-- <link rel="stylesheet" type="text/css" media="all" href="https://giaodich.dathangquangchau.com/min/?f=styles/css/bootstrap.min.css,styles/css/font-awesome.min.css,styles/vendor/bootstrap-datepicker/bootstrap-datepicker.css,styles/css/reset.css,styles/css/basis.css,styles/css/general.css,styles/css/style.css,styles/css/popup.css,styles/css/responsive.css,styles/css/home.css,styles/css/jquery-confirm.min.css,styles/css/nprogress.css,styles/js/fancybox/jquery.fancybox.css&v=4.0.7161"> -->
<style>

.my-navbar {
    background-color: #c1392b !important;
    border-color: #c1392b !important;
}
.navbar-inverse .navbar-brand {
    color: rgba(255, 255, 255, 0.79);
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    color: rgba(255, 255, 255, 0.79);
    background-color: rgba(255, 255, 255, 0.1);
}
.navbar-nav li:hover:before, .navbar-nav li.active:before {
    position: absolute;
    content: "";
    height: 3px;
    left: 0;
    right: 0;
    bottom: -1px;
    background: #EE9F15;
}
.navbar-inverse .navbar-nav > li > a {
    color: rgba(255, 255, 255, 0.79);
}
.navbar-inverse .btn-link {
    color:rgba(255, 255, 255, 0.79);
}

.foot-bank {
    background: #f8f8f8;
    padding: 30px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.block-bank .image {
    float: left;
    margin-right: 15px;
    border-radius: 4px;
    max-width: 90px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border: 1px #dfdfdf solid;
}
.block-bank .info-bank .name {
    font-size: 12px;
    text-transform: uppercase;
    margin-bottom: 2px;
}
.block-bank .info-bank p {
    color: #726c6c;
    margin-bottom: 2px;
    font-size: 12px;
}
.block-bank .info-bank p {
    color: #726c6c;
    margin-bottom: 2px;
    font-size: 12px;
}
.block-bank .info-bank p {
    color: #726c6c;
    margin-bottom: 2px;
    font-size: 12px;
}
p.p_address {
    text-align: center;
    background: #f0f0f0;
    padding: 10px;
    margin-bottom: 0;
}
@media screen and (max-width: 767px){
    .block-bank .image {
    float: none;
    margin-bottom: 10px;
    display: inline-block;
}
.foot-bank .block-bank {
    padding: 10px 0;
    text-align: center;
}
.group-fastorder .form-icon .form-control{
    padding: 10px;
    font-size: 14px;
}
}

</style>
<div id="footer">
        <!-- <div class="visible-xs visible-sm bg-green pd-5" style="left:2px; bottom: 70px;position: fixed;border: 1px green solid;border-radius: 5px;width:30px;">
            <a id="mb_show_support" class="white-clr fweight-500" href="javascript:void($zopim.livechat.window.show());">Hỗ trợ</a>
        </div> -->
                                    
                
        

        <div class="foot-bank">

            <div class="container">

                <div class="row clearfix">

                    <div class="col-md-6">

                        <div class="block-bank clearfix">

                            <div class="image">
                                <img src="/images/BIDV-logo.png" alt="">
                            </div>
                            <div class="info-bank">
                                <h4 class="name">Ngân hàng BIDV</h4>
                                
                                  

                                    <p>Số tài khoản: 12910000121360</p>

                                    <p>Chủ tài khoản: Vũ Thị Ánh Hồng</p>
                                    <p>Chi nhánh: Hoàng Mai Hà Nội</p>
                                  
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="block-bank clearfix">

                            <div class="image">
                                <img src="/images/Agribank_Logo.png" alt="">
                            </div>
                            <div class="info-bank">
                                <h4 class="name">Ngân hàng Agribank</h4>

                                                                    <p>Số tài khoản: 1504205217685</p>

                            <p>Chủ tài khoản: Vũ Thị Ánh Hồng</p>
                            <p>Chi nhánh: Thăng Long Hà Nội</p>
                                     
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <p class="p_address"><span>Địa chỉ: CT6A khu đô thị Xa La - Hà Đông - Hà Nội. Điện thoại: 0859972888</span></p>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
