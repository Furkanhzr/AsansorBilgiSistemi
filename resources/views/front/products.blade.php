@extends('front.layouts.master')
@section('title','Ürünlerimiz')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg" style="width: 100%; height: 451px; padding: 0px 0px 0px 0px;">
        <img src="{{asset('images')}}/elevator-factory3.jpg" style="width: 100%; height: 100%; position: absolute; opacity: 50%; object-fit: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text" style="margin-top: 200px">
                        <p>Sağlam & Güvenli</p>
                        <h1>Ürünlerimiz</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-1">
                                <img src="{{asset('images')}}/elv1.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">İnsan Asansörleri</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">İnsan asansörleri, binaların projelendirilme aşamasında yapılan trafik hesaplamalarına uygun olarak imal edilmelidirler.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-2">
                                <img src="{{asset('images')}}/elv2.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">Yük Asansörleri</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">Yük asansörleri, konfor ve hızdan çok asansörün eşya ya da malzeme taşıma kapasitesi daha önemlidir.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-3">
                                <img src="{{asset('images')}}/elv3.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">Hidrolik Asansörler</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">Yapının içerisinde makine dairesinin olmadığı konutlarda, fabrikalarda ve villalarda hidrolik asansörler daha çok tercih edilir.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-4">
                                <img src="{{asset('images')}}/elv4.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">Araç Asansörleri</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">Araç Asansörleri genellikle, otomotiv şirketlerinde ve araç bakım-onarım servislerinde yoğunlukla kullanılmaktadır.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-5">
                                <img src="{{asset('images')}}/elv5.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">Otomatik Asansörler</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                            </p>
                            <p class="excerpt">Otomatik asansörler, konforu ve güvenliği ile kullanım açısından gayet basitlik ve rahatlık sağlamaktadır.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html"><div class="latest-news-bg news-bg-6">
                                <img src="{{asset('images')}}/elv6.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">Sedye Asansörleri</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2018</span>
                            </p>
                            <p class="excerpt">Sedye asansörleri, taşıma kapasitesi bakımından 1.600 Kg'dan 2.500 Kg’a kadar ve kabin hızına göre tercih edilebilir.</p>
                            <a href="single-news.html" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="#">Önceki</a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Sonraki</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
@endsection
