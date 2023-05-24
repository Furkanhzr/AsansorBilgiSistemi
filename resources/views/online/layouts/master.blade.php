<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Online İşlemler')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template2')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('template2')}}/assets/css/app.css">
    <link rel="shortcut icon" href="{{asset('template')}}/assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <style>
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
    <style>
        a {
            color: black;
            text-decoration: none;
        }
        a:hover {
            color: black;
        }
    </style>
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{route('dashboard')}}"><img src="{{asset('images')}}/aker.png" style="width: 90px; height: 70px;" alt="Logo" srcset="">
                            <div style="font-size: 18px; float: right; display: flex; justify-content: space-between;  padding-top: 21px;">
                                <!-- ONLİNE İŞLEMLER (MÜŞTERİ PANELİ YAZISI İÇİN)
                                <p style="color: #F28123;">Online&nbsp</p><p style="color: black;">İşlemler</p>
                                -->
                                <p style="color: #F28123;">Admin&nbsp</p><p style="color: black;">Paneli</p>
                            </div>
                        </a>

                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Admin</li>

                    <li class="sidebar-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }} ">
                        <a href="{{route('dashboard')}}" class='sidebar-link'>
                            <i class="fa fa-house"></i>
                            <span>Anasayfa</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::segment(1) == 'ürünler' ? 'active' : '' }}">
                        <a href="" class='sidebar-link'>
                            <i class="fa fa-newspaper"></i>
                            <span>Ürünler</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('products.index')}}">Ürünler</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('products.create.index')}}">Ürün Oluştur</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::segment(1) == 'asansorler' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-elevator"></i>
                            <span>Asansörler</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">Asansörler</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('elevator_types.index')}}">Asansör Türleri</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item has-sub {{ Request::segment(1) == 'ariza' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-exclamation-circle"></i>
                            <span>Arızalar</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('fault.index')}}">Arıza Kaydı Liste</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('fault.create.index')}}">Arıza Kaydı Oluştur</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-screwdriver-wrench"></i>
                            <span>Bakımlar</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">Bakımlar Liste</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-sweetalert.html">Bakım Oluştur</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-person"></i>
                            <span>Kullanıcı</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('user.index')}}">Kullanıcı Liste</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('user.create.index')}}">Kullanıcı Oluştur</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-address-book"></i>
                            <span>İletişimler</span>
                        </a>
                    </li>
                    <!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları -->
                    <!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları -->
                    <!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları -->
                    <!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları -->
                    <!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları --><!-- Müşteri Sayfaları -->
                    <li class="sidebar-title">Müşteri</li>

                    <li class="sidebar-item">
                        <a href="index.html" class='sidebar-link'>
                            <i class="fa fa-house"></i>
                            <span>Anasayfa</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="form-layout.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Arıza Taleplerim</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-pen-fill"></i>
                            <span>Alınan Hizmetler</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fa fa-money-bill"></i>
                            <span>Ödeme & Borçlar</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">Ödeme & Borçlar</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-sweetalert.html">Ödeme Yapma</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="table.html" class='sidebar-link'>
                            <i class="fa fa-square-poll-horizontal"></i>
                            <span>Arıza Kontrol Talebi</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="table.html" class='sidebar-link'>
                            <i class="fa fa-pen-to-square"></i>
                            <span>Bilgilerimi Güncelle</span>
                        </a>
                    </li>
                    <li class="sidebar-item" style="background: #dc3545; border-radius: 0.5rem;">
                        <a href="{{route('logOut')}}" class='nav-link'>
                            <i class="fa-solid fa-sign-out-alt text-white"></i>
                            <span class="text-white">&nbsp&nbspÇıkış Yap</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>@yield('title-page')</h3>
        </div>
        <div class="page-content">
            <section class="row">
               @yield('content')
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Aker Asansör</p>
                </div>
                <div class="float-end">
                    <p><a href="{{route('dashboard')}}">Furkan, Muhammed, Yunus</a>
                        <span class="text-danger"><i class="bi bi-heart"></i></span> tarafından oluşturuldu </p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('template2')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('template2')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('template2')}}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{asset('template2')}}/assets/js/pages/dashboard.js"></script>

<script src="{{asset('template2')}}/assets/js/main.js"></script>
@yield('js')

</body>

</html>
