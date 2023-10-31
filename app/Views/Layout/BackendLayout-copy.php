<!DOCTYPE html>
<html lang="en">

<?php
$user = auth()->user();
?>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>backend/assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="<?= base_url() ?>backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="<?= base_url() ?>backend/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alerts css -->
    <link href="<?= base_url() ?>backend/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>backend/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                
                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-plus"></i> Create New
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu">
                            
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Application
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Software
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                EMS System
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                CRM App
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-none d-sm-inline-block ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">
                            
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="" src="assets/images/flags/us.jpg"alt="Header Language" height="16">
                            <span class="d-none d-sm-inline-block ml-1">English</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge badge-danger badge-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-2.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                            <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                            <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-cloud-download-outline"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Download Available !</h6>
                                            <p class="font-size-12 mb-1">Latest version of admin is now available. Please download here.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 4 hours ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-3.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                            <p class="font-size-12 mb-1">Just upgraded to premium account.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Jamie D.</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Inbox</span>
                                <span>
                                    <span class="badge badge-pill badge-info">3</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Lock Account</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
    <?=$this->include('Layout/SideMenu') ?>
       

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Input Masks</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Input Masks</li>
                                    </ol>
                                </div>
                                
                            </div>
                        </div>
                    </div>     
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                    
                                    <h4 class="card-title">Input Masks</h4>
                                    <p class="card-subtitle mb-4">A jQuery Plugin to make masks on form fields and HTML elements.</p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000">
                                                    <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hour</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00">
                                                    <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date & Hour</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00">
                                                    <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>ZIP Code</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000-000">
                                                    <span class="font-13 text-muted">e.g "xxxxx-xxx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Crazy Zip Code</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00">
                                                    <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Money</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                                    <span class="font-13 text-muted">e.g "Your money"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Money 2</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                                    <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                                </div>
        
                                            </form>
                                        </div> <!-- end col -->

                                        <div class="col-md-6">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Telephone</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-0000">
                                                    <span class="font-13 text-muted">e.g "xxxx-xxxx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telephone with Code Area</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 0000-0000">
                                                    <span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>US Telephone</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(000) 000-0000">
                                                    <span class="font-13 text-muted">e.g "(xxx) xxx-xxxx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>São Paulo Celphones</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 00000-0000">
                                                    <span class="font-13 text-muted">e.g "(xx) xxxxx-xxxx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>CPF</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000-00" data-reverse="true">
                                                    <span class="font-13 text-muted">e.g "xxx.xxx.xxxx-xx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>CNPJ</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00.000.000/0000-00" data-reverse="true">
                                                    <span class="font-13 text-muted">e.g "xx.xxx.xxx/xxxx-xx"</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>IP Address</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="099.099.099.099" data-reverse="true">
                                                    <span class="font-13 text-muted">e.g "xxx.xxx.xxx.xxx"</span>
                                                </div>
        
                                            </form>
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row -->
                    
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2019 © Xacton.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Myra
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- Mask Js-->
    <script src="../plugins/jquery-mask/jquery.mask.min.js"></script>

    <!-- Mask Custom Js-->
    <script src="assets/pages/mask-demo.js"></script>


    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>



</html>