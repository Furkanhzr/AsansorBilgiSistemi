@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
    <!-- hero area -->
    <div class="hero-area hero-bg">
        <img src="{{asset('images')}}/elevtor1.jpg" style="width: 100%; height: 100%; position: absolute">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Sağlam & Güvenli</p>
                            <h1>Yeni Nesil Asansörler</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Katalog</a>
                                <a href="{{route('contact')}}" class="bordered-btn">İletişime Geçin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Aynı Hafta Kurulum</h3>
                            <p>Hızlı Kurulum !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>7/24 Destek</h3>
                            <p>Tüm gün destek al !</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Geri Dönüş</h3>
                            <p>Gün içinde geri dönüş al !</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Yeni</span> Ürünlerimiz</h3>
                        <p>Bu kısımda en çok tercih edilen ve yeni çıkan asansör modelleri bulunmaktadır.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{asset('images')}}/elv1.jpg" style="width: 260px; height: 261px; margin-bottom: 20px;" alt=""></a>
                        </div>
                        <h3>İnsan Asansörleri</h3>
                        <p class="product-price"><span>Fiyat</span> 12.000 TL </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-search"></i> İncele</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{asset('images')}}/elv2.jpg" style="width: 260px; height: 261px; margin-bottom: 20px;" alt=""></a>
                        </div>
                        <h3>Yük Asansörleri</h3>
                        <p class="product-price"><span>Fiyat</span> 18.000 TL </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-search"></i> İncele</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{asset('images')}}/elv3.jpg" style="width: 260px; height: 261px; margin-bottom: 20px;" alt=""></a>
                        </div>
                        <h3>Hidrolik Asansörler</h3>
                        <p class="product-price"><span>Fiyat</span> 15.000 TL </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-search"></i> İncele</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>3 ay</strong> <br> ücretsiz
                                </span>
                            </div>
                        </div>
                        <img src="{{asset('images')}}/mechanic.png" style="width: 400px; height: 400px;" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">Bu</span> Ayın Teklifi</h3>
                    <h4>Apartman Asansörlerinde</h4>
                    <div class="text">Sadece bu ay geçerli sınırlı teklifimizde, yapacağınz yıllık sözleşmelerde 3 ay bakım ücreti bizden !</div>
                    <!--Countdown Timer-->
                    <div class="time-counter">
                        <div class="time-countdown clearfix" data-countdown="2023/5/20">
                            <div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div>
                            <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>
                            <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>
                            <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div>
                        </div>
                    </div>
                    <a href="cart.html" class="cart-btn mt-3"></i> Detaylar</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{asset('images')}}/furkanhazar3.jpg" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Furkan Hazar <span>Takım Lideri</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Furkan Hazar Fırat Üniversitesi Yazılım Mühendisliği meznuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{asset('images')}}/muhammed2.jpg" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Muhammed Atmaca <span>Takım Üyesi</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Muhammed Atmaca Fırat Üniversitesi Yazılım Mühendisliği meznuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{asset('images')}}/yunusemre.jpg" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Yunus Emre Ertürk <span>Takım Üyesi</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Yunus Emre Ertürk Fırat Üniversitesi Yazılım Mühendisliği meznuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <img src="{{asset('images')}}/elv1.jpg">
                        <a href="https://www.youtube.com/watch?v=FFpKUHt6h70" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">2010'dan beri...</p>
                        <h2>Aker <span class="orange-text">Asansör</span></h2>
                        <p>Aker Asansör, ’’Kaliteli Asansör Kabin Üretimi’’ ve ’’Her Zaman Müşteri Memnuniyeti’’ politikalarını daima en üst hedefi olarak görmüştür.</p>
                            <p>Üretimini gerçekleştirdiği asansör kabini ve asansör aksamları ile yaratmış olduğu kalitesini, vermiş olduğu hizmetle birleştirerek kısa sürede kendi markası olan Aker Asansör markasını dünyaya duyurmayı başarmış ve sektördeki öncü kuruluşlar arasında yerini almıştır.</p>
                        <a href="{{route('about')}}" class="boxed-btn mt-4">devamı</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->

{{--    <!-- shop banner -->--}}
{{--    <section class="shop-banner">--}}
{{--        <div class="container">--}}
{{--            <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>--}}
{{--            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>--}}
{{--            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- end shop banner -->--}}

{{--    <!-- latest news -->--}}
{{--    <div class="latest-news pt-150 pb-150">--}}
{{--        <div class="container">--}}

{{--            <div class="row">--}}
{{--                <div class="col-lg-8 offset-lg-2 text-center">--}}
{{--                    <div class="section-title">--}}
{{--                        <h3><span class="orange-text">Our</span> News</h3>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="single-latest-news">--}}
{{--                        <a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>--}}
{{--                        <div class="news-text-box">--}}
{{--                            <h3><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></h3>--}}
{{--                            <p class="blog-meta">--}}
{{--                                <span class="author"><i class="fas fa-user"></i> Admin</span>--}}
{{--                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>--}}
{{--                            </p>--}}
{{--                            <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>--}}
{{--                            <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="single-latest-news">--}}
{{--                        <a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>--}}
{{--                        <div class="news-text-box">--}}
{{--                            <h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>--}}
{{--                            <p class="blog-meta">--}}
{{--                                <span class="author"><i class="fas fa-user"></i> Admin</span>--}}
{{--                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>--}}
{{--                            </p>--}}
{{--                            <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>--}}
{{--                            <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">--}}
{{--                    <div class="single-latest-news">--}}
{{--                        <a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>--}}
{{--                        <div class="news-text-box">--}}
{{--                            <h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>--}}
{{--                            <p class="blog-meta">--}}
{{--                                <span class="author"><i class="fas fa-user"></i> Admin</span>--}}
{{--                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>--}}
{{--                            </p>--}}
{{--                            <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>--}}
{{--                            <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <a href="news.html" class="boxed-btn">More News</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- end latest news -->--}}
@endsection
