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
                        <h1>{{$product->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->
    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-article-section">
                        <div class="single-article-text">
                            <div class="single-artcile-bg">
                                <img src="{{asset($product->getImage->image)}}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <p class="blog-meta">
                                <span class="date"><i class="fas fa-calendar"></i>{{$product->created_at}}</span>
                            </p>
                            <h2>{{$product->title}}</h2>
                            <p>{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i> Şube Adresimiz</h4>
                            <p>34/8, İş Merkezi <br> Merkez, Elazığ, <br> Türkiye</p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="far fa-clock"></i> İş Saatleri</h4>
                            <p>PZT - CUMA: 08:00 - 21:00 <br> CMT - PAZ: 10:00 - 08:00 </p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i> İletişim</h4>
                            <p>Telefon: +90 111 222 3333 <br> Email: support@akerasansor.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single article section -->
@endsection
