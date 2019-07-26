<?php
    use yii\helpers\Url;
    use yii\web\User;
    use backend\assets\AppAsset;
    use mdm\admin\components\AccessControl;
    use yii\helpers\Json;
    
    $accessCtroller = new AccessControl;
    $isAdmin        = false;
    if( !Yii::$app->user->isGuest )
        $isAdmin    = Yii::$app->user->identity->isAdmin;
    
    $menu           = Yii::$app->params['menu'];

    $actionCurrent  = explode('?',Yii::$app->request->url);
    $actionCurrent  = $actionCurrent[0];
?>
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?= Yii::$app->homeUrl ?>">
                <img src="/img/logo.jpg" alt="logo" class="logo-default"/>
            </a>
        </div>
        <div class="hor-menu hidden-sm hidden-xs">
            <ul class="nav navbar-nav">
                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                <li class="classic-menu-dropdown li_1">
                    <a href="<?= Yii::$app->homeUrl ?>">
                    <?= Yii::t('app','Dashboard'); ?> 
                    </a>
                </li>

                <?php
                    $dataLabelGroup  = [];
                    foreach($menu as $label=>$arr_action){
                        $flag_has_access = false;
                        $dataActionAccess= [];
                        $flag_active_menu= false;
                        foreach($arr_action['child_action'] as $key=>$value){
                            // var_dump(strpos($key, '_group_'));die;
                            if( strpos($key, '_group_') !== false ){
                                
                                foreach($value['child_page'] as $page){
                                    $dataLabelGroup[$page] = false;
                                }
                            }else {
                                if ($arr_action['level'] < 3) {
                                    $check = $accessCtroller->checkRouter($value['url']);
                                    if ($check)
                                        $flag_has_access = true;
                                    
                                    $dataActionAccess[$value['url']] = $check;

                                    if ($value['url'] == $actionCurrent)
                                        $flag_active_menu = true;

                                } else {
                                    foreach ($value as $vals) {
                                        $check = $accessCtroller->checkRouter($vals['url']);
                                        if ($check){
                                            $flag_has_access = true;
                                            if( isset($dataLabelGroup[$key]) )
                                                $dataLabelGroup[$key] = true;
                                        }
                                        $dataActionAccess[$vals['url']] = $check;

                                        if ($vals['url'] == $actionCurrent)
                                            $flag_active_menu = true;
                                    }
                                }
                            }
                        }
                        if( $flag_has_access || $isAdmin ){
                ?>
                    <li class="classic-menu-dropdown <?= $flag_active_menu ? 'active' : '' ?>">

                        <a data-toggle="dropdown" href="<?= $arr_action['level'] == 1 ? Url::to([$arr_action['child_action'][0]['url']]) : 'javascript:;' ?>" class="dropdown-toggle" data-hover="megamenu-dropdown" data-close-others="true">
                            <?= Yii::t('app',$label) ?> <?= $arr_action['level'] > 1 ? '<i class="fa fa-angle-down"></i>' : '' ?>
                        </a>

                        <?php
                            /*if( $arr_action['level'] > 1 ){
                                echo '<ul class="dropdown-menu pull-left menu-1">';
                                foreach($arr_action['child_action'] as $label_action=>$rowAction){
                                    $boolAccess = false;//$dataActionAccess[$rowAction['url']];
                                    if( strpos($label_action, '_group_') === false && $arr_action['level'] > 2 ){
                                        foreach($rowAction as $dataAc){
                                            if( $dataActionAccess[$dataAc['url']] )
                                                $boolAccess = true;
                                        }
                                    }
                                    if($boolAccess || $isAdmin){
                                        $totalAc = count($rowAction);
                        ?>
                                <li class="dropdown-menu-revenue" style="position:relative">
                                    <?php 
                                        if(strpos($label_action, '_group_') !== false){
                                            $bool_show   = false;
                                            $label_group = $rowAction['label'];
                                            foreach($rowAction['child_page'] as $child_page){
                                                if( isset($dataLabelGroup[$child_page]) && $dataLabelGroup[$child_page] )
                                                    $bool_show = true;
                                            }
                                            if($bool_show || $isAdmin){
                                    ?>
                                        <span style="width: 100%; float: left;border-bottom: 1px solid #ddd; padding-bottom: 10px; font-weight: 600; color: #fff; text-indent: 10px; padding-top: 10px; margin-bottom: 0;"><?= Yii::t('app',$label_group) ?></span>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                    <a href="<?= $arr_action['level'] == 2 ? Url::to([$rowAction['url']]) : ( $totalAc == 1 ?  Url::to([$rowAction[0]['url']]) : 'javascript:;') ?>" tabindex="-1">
                                        <?= $arr_action['level'] == 2 ? '<i class="' . $rowAction['icon'] . '"></i>' : '' ?>
                                        <?= Yii::t('app', $arr_action['level'] > 2 ? $label_action : $rowAction['label']) ?>
                                        <?= $arr_action['level'] > 2 ? '<i style="float:right" class="fa fa-angle-right"></i>' : '' ?>
                                    </a>
                                    <?php
                                        if( $arr_action['level'] > 2 && $totalAc > 1 ){
                                            echo '<ul class="dropdown-menu dropdown-menu-sub li1">'; 

                                            foreach($rowAction as $dataAc){
                                                $boolAccessChild = $dataActionAccess[$dataAc['url']];
                                                if($boolAccessChild || $isAdmin){
                                    ?>
                                        <li class="li_menu_1">
                                            <a href="<?= Url::to([$dataAc['url']]) ?>" tabindex="-1"><i class="<?= $dataAc['icon'] ?>"></i> <?= Yii::t('app',$dataAc['label']) ?> </a>
                                        </li>
                                    <?php  
                                                }
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                                    <?php
                                        }
                                    ?>
                                    
                                </li>
                        <?php
                                    }
                                }
                                echo '</ul>';
                            }*/
                        ?>
                        <?php
                            if( $arr_action['level'] > 1 ){
                                $total_column = count($arr_action['child_action']);
                                if($arr_action['level'] > 2){
                                    $min_width    = 244*$total_column;
                                    if( $min_width > 1000 )
                                        $min_width= 1000;
                                }else
                                    $min_width= 244;
                        ?>
                        <ul class="dropdown-menu" style="min-width:<?= $min_width ?>px;">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row" <?= $arr_action['level'] <= 2 ? 'style="margin:0"' : '' ?>>
                                        <?php
                                        if($arr_action['level'] > 2){
                                            foreach($arr_action['child_action'] as $label_action=>$rowAction){
                                                $totalAc = count($rowAction);
                                                $flagAccess = false;
                                                if( $arr_action['level'] > 2 && $totalAc > 1 ){
                                                    foreach($rowAction as $dataAc){
                                                        $boolAccessChild = $dataActionAccess[$dataAc['url']];
                                                        if($boolAccessChild || $isAdmin){
                                                            $flagAccess  = true;
                                                        }
                                                    }
                                                }else if( $totalAc == 1 && ( $dataActionAccess[$rowAction[0]['url']] || $isAdmin ) ){
                                                    $flagAccess  = true;
                                                }else if($arr_action['level'] == 2 && ( $dataActionAccess[$rowAction['url']] || $isAdmin )){
                                                    $flagAccess  = true;
                                                }
                                                if($flagAccess){
                                        ?>
                                            <div class="col-md-4" <?= $total_column == 1 ? 'style="width:100%"' : '' ?>>
                                                <ul class="mega-menu-submenu">
                                                    <li>
                                                        <h3><?= Yii::t('app', $arr_action['level'] > 2 ? $label_action : $rowAction['label']) ?></h3>
                                                    </li>
                                                    <?php
                                                        if( $arr_action['level'] > 2 && $totalAc > 1 ){
                                                            foreach($rowAction as $dataAc){
                                                                $boolAccessChild = $dataActionAccess[$dataAc['url']];
                                                                if($boolAccessChild || $isAdmin){
                                                    ?>
                                                        <li>
                                                            <a href="<?= Url::to([$dataAc['url']]) ?>" tabindex="-1"><i class="<?= $dataAc['icon'] ?>"></i> <?= Yii::t('app',$dataAc['label']) ?> </a>
                                                        </li>
                                                    <?php  
                                                                }
                                                            }
                                                        }else if( $totalAc == 1 && ( $dataActionAccess[$rowAction[0]['url']] || $isAdmin ) ){
                                                    ?>
                                                        <li>
                                                            <a href="<?= Url::to([$rowAction[0]['url']]) ?>" tabindex="-1"><i class="<?= $rowAction[0]['icon'] ?>"></i> <?= Yii::t('app',$rowAction[0]['label']) ?> </a>
                                                        </li>
                                                    <?php
                                                        }else if($arr_action['level'] == 2 && ( $dataActionAccess[$rowAction['url']] || $isAdmin )){
                                                    ?>
                                                        <li>
                                                            <a href="<?= Url::to([$rowAction['url']]) ?>" tabindex="-1"><i class="<?= $rowAction['icon'] ?>"></i> <?= Yii::t('app',$rowAction['label']) ?> </a>
                                                        </li>
                                                    <?php
                                                        }
                                                    ?>

                                                </ul>
                                            </div>
                                        <?php
                                                    }
                                                }
                                            }else{
                                                $flagAccess = false;
                                                foreach($arr_action['child_action'] as $label_action=>$rowAction){
                                                    $totalAc = count($rowAction);
                                                    if( $totalAc == 1 && ( $dataActionAccess[$rowAction[0]['url']] || $isAdmin )){
                                                        $flagAccess = true;
                                                    }else if($arr_action['level'] == 2 && ( $dataActionAccess[$rowAction['url']] || $isAdmin )){
                                                        $flagAccess = true;
                                                    }
                                                }
                                                if($flagAccess){
                                        ?>
                                            <div class="col-md-4" style="min-height:auto;padding:0;width:100%">
                                                <ul class="mega-menu-submenu" style="padding-left:0">
                                                    <?php
                                                        foreach($arr_action['child_action'] as $label_action=>$rowAction){
                                                            $totalAc = count($rowAction);
                                                            if( $totalAc == 1 && ( $dataActionAccess[$rowAction[0]['url']] || $isAdmin )){
                                                    ?>
                                                        <li>
                                                            <a href="<?= Url::to([$rowAction[0]['url']]) ?>" tabindex="-1"><i class="<?= $rowAction[0]['icon'] ?>"></i> <?= Yii::t('app',$rowAction[0]['label']) ?> </a>
                                                        </li>
                                                    <?php
                                                        }else if($arr_action['level'] == 2 && ( $dataActionAccess[$rowAction['url']] || $isAdmin )){
                                                    ?>
                                                        <li>
                                                            <a href="<?= Url::to([$rowAction['url']]) ?>" tabindex="-1"><i class="<?= $rowAction['icon'] ?>"></i> <?= Yii::t('app',$rowAction['label']) ?> </a>
                                                        </li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </div>       
                                        <?php
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php 
                            }
                        ?>

                    </li>
                <?php
                        }
                    }
                ?>
                
            </ul>
        </div>
        <!-- END HORIZANTAL MENU -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <!-- <img alt="" class="img-circle" src="/assets/admin/layout/img/avatar3_small.jpg"/> -->
                    <span class="username username-hide-on-mobile">
                        <?php 
                            if( !Yii::$app->user->isGuest )
                            {
                                $username = Yii::$app->user->identity->fullname;
                                echo Yii::t('app', 'Hello, {username}', ['username' => $username]);                                
                            }
                            else
                                echo Yii::t('app', 'Hello, Guest');
                        ?> 
                    </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?= Url::to(['/user/index']) ?>"><?=Yii::t('app','My Profile') ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                <?=Yii::t('app','Log Out') ?>  </a>
                        </li>
                    </ul>
                   
                </li>

                 
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
             <!-- <ul class="nav navbar-nav">
                
                <li class="classic-menu-dropdown li_1">
                    <a href="<?= Url::to(['/site/logout']) ?>">
                    <?= Yii::t('app','Log Out'); ?>
                    </a>
                </li>
            </ul> -->
             
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
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
                    <!-- <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn submit"><i class="icon-magnifier"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                <?php
                    foreach($menu as $label=>$arr_action){
                        $flag_has_access = false;
                        $dataActionAccess= [];
                        $flag_active_menu= false;
                        foreach($arr_action['child_action'] as $key=>$value){
                            if( strpos($key, '_group_') === false ){
                                
                                if ($arr_action['level'] < 3) {
                                    $check = $accessCtroller->checkRouter($value['url']);
                                    if ($check)
                                        $flag_has_access = true;

                                    $dataActionAccess[$value['url']] = $check;

                                    if ($value['url'] == $actionCurrent)
                                        $flag_active_menu = true;
                                } else {
                                    foreach ($value as $vals) {
                                        $check = $accessCtroller->checkRouter($vals['url']);
                                        if ($check)
                                            $flag_has_access = true;

                                        $dataActionAccess[$vals['url']] = $check;
                                        if ($vals['url'] == $actionCurrent)
                                            $flag_active_menu = true;
                                    }
                                }
                            }
                        }
                        if( $flag_has_access || $isAdmin ){
                ?>
                    <li class="classic-menu-dropdown <?= $flag_active_menu ? 'active' : '' ?>">

                        <a href="<?= $arr_action['level'] == 1 ? Url::toRoute([$arr_action['child_action'][0]['url']]) : 'javascript:;' ?>">
                            <?= Yii::t('app',$label) ?>

                            <?= $arr_action['level'] > 1 ? '<span style="float: right; font-size: 17px;" class="fa fa-angle-down">' : '' ?>
                        </a>

                        <?php
                            if( $arr_action['level'] > 1 ){
                                echo '<ul class="sub-menu menu-1">';
                                foreach($arr_action['child_action'] as $label_action=>$rowAction){
                                    $totalAc = count($rowAction);
                                    $boolAccess = false;//$dataActionAccess[$rowAction['url']];
                                    if( strpos($label_action, '_group_') === false ){
                                        if($arr_action['level'] > 2){
                                            foreach($rowAction as $dataAc){
                                                if( $dataActionAccess[$dataAc['url']] )
                                                    $boolAccess = true;
                                            }
                                        }else if( $totalAc == 1 && ( $dataActionAccess[$rowAction[0]['url']] || $isAdmin ) ){
                                            $boolAccess  = true;
                                        }else if($arr_action['level'] == 2 && ( $dataActionAccess[$rowAction['url']] || $isAdmin )){
                                            $boolAccess  = true;
                                        }
                                    }
                                    if($boolAccess || $isAdmin){
                        ?>
                                <li class="classic-menu-dropdown">
                                    <?php 
                                        if(strpos($label_action, '_group_') !== false){
                                            $bool_show   = false;
                                            $label_group = $rowAction['label'];
                                            foreach($rowAction['child_page'] as $child_page){
                                                if( isset($dataLabelGroup[$child_page]) && $dataLabelGroup[$child_page] )
                                                    $bool_show = true;
                                            }
                                            if($bool_show || $isAdmin){
                                    ?>
                                        <span style="width: 100%;display:block;border-bottom: 1px solid #ddd; padding-bottom: 5px; font-weight: 600; color: #fff; text-indent: 10px; padding-top: 5px; margin-bottom: 0;"><?= Yii::t('app',$label_group) ?></span>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <a href="<?= $arr_action['level'] == 2 ? Url::toRoute([$rowAction['url']]) : 'javascript:;' ?>" tabindex="-1">
                                            <?= $arr_action['level'] == 2 ? '<i class="' . $rowAction['icon'] . '"></i>' : '' ?>
                                            <?= Yii::t('app', $arr_action['level'] > 2 ? $label_action : $rowAction['label']) ?>
                                            <?= $arr_action['level'] > 2 ? '<i style="float:right" class="fa fa-angle-down"></i>' : '' ?>
                                        </a>
                                        <?php
                                            if( $arr_action['level'] > 2 ){
                                                echo '<ul class="sub-menu dropdown-menu-sub li1">'; 

                                                foreach($rowAction as $dataAc){
                                                    $boolAccessChild = $dataActionAccess[$dataAc['url']];
                                                    if($boolAccessChild || $isAdmin){
                                        ?>
                                            <li>
                                                <a href="<?= Url::toRoute([$dataAc['url']]) ?>" tabindex="-1"><i class="<?= $dataAc['icon'] ?>"></i> <?= Yii::t('app',$dataAc['label']) ?> </a>
                                            </li>
                                    <?php  
                                                    }
                                                }
                                                echo '</ul>';
                                            }
                                        }
                                    ?>
                                    
                        <?php
                                    }
                                }
                                echo '</ul>';
                            }
                        ?>

                    </li>
                <?php
                        }
                    }
                ?>                

                <li>
                    <a href="<?= Url::to(['/site/logout']) ?>">
                        <?= Yii::t('app','Log Out'); ?>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END HORIZONTAL RESPONSIVE MENU -->
    </div>
</div>
