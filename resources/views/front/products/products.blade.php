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
    @if($products->count()!=0)
        <div class="latest-news mt-150 mb-150">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news">
                                <a href="{{route('products.single',$product->id)}}">
                                    <div class="latest-news-bg news-bg-1">
                                        <img src="{{asset($product->getImage->image)}}" style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="{{route('products.single',$product->id)}}">{{$product->title}}</a></h3>
                                    <p class="blog-meta">
                                        <span class="date"><i class="fas fa-calendar"></i>{{$product->created_at}}</span>
                                    </p>
                                    <p class="excerpt">{!!Str::limit($product->description,150)!!}</p>
                                    <a href="{{route('products.single',$product->id)}}" class="read-more-btn">devamı <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="">Önceki</a></li>
                                    <li><a class="active" href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">Sonraki</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="latest-news mt-100 mb-100">
            <div class="container">
                <div class="row">
                    <div class="alert" style="margin-left: 320px; background-color: rgba(242, 129, 35, 0.35)">
                        <h3>Herhangi bir ürün bulunamadı.</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- end latest news -->
@endsection
