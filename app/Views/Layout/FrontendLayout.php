<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tanzania Investment Centre (TIC).">
    <meta name="author" content="Tanzania Investment Centre (TIC)">
    <title><?= $title ?></title>

    <!-- Favicons-->
    <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?=base_url()?>frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>frontend/css/menu.css" rel="stylesheet">
    <link href="<?=base_url()?>frontend/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>frontend/css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?=base_url()?>frontend/css/custom.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- MODERNIZR MENU -->
    <script src="<?=base_url()?>frontend/js/modernizr.js"></script>

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <a href="index-2.html"><img src="<?=base_url()?>frontend/assets/img/logo.png" alt="" width="49" height="35"></a>
                </div>
                <div class="col-9 position-relative">
                    <!-- <div id="social">
                        <ul>
                            <li><a href="#0"><i class="icon-facebook"></i></a></li>
                            <li><a href="#0"><i class="icon-twitter"></i></a></li>
                            <li><a href="#0"><i class="icon-google"></i></a></li>
                            <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- /social -->
                    <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
                    <!-- /menu button -->
                    <nav>
                        <ul class="cd-primary-nav">
                            <li><a href="<?= base_url() ?>" class="animated_link">Home</a></li>
                            <li><a href="<?= base_url('registration') ?>" class="animated_link">Registration </a></li>

                        </ul>
                    </nav>
                    <!-- /menu -->
                </div>
            </div>
        </div>
        <!-- /container -->
    </header>
    <!-- /Header -->

    <div class="mainSection">
        <?= $this->renderSection('content') ?>
    </div>

    <footer class="clearfix">
        <div class="container">
            <p>© <?=date('Y') ?> Tanzania Investment Centre (TIC)</p>
            <!-- <ul>
                <li><a href="https://www.tic.go.tz/" class="animated_link"></a></li>
               
            </ul> -->
        </div>
    </footer>
    <!-- end footer-->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->

    <!-- COMMON SCRIPTS -->
    <script src="<?=base_url()?>frontend/js/jquery-3.7.1.min.js"></script>
    <script src="<?=base_url()?>frontend/js/common_scripts.min.js"></script>
    <script src="<?=base_url()?>frontend/js/velocity.min.js"></script>
    <script src="<?=base_url()?>frontend/js/functions.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="<?=base_url()?>frontend/js/parallax.min.js"></script>
    <script src="<?=base_url()?>frontend/js/owl-carousel.js"></script>
    <script>
        "use strict";
        $(".team-carousel").owlCarousel({
            items: 1,
            loop: false,
            margin: 10,
            autoplay: false,
            smartSpeed: 300,
            responsiveClass: false,
            responsive: {
                320: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 3,
                }
            }
        });
    </script>

</body>


</html>