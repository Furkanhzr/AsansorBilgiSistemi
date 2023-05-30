@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Anasayfa')
@section('content')
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon" style="background-color: orangered;">
                                    <i class="fas fa-elevator"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="font-semibold">Asansör Sayısı</h6>
                                <h6 class="font-extrabold mb-0">{{$elevatorsCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon" style="background-color: purple;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="font-semibold">Toplam Müşteri Sayısı</h6>
                                <h6 class="font-extrabold mb-0">{{$usersCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon" style="background-color: #de0000;">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="font-semibold">Çözülmemiş Arıza Sayısı</h6>
                                <h6 class="font-extrabold mb-0">{{$faultsCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon" style="background-color: deepskyblue;">
                                    <i class="fas fa-screwdriver-wrench"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="font-semibold">Bekleyen Bakım Sayısı</h6>
                                <h6 class="font-extrabold mb-0">{{$repairsCount}}</h6>
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
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-5">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="{{asset('images')}}/admin.png" alt="Face 1">
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
                @foreach($contacts as $contact)
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                        <img src="{{asset('template2')}}/assets/images/faces/2.jpg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1">{{$contact->name}} {{$contact->surname}}</h5>
                        <h6 class="text-muted mb-0">{{$contact->phone}}</h6>
                    </div>
                </div>
                @endforeach
                <div class="px-4">
                    <a href="{{route('contacts.list')}}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Tümünü Listele</a>
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
                <div class="card-body" id="table_data1">
                    @include('admin.tables.fault_table')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gidilecek Bakımlar</h4>
                </div>
                <div class="card-body" id="table_data2">
                    @include('admin.tables.repair_table')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajax( {
            url: '{{route('dashboard.monthlyProductFetch')}}',
            method: 'GET',

            success: function (result) {

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
                        name: 'Asansör Sayısı',
                        data: result
                    }],
                    colors: '#f28123',
                    xaxis: {
                        categories: ["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz", "Ağustos","Eylül","Ekim","Kasım","Aralık"],
                    },
                }

                var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
                chartProfileVisit.render();
            }
        });
    </script>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('fault=')[1];
                fetch_user_data(page);
            });

            function fetch_user_data(page)
            {
                $.ajax({
                    url:"/dashboard/getFaultData?fault="+page,
                    success:function(data)
                    {
                        $('#table_data1').html(data);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('fault=')[1];
                fetch_user_data(page);
            });

            function fetch_user_data(page)
            {
                $.ajax({
                    url:"/dashboard/getRepairData?repair="+page,
                    success:function(data)
                    {
                        $('#table_data2').html(data);
                    }
                });
            }
        });
    </script>
@endsection
