@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
    <style>
        input[type="submit"] {
            color: #ffffff;
        }
    </style>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg" style="width: 100%; height: 451px; padding: 0px 0px 0px 0px;">
        <img src="{{asset('images')}}/contact.jpg" style="width: 100%; height: 100%; position: absolute; opacity: 50%; object-fit: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text" style="margin-top: 200px">
                        <p>7/24 Destek Al</p>
                        <h1>Bize ulaş</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Herhangi bir sorunuz var mı ?</h2>
                        <p>Eğer hizmetlerimiz ve ürünlerimiz hakkında ayrıntılı bilgi alabilmek için veya yaşadığınız herhangi bir sorun olursa belirtmek için bizimle iletişime geçebilirsiniz.</p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" action="{{route('contacts.create.post')}}" enctype="multipart/form-data">
                            @csrf
                            <p>
                                <input type="text" placeholder="Ad" name="name" id="name" required>
                                <input type="text" placeholder="Soyad" name="surname" id="surname" required>
                            </p>
                            <p>
                                <input type="email" placeholder="Email" name="email" id="email">
                                <input type="tel" placeholder="Telefon" name="phone" id="phone" required>
                            </p>
                            <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Mesaj" required></textarea></p>
                            <p><input type="submit" value="Gönder"></p>
                        </form>
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
    <!-- end contact form -->

    <!-- find our location -->
    <div class="find-location blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p> <i class="fas fa-map-marker-alt"></i> Bizi Bulun</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end find our location -->

    <!-- google map section -->
    <div class="embed-responsive embed-responsive-21by9">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=Elâzığ,+Elâzığ+Merkez/Elazığ,+Türkiye&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
    </div>
    <!-- end google map section -->
@endsection
@section('js')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(function(){
            $("#phone").inputmask("(0999)-999-9999");
        });

    </script>
@endsection
