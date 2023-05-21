@extends('online.layouts.master')
@section('title','Online İşlemler')
@section('title-page','Anasayfa')
@section('content')
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Asansör Sayısı</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Müşteri Sayısı</h6>
                                <h6 class="font-extrabold mb-0">183</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Arıza Sayısı</h6>
                                <h6 class="font-extrabold mb-0">5</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Bekleyen Bakım Sayısı</h6>
                                <h6 class="font-extrabold mb-0">11</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Yıllık Satışlar</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Son Arızlar</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                <tr>
                                    <th>Bildiren</th>
                                    <th>Asansör Anahtarı</th>
                                    <th>Arıza Açıklaması</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('template2')}}/assets/images/faces/5.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Furkan Hazar</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">a23vh91bbı31</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Asansör elektrik kesintisi</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('template2')}}/assets/images/faces/5.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Yunus Emre Ertürk</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">k83vl51ubı78</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Eşya sıkışması</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('template2')}}/assets/images/faces/2.jpg">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Muhammed Atmaca</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">h494j40b135t</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Asansör ışıkları yanmıyor.</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-5">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="{{asset('images')}}/admin.png" alt="Face 1">
                        <!--MÜŞTERİ LOGOSU (MÜŞTERİ PANELİ YAZISI İÇİN)
                        <img src="{{asset('images')}}/customer.png" alt="Face 1">
                        -->
                    </div>
                    <div class="ms-3 mt-2 name">
                        <h5 class="font-bold">{{$user->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Son Mesajlar</h4>
            </div>
            <div class="card-content pb-4">
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('template2')}}/assets/images/faces/4.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Furkan Hazar</h5>
                        <h6 class="text-muted mb-0">@furkanhzr</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('template2')}}/assets/images/faces/5.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Yunus Emre Ertürk</h5>
                        <h6 class="text-muted mb-0">@y.ertürk</h6>
                    </div>
                </div>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('template2')}}/assets/images/faces/1.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">Muhammed Atmaca</h5>
                        <h6 class="text-muted mb-0">@m.atmaca</h6>
                    </div>
                </div>
                <div class="px-4">
                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Tümünü Listele</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Kayıtlı Kullanıcılar</h4>
            </div>
            <div class="card-body">
                <div id="chart-visitors-profile"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var optionsProfileVisit = {
        annotations: {
            position: 'back'
        },
        dataLabels: {
            enabled:false
        },
        chart: {
            type: 'bar',
            height: 300
        },
        fill: {
            opacity:1
        },
        plotOptions: {
        },
        series: [{
            name: 'sales',
            data: [9,20,30,20,10,20,30,20,10,20,30,20]
        }],
        colors: '#f28123',
        xaxis: {
            categories: ["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz", "Ağustos","Eylül","Ekim","Kasım","Aralık"],
        },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();
    </script>
@endsection
