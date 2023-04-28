@extends('front.layouts.master')
@section('title', 'Hakkımızda')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg" style="width: 100%; height: 451px; padding: 0px 0px 0px 0px;">
        <img src="{{asset('images')}}/elevator-factory3.jpg" style="width: 100%; height: 100%; position: absolute; opacity: 50%; object-fit: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text" style="margin-top: 200px">
                        <p>Asansörünüzü bizden alın</p>
                        <h1>Hakkımızda</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- featured section -->
    <div class="feature-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">
                        <h2 class="pb-3">Neden <span class="orange-text">Aker Asansör</span></h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Aynı Hafta Kurulum</h3>
                                        <p>Profesyonel kurulum ekibimiz ile hem aynı hafta içinde hem de hızlı kurulum hizmeti.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>En Uygun Fiyat</h3>
                                        <p>Fiyatlarımız tamamen fiyat & performans düzeyine göre düzenlenmiştir.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Özel Paket</h3>
                                        <p>1 yıllık bakım hizmetimizi alan kullanıcılara özel indirim fırsatları.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-sync-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Hızlı Geri Dönüş</h3>
                                        <p>7/24 canlı desteğimiz üzerinden sorularınız hakkında anında geri dönüş alabilirsiniz.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end featured section -->

{{--    <!-- shop banner -->--}}
{{--    <section class="shop-banner">--}}
{{--        <div class="container">--}}
{{--            <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>--}}
{{--            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>--}}
{{--            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- end shop banner -->--}}

    <!-- team section -->
    <div class="mt-150">
        <section class="shop-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3>Bizim <span class="orange-text">Takım</span></h3>
                            <p>Fırat Üniversitesi Yazılım Mühendisliği öğrencileri tarafından oluşturuldu.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-1"><img src="{{asset('images')}}/yunusemre.jpg" style="border-radius: 5px; width: 350px; height: 400px; object-fit: cover;" alt=""></div>
                            <h4>Yunus Emre Ertürk <span>Takım Üyesi</span></h4>
                            <ul class="social-link-team">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-2"><img src="{{asset('images')}}/furkanhazar3.jpg" style="border-radius: 5px; width: 350px; height: 400px; object-fit: cover;" alt=""></div>
                            <h4>Furkan Hazar <span>Takım Lideri</span></h4>
                            <ul class="social-link-team">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-3"><img src="{{asset('images')}}/muhammed2.jpg" style="border-radius: 5px; width: 350px; height: 400px; object-fit: cover;" alt=""></div>
                            <h4>Muhammed Atmaca <span>Takım Üyesi</span></h4>
                            <ul class="social-link-team">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end team section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar1.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Furkan Hazar <span>Takım Lideri</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Furkan Hazar Fırat Üniversitesi Yazılım Mühendisliği mezunuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar2.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Muhammed Atmaca <span>Takım Üyesi</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Muhammed Atmaca Fırat Üniversitesi Yazılım Mühendisliği mezunuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar3.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Yunus Emre Ertürk <span>Takım Üyesi</span></h3>
                                <p class="testimonial-body">
                                    " Merhaba, ben Yunus Emre Ertürk Fırat Üniversitesi Yazılım Mühendisliği mezunuyum. Biz bu piyasaya ne yeni ne geri geldik. Ben bu adamla geldim bu adamla giderim arkadaş. "
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
@endsection
