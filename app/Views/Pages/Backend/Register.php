<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title><?=$title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>backend/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?=base_url()?>backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>backend/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
 
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="index-2.html" class="text-dark font-size-22 font-family-secondary">
                                              <b>TIC</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Create an Account!</h1>
                                        
                                        <form class="user" action="<?=base_url('createAccount') ?>" method="post">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="first_name" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" name="password_confirm"  class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block waves-effect waves-light"> Register Account </button>

                                            
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-0">Already have account?  <a href="<?=base_url('login')?>" class="text-muted font-weight-medium ml-1"><b>LogIn</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="<?=base_url()?>backend/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>backend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>backend/assets/js/metismenu.min.js"></script>
    <script src="<?=base_url()?>backend/assets/js/waves.js"></script>
    <script src="<?=base_url()?>backend/assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url()?>backend/assets/js/theme.js"></script>

</body>



</html>