<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş Yap</title>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
        rel="stylesheet"
    />
    <link rel="shortcut icon" href="{{asset('template')}}/assets/img/favicon.png" type="image/x-icon">
</head>
<body>
<section class="vh-100" style="background-image: linear-gradient(to right, #155cc4 , #da6e2f);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{asset('images')}}/onlinetran2.jpg"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; object-fit: cover; width: 100%; height: 100%;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form  method="POST" action="{{route('login.post')}}"enctype="multipart/form-data">
                                    @csrf
                                    <a class="btn  text-white" href="{{route('homepage')}}" style="background-color: #f28123; float: right; margin-top: 14px"><i class="fa fa-home"></i></a>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class=" me-3" style="color: #ff6219;"><img src="{{asset('images')}}/aker.png" style=" height: 60px; width: 75px;"></i>
                                        <span class="h1 fw-bold mb-0">Giriş Yap</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Hesabınıza giriş yapınız</h5>
{{--                                    @if($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            @foreach($errors->all() as $error)--}}
{{--                                                <li>{{$error}}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Şifre</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" style="background-color: #f28123;" type="submit">Giriş Yap</button>
                                    </div>

                                    <a class="small text-muted" href="#!">Şifremi unuttum</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Hesabın var mı? <a href="#!" style="color: #393f81;">Üye Ol</a></p>
                                    <a href="#!" class="small text-muted">Kullanım şartları.</a>
                                    <a href="#!" class="small text-muted">Gizlilik Politikası</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
</body>
</html>
