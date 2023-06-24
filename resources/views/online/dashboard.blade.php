@extends('online.layouts.master')
@section('title','Online İşlemler')
@section('title-page','Müşeri Anasayfa')
@section('content')
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #F28123;
            border-color: #F28123;
        }
    </style>
    <style>
        #rep::-webkit-scrollbar {
            background-color: #fff;
            width: 16px;
        }

        #rep::-webkit-scrollbar-track {
            background-color: #fff;
        }

        #rep::-webkit-scrollbar-thumb {
            background-color: #babac0;
            border-radius: 16px;
            border: 4px solid #fff;
        }

        #rep::-webkit-scrollbar-button {
            display:none;
        }
    </style>
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Son Arızlarım</h4>
                    </div>
                    <div class="card-body" id="table_data1">
                        @include('online.tables.fault_table')
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
                        <img src="{{asset('images')}}/customer.png" alt="Face 1">
                    </div>
                    <div class="ms-3 mt-2 name">
                        <h5 class="font-bold">{{$user->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Bakıma Kalan Gün</h4>
            </div>
            <div class="card-content pb-4">
                <div class="recent-message d-flex px-4 py-3" id="rep" style="height: 260px; overflow: auto;">
                    <div class="name ms-4">
                        @foreach($repairsArray as $arr)
                            <h5 class="mb-1">Asansör:</h5>
                            <p>{{$arr['key_code']}}</p>
                            <h6 class="text-muted mb-0">Kalan Gün:</h6>
                            <p>{{$arr['diff']}}</p>
                            <hr>
                        @endforeach
                    </div>
                </div>
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
                    url:"/customer/getFaultData?fault="+page,
                    success:function(data)
                    {
                        $('#table_data1').html(data);
                    }
                });
            }
        });
    </script>
@endsection
