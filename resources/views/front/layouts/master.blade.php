<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>@yield('title','Asansör Bilgi Sistemi')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('template')}}/assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/responsive.css">
    <style>
        body::-webkit-scrollbar {
            background-color: #fff;
            width: 16px;
        }

        body::-webkit-scrollbar-track {
            background-color: #fff;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #babac0;
            border-radius: 16px;
            border: 4px solid #fff;
        }

        body::-webkit-scrollbar-button {
            display:none;
        }
    </style>
</head>
<body>

<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{route('homepage')}}">
                            <img src="{{asset('images')}}/company_logo.png" style="width: 100px; height: 75px;" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul  style="padding-top: 13px;">
                            <li class="{{ Request::segment(1) == '' ? 'current-list-item' : '' }}"><a href="{{route('homepage')}}">Anasayfa</a></li>
                            <li class="{{ Request::segment(1) == 'products' ? 'current-list-item' : '' }}"><a href="{{route('products')}}">Ürünlerimiz</a>
                                <ul class="sub-menu">
                                    @foreach($products as $product)
                                        <li><a href="{{route('products.single',$product->id)}}">{{$product->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="{{ Request::segment(1) == 'about' ? 'current-list-item' : '' }}"><a href="{{route('about')}}">Hakkımızda</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('about')}}">Referanslarımız</a></li>
                                    <li><a href="{{route('about')}}">Hikayelerimiz</a></li>
                                </ul>
                            </li>
                            <li class="{{ Request::segment(1) == 'contact' ? 'current-list-item' : '' }}"><a href="{{route('contact')}}">İletişim</a></li>
                            <li>
                                <div class="header-icons">
                                    <a class="boxed-btn" href="{{route('login')}}"><i class="fas fa-globe-americas"></i>&nbsp; Online İşlemler</a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Arama Yap:</h3>
                        <input type="text" placeholder="Giriniz" style="opacity: 50%">
                        <button type="submit">Ara <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->

@yield('content')

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{asset('images')}}/sponsor2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('images')}}/sponsor13.png" style="margin-top: 30px" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('images')}}/sponsor10.png" style="margin-top: 20px"  alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('images')}}/sponsor12.png" style="margin-top: 20px" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{asset('images')}}/sponsor7.png" style="margin-top: 30px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->

<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">Hakkımızda</h2>
                    <p>Aker Asansör, ’’Kaliteli Asansör Kabin Üretimi’’ ve ’’Her Zaman Müşteri Memnuniyeti’’ politikalarını daima en üst hedefi olarak görmüştür.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Bize Ulaş</h2>
                    <ul>
                        <li>34/8, İş Merkezi, Merkez, Elazığ, Türkiye</li>
                        <li>support@akerasansor.com</li>
                        <li>+90 111 222 3333</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Sayfalar</h2>
                    <ul>
                        <li><a href="{{route('homepage')}}">Anasayfa</a></li>
                        <li><a href="{{route('products')}}">Ürünlerimiz</a></li>
                        <li><a href="{{route('about')}}">Hakkımızda</a></li>
                        <li><a href="{{route('contact')}}">İletişim</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Abone Ol</h2>
                    <p>Fırsatlardan haberdar olmak için mail adresinizi giriniz.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2023 - <a href="https://imransdesign.com/">Furkan, Muhammed, Yunus</a>,  Bütün Haklar Saklıdır.</p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6452ce854247f20fefef337c/1gvhnderf';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- jquery -->
<script src="{{asset('template')}}/assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="{{asset('template')}}/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="{{asset('template')}}/assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="{{asset('template')}}/assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="{{asset('template')}}/assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="{{asset('template')}}/assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="{{asset('template')}}/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="{{asset('template')}}/assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="{{asset('template')}}/assets/js/sticker.js"></script>
<!-- main js -->
<script src="{{asset('template')}}/assets/js/main.js"></script>

</body>
</html>
