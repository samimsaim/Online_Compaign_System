<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	 <meta charset="utf-8" />
        <title>ویب سایت کاندیدان</title>
    <link rel="icon" href=""/>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <script src="<?=base_url()?>../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
        <link href="<?=base_url()?>../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/material/css/mdb.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <link href="<?=base_url();?>../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/global/css/components-md-rtl.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>../assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>../assets/layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url()?>../assets/layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
 </head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md" id="nasrat">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <img src="<?=base_url();?>../assets/img/ELECTION.png" alt="" style="width: 78%; margin-top: 18px; margin-right: -5px;" class="logo-default"/>
                    <div class="menu-toggler sidebar-toggler">
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
              
                <div class="page-actions">
                </div>
              
                <div class="page-top">
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" style="width:40px ;" src="<?php if(!empty($_SESSION['image'])){ echo base_url()."../".$_SESSION['image'];} else{ if($_SESSION['gender']=='m'){ echo base_url()."../assets/img/users/male.jpg";} elseif($_SESSION['gender']=='f'){ echo base_url()."../assets/img/users/female.jpg";}}?>"/>
                                    <span class="username username-hide-on-mobile"><?=ucfirst($_SESSION['username']);?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
            
                                    <li>
                                        <a href="<?=base_url()?>index.php/logoutController/index">
                                            <i class="icon-key"></i> خروج </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <?php if($_SESSION['user_level']==1): ?>
                            <li class="nav-item start ">
                            <a href="<?=base_url()?>index.php/mainPageController/chartView" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">صفحه اصلی</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo activate_menu('candidateController');?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">کاندیدان</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                              <li class="nav-item">

                                    <a href="<?=base_url()?>index.php/mainPageController/index" class="nav-link nav-toggle">
                                        <span class="title">لیست کاندیدان</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['user_level']==1): ?>
                          <li class="nav-item <?php echo activate_menu('usersController'); ?>">
                            <a href="<?=base_url()?>index.php/UsersController/index" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">استفاده کننده ها</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                 <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/UsersController/index" class="nav-link nav-toggle">
                                        <span class="title">مدیر</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                              <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/usersController/kandid" class="nav-link nav-toggle">
                                        <span class="title">کاندیدان</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/usersController/Peopl" class="nav-link nav-toggle">
                                        <span class="title">مردم</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                
                            </ul>

                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['user_level']==1): ?>
                        <li class="nav-item <?php echo activate_menu('deviceController'); ?>">
                            <a href="<?=base_url()?>index.php/peopleController/index" class="nav-link nav-toggle">
                                <i class="fa fa-sitemap"></i>
                                <span class="title">مردم</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['user_level']==2): ?>
                        <li class="nav-item <?php echo activate_menu('deviceController'); ?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="fa fa-sitemap"></i>
                                <span class="title">کاندید</span>
                                <span class="arrow"></span>
                            </a>
                             <ul class="sub-menu">
                              <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/usersController/kanPro" class="nav-link nav-toggle">
                                        <span class="title">پرو فایل</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?=base_url()?>index.php/usersController/kandidAcount" class="nav-link nav-toggle">
                                        <span class="title">تنظیمات حساب</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            