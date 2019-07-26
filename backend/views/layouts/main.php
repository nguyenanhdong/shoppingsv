<?php 
use yii\helpers\Html;
use yii\web\Session;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php require_once('partial/head.php');  ?>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<?php $this->head() ?>

<body class="page-md page-header-fixed page-quick-sidebar-over-content page-full-width">

<?php $this->beginBody() ?>
<?php require_once('partial/nav.php');  ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php /*
    <div class="page-sidebar-wrapper">
        <!-- BEGIN HORIZONTAL RESPONSIVE MENU -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu page-sidebar-menu-light " data-slide-speed="200" data-auto-scroll="true">
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
                <li class="sidebar-search-wrapper">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                    <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                    <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn submit"><i class="icon-magnifier"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                <li class="active">
                    <a href="index.html">
                    Dashboard <span class="selected">
                    </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                    Mega <span class="arrow">
                    </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                            Layouts <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active">
                                    <a href="layout_horizontal_sidebar_menu.html">
                                    Horizontal & Sidebar Menu </a>
                                </li>
                                <li>
                                    <a href="index_horizontal_menu.html">
                                    Dashboard & Mega Menu </a>
                                </li>
                                <li>
                                    <a href="layout_horizontal_menu1.html">
                                    Horizontal Mega Menu 1 </a>
                                </li>
                                <li>
                                    <a href="layout_horizontal_menu2.html">
                                    Horizontal Mega Menu 2 </a>
                                </li>
                                <li>
                                    <a href="layout_fontawesome_icons.html">
                                    <span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
                                </li>
                                <li>
                                    <a href="layout_glyphicons.html">
                                    Layout with Glyphicon</a>
                                </li>
                                <li>
                                    <a href="layout_full_height_portlet.html">
                                    <span class="badge badge-roundless badge-success">new</span>Full Height Portlet</a>
                                </li>
                                <li>
                                    <a href="layout_full_height_content.html">
                                    <span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
                                </li>
                                <li>
                                    <a href="layout_search_on_header1.html">
                                    Search Box On Header 1 </a>
                                </li>
                                <li>
                                    <a href="layout_search_on_header2.html">
                                    Search Box On Header 2 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_search_option1.html">
                                    Sidebar Search Option 1 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_search_option2.html">
                                    Sidebar Search Option 2 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_reversed.html">
                                    <span class="badge badge-roundless badge-warning">
                                    new </span>
                                    Right Sidebar Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_fixed.html">
                                    Sidebar Fixed Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_closed.html">
                                    Sidebar Closed Page </a>
                                </li>
                                <li>
                                    <a href="layout_ajax.html">
                                    Content Loading via Ajax </a>
                                </li>
                                <li>
                                    <a href="layout_disabled_menu.html">
                                    Disabled Menu Links </a>
                                </li>
                                <li>
                                    <a href="layout_blank_page.html">
                                    Blank Page </a>
                                </li>
                                <li>
                                    <a href="layout_boxed_page.html">
                                    Boxed Page </a>
                                </li>
                                <li>
                                    <a href="layout_language_bar.html">
                                    Language Switch Bar </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                            More Layouts <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="layout_sidebar_search_option1.html">
                                    Sidebar Search Option 1 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_search_option2.html">
                                    Sidebar Search Option 2 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_reversed.html">
                                    <span class="badge badge-roundless badge-success">
                                    new </span>
                                    Right Sidebar Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_fixed.html">
                                    Sidebar Fixed Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_closed.html">
                                    Sidebar Closed Page </a>
                                </li>
                                <li>
                                    <a href="layout_ajax.html">
                                    Content Loading via Ajax </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                            Even More <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="layout_disabled_menu.html">
                                    Disabled Menu Links </a>
                                </li>
                                <li>
                                    <a href="layout_blank_page.html">
                                    Blank Page </a>
                                </li>
                                <li>
                                    <a href="layout_boxed_page.html">
                                    Boxed Page </a>
                                </li>
                                <li>
                                    <a href="layout_language_bar.html">
                                    Language Switch Bar </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    Full Mega <span class="arrow">
                    </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                            Layouts <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="index_horizontal_menu.html">
                                    Dashboard & Mega Menu </a>
                                </li>
                                <li>
                                    <a href="layout_horizontal_sidebar_menu.html">
                                    Horizontal & Sidebar Menu </a>
                                </li>
                                <li>
                                    <a href="layout_horizontal_menu1.html">
                                    Horizontal Mega Menu 1 </a>
                                </li>
                                <li>
                                    <a href="layout_horizontal_menu2.html">
                                    Horizontal Mega Menu 2 </a>
                                </li>
                                <li>
                                    <a href="layout_search_on_header1.html">
                                    Search Box On Header 1 </a>
                                </li>
                                <li>
                                    <a href="layout_search_on_header2.html">
                                    Search Box On Header 2 </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                            More Layouts <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="layout_sidebar_search_option1.html">
                                    Sidebar Search Option 1 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_search_option2.html">
                                    Sidebar Search Option 2 </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_reversed.html">
                                    <span class="badge badge-roundless badge-success">
                                    new </span>
                                    Right Sidebar Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_fixed.html">
                                    Sidebar Fixed Page </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar_closed.html">
                                    Sidebar Closed Page </a>
                                </li>
                                <li>
                                    <a href="layout_ajax.html">
                                    Content Loading via Ajax </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                            Even More <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="layout_disabled_menu.html">
                                    Disabled Menu Links </a>
                                </li>
                                <li>
                                    <a href="layout_blank_page.html">
                                    Blank Page </a>
                                </li>
                                <li>
                                    <a href="layout_boxed_page.html">
                                    Boxed Page </a>
                                </li>
                                <li>
                                    <a href="layout_language_bar.html">
                                    Language Switch Bar </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                            Accordions <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <div id="accordion2" class="panel-group mega-menu-responsive-content">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" class="collapsed">
                                                Mega Menu Info #1 </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne2" class="panel-collapse in">
                                                <div class="panel-body">
                                                     Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="collapsed">
                                                Mega Menu Info #2 </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                     Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2">
                                                Mega Menu Info #3 </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                     Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a>
                    Classic <span class="arrow">
                    </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-bookmark-o"></i> Section 1 </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-user"></i> Section 2 </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-puzzle-piece"></i> Section 3 </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-gift"></i> Section 4 </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-table"></i> Section 5 </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-envelope-o"></i> More options <span class="arrow">
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:;">
                                    Second level link </a>
                                </li>
                                <li class="sub-menu">
                                    <a href="javascript:;">
                                    More options <span class="arrow">
                                    </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.html">
                                            Third level link </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                            Third level link </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                            Third level link </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                            Third level link </a>
                                        </li>
                                        <li>
                                            <a href="index.html">
                                            Third level link </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.html">
                                    Second level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                    Second level link </a>
                                </li>
                                <li>
                                    <a href="index.html">
                                    Second level link </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END HORIZONTAL RESPONSIVE MENU -->
    </div>
    */?>
    <!-- END SIDEBAR -->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                             Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <?php
                /*if (Yii::$app->controller->id != "site" && Yii::$app->controller->action->id != "index" ){
            ?>
            <h3 class="page-title">
                <?= Html::encode($this->title) ?>
			</h3>
            <?php }*/ ?>
            <div class="page-bar">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => ['label' => '<i class="fa fa-home"></i>','encode' => false,'url' => Url::to(['/'])],
                    'options' => ['class' => 'page-breadcrumb'],
                    'itemTemplate' => '<li>{link}<i class="fa fa-angle-right"></i></li>',
                ]) ?>
                <?php /*
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp; <span class="uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                    </div>
                </div> */ ?>
            </div>
            <!-- END PAGE HEADER-->
            <?= $content ?>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php require_once('partial/footer.php'); ?>
<?php $this->endBody() ?>
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>