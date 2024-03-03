<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>SIADAPresisi | Aplikasi Pengesahan Pokja Pemilihan Biro Pengadaan Barang dan Jasa Slog Polri</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/logo-small.png" />

        <!-- CSS
        ============================================ -->
        <link rel="stylesheet" href="{{ asset('') }}landing/assets/css/vendor/vendor.min.css" />
        <link rel="stylesheet" href="{{ asset('') }}landing/assets/css/plugins/plugins.min.css" />

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('') }}landing/assets/css/style.css" />

        <link rel="stylesheet" href="{{ asset('') }}owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('') }}owlcarousel/owl.theme.default.min.css">

        <style>
            .hide {
                display: none;
            }
            .ht-gradation.style-01 .item:hover .circle {
                color: #ffffff;
                background: #dc3545;
            }
            /* .swiper-slide{
            width: 395px !important;
        } */
            @media (max-width: 500px) {
                .inner-img-two {
                    display: none;
                }
                .hide-in-mobile {
                    display: none;
                }
            }
        </style>
    </head>

    <body>
        <div class="header-area header-area--absolute">
            <div class="preview-header-inner header-sticky">
                <div class="container-fluid container-fluid--cp-150">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header position-relative">
                                <!-- brand logo -->
                                <div class="header__logo">
                                    <a href="">
                                        <img src="{{ asset('') }}images/cai-logo.png" width="160" height="48" class="img-fluid light-logo" alt="" />
                                        <img src="{{ asset('') }}images/cai-logo.png" width="160" height="48" class="img-fluid dark-logo" alt="" />
                                    </a>
                                </div>
                                <!-- navigation menu -->
                                <div class="header__navigation menu-style-four preview-menu d-none d-xl-block">
                                    <nav class="navigation-menu navigation-menu--onepage navigation-menu-right">
                                        <ul>
                                            <li>
                                                <a href="{{ url('materi') }}"><span>Materi</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Bantuan</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span>Tentang Kami</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- header actions -->
                                <div class="header__actions--preview">
                                    <div class="header__actions">
                                        <!-- mobile menu -->
                                        <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                            <i></i>
                                        </div>
                                        <!-- hidden icons menu -->
                                        <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                            <a href="javascript:void(0)">
                                                <i class="far fa-ellipsis-h-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of header area  ====================-->

        <!--====================  mobile menu overlay ====================-->
        <div class="mobile-menu-overlay" id="mobile-menu-overlay">
            <div class="mobile-menu-overlay__inner">
                <div class="mobile-menu-overlay__header">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-8">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{ asset('') }}images/cai-logo.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-4">
                                <!-- mobile menu content -->
                                <div class="mobile-menu-content text-end">
                                    <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-overlay__body">
                    <nav class="offcanvas-navigation offcanvas-navigation--onepage">
                        <ul>
                            <li>
                                <a href="{{ url('materi') }}"><span>Materi</span></a>
                            </li>
                            <li>
                                <a href="#"><span>Bantuan</span></a>
                            </li>
                            <li>
                                <a href="#"><span>Tentang Kami</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--====================  End of mobile menu overlay  ====================-->

        @yield('content')
        <!-- JS
    ============================================ -->
        <!-- Modernizer JS -->
        <script src="{{ asset('') }}landing/assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- jQuery JS -->
        <script src="{{ asset('') }}landing/assets/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="{{ asset('') }}landing/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="{{ asset('') }}landing/assets/js/vendor/bootstrap.min.js"></script>

        <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

        <script src="{{ asset('') }}landing/assets/js/plugins/plugins.min.js"></script>

        <!-- Main JS -->
        <script src="{{ asset('') }}landing/assets/js/main.js"></script>

        <script src="{{ asset('') }}owlcarousel/owl.carousel.min.js"></script>

        <script>
            $(document).ready(function(){
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items:2,
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:1000,
                    autoplayHoverPause:true
                });
                $('.play').on('click',function(){
                    owl.trigger('play.owl.autoplay',[1000])
                })
                $('.stop').on('click',function(){
                    owl.trigger('stop.owl.autoplay')
                })
            });
        </script>

        @yield('script')
    </body>
</html>
