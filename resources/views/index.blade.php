<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Lelang KU</title>
    <link rel="manifest" href="site.webmanifest">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="body-bg">
        <!--? Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <p>-LelangKU-</p>
                        <!-- <img src="assets/img/logo/loder.jpg" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
        <header>
            <!-- Header Start -->
            <div class="header-area">
                <div class="main-header ">
                    <div class="header-top d-none d-lg-block">
                        <div class="container">
                            <div class="col-xl-12">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="header-info-left">
                                        <ul>     
                                            <li><i class="far fa-clock"></i> SENIN - SABTU: 06.00 - 20.00 </li>
                                            <li>MINGGU:  TUTUP</li>
                                        </ul>
                                    </div>
                                    <div class="header-info-right">
                                        <ul class="header-social">    
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom  header-sticky">
                        <div class="container" >
                            <div class="row align-items-center">
                                <!-- Logo -->
                                <div class="col-xl-2 col-lg-2">
                                    <div class="logo">
                                        <a href="/" style="color: black;font-weight: bold;font-size: 19px">Sistem Lelang KU</a>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-10">
                                    <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                        <!-- Main-menu -->
                                        <div class="main-menu d-none d-lg-block">
                                            <nav> 
                                                <ul id="navigation">                                                     
                                                    <li><a href="{{ url('formLoginAdmin') }}" style="color: blue;">Admin</a></li>
                                                    <li><a href="{{ url('formLoginMasyarakat') }}">Login</a></li>
                                                    {{-- <li><a href="{{ url('formRegisMasyarakat') }}">Register</a></li> --}}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>
        <main>
            <!-- slider Area Start-->
            <div class="slider-area">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-md-8">
                                    <div class="hero__caption">
                                        <span data-animation="fadeInLeft" data-delay=".1s">Berkomitmen untuk Sukses</span>
                                        <h1 data-animation="fadeInLeft" data-delay=".5s" >Kami membantu lelang anda</h1>
                                        <p data-animation="fadeInLeft" data-delay=".9s">Online dan item lelang terpercaya di seluruh indonesia</p>
                                        <!-- Hero-btn -->
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                    <!-- Single Slider -->
                    <div class="slider-area2">
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-md-8">
                                    <div class="hero__caption">
                                        <span data-animation="fadeInLeft" data-delay=".1s">Menjaga Keutuhan Barang</span>
                                        <h1 data-animation="fadeInLeft" data-delay=".5s" style="font-size: 3.8rem;">Menjamin KeOrisinilan barang</h1>
                                        <p data-animation="fadeInLeft" data-delay=".9s">barang yang di lelang jarang tersedia pada toko dan terjamin keorisinilannya.</p>
                                        <!-- Hero-btn -->
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
            <!-- slider Area End-->
            <!--? Categories Area Start -->
            <div class="categories-area section-padding30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-70">
                                <span>Layanan Unggulan Kami</span>
                                <h2>Layanan Terbaik Kami</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cat text-center mb-50">
                                <div class="cat-icon">
                                    <span class="flaticon-development"></span>
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="{{ url('formLoginMasyarakat') }}">Perencanaan Strategi</a></h5>
                                    <p>Melelang barang secara cepat dan terpercaya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cat text-center mb-50">
                                <div class="cat-icon">
                                    <span class="flaticon-result"></span>
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="{{ url('formLoginMasyarakat') }}">Barang Berkualitas</a></h5>
                                    <p>barang masih bagus, orisinil dan layak untuk di pakai.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cat text-center mb-50">
                                <div class="cat-icon">
                                    <span class="flaticon-team"></span>
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="{{ url('formLoginMasyarakat') }}">Kesepakatan</a></h5>
                                    <p>Mencapai kesepakatan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services Area End -->
            
        </main>
        <footer>
            <!--? Footer Start-->
            <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
                <div class="container">
        
                    <div class="footer-bottom">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-xl-9 col-lg-8">
                                <div class="footer-copy-right">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script><i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Riksa Paradila Pasa</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <!-- Footer Social -->
                                <div class="footer-social f-right">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </footer>
        <!-- Scroll Up -->
        <div id="back-top" >
            <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
        </div>
        
            <!-- JS here -->
        
            <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
            <!-- Jquery, Popper, Bootstrap -->
            <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
            <script src="./assets/js/popper.min.js"></script>
            <script src="./assets/js/bootstrap.min.js"></script>
            <!-- Jquery Mobile Menu -->
            <script src="./assets/js/jquery.slicknav.min.js"></script>
        
            <!-- Jquery Slick , Owl-Carousel Plugins -->
            <script src="./assets/js/owl.carousel.min.js"></script>
            <script src="./assets/js/slick.min.js"></script>
            <!-- One Page, Animated-HeadLin -->
            <script src="./assets/js/wow.min.js"></script>
            <script src="./assets/js/animated.headline.js"></script>
            <script src="./assets/js/jquery.magnific-popup.js"></script>
        
            <!-- Nice-select, sticky -->
            <script src="./assets/js/jquery.nice-select.min.js"></script>
            <script src="./assets/js/jquery.sticky.js"></script>
        
            <!-- counter , waypoint -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
            <script src="./assets/js/jquery.counterup.min.js"></script>
            
            <!-- contact js -->
            <script src="./assets/js/contact.js"></script>
            <script src="./assets/js/jquery.form.js"></script>
            <script src="./assets/js/jquery.validate.min.js"></script>
            <script src="./assets/js/mail-script.js"></script>
            <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
            
            <!-- Jquery Plugins, main Jquery -->    
            <script src="./assets/js/plugins.js"></script>
            <script src="./assets/js/main.js"></script>
</body>
</html>