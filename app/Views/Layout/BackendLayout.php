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


                </div>

                <div class="d-flex align-items-center">



                    <div class="dropdown d-inline-block">

                    </div>



                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url() ?>backend/assets/images/avatar.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?= $user->first_name . ' ' . $user->last_name ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <!-- <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a> -->

                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= base_url('logout') ?>">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <?= $this->include('Layout/SideMenu') ?>

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
                                <h4 class="mb-0 font-size-18"><?= $title ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active"><?= $title ?></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= date('Y') ?> © TIC, All Rights Reserved
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Tanzania Investment Centre
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
    <script src="<?= base_url() ?>backend/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>backend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>backend/assets/js/metismenu.min.js"></script>
    <script src="<?= base_url() ?>backend/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>backend/assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>backend/assets/js/theme.js"></script>

    <!-- third party js -->
    <script src="<?= base_url() ?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/dataTables.select.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>backend/plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="<?= base_url() ?>backend/assets/pages/datatables-demo.js"></script>

</body>



</html>