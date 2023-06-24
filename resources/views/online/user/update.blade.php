@extends('online.layouts.master')
@section('title','Online İşlemler')
@section('title-page','Kullanıcı Bilgilerini Güncelle')
@section('content')
    <style>
        .ck-editor__editable
        {
            min-height: 260px !important;
            max-height: 500px !important;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{--            <h4 class="m-0 font-weight-bold float-left text-primary"><strong></strong></h4>--}}
            <h3  style="color: black"><strong>Kullanıcı Bilgilerini Güncelleme</strong></h3>
            <hr style="color: #F28123; width: 410px;height: 2px;">
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{route('userCustomer.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Telefon Numarası</label>
                    <input type="text" name="phone" class="form-control" required value="{{$user->phone}}">
                    <label>İsim</label>
                    <input type="text" name="name" class="form-control" required value="{{$user->name}}">
                    <label>Soyisim</label>
                    <input type="text" name="surname" class="form-control" required value="{{$user->surname}}">

                    <label>İl</label>
                    <select class="form-control" name="il" id="il">
                        <option value="">İli Seçin</option>
                    </select>
                    <label>İlçe</label>
                    <select class="form-control" name="ilce" id="ilce">
                        <option value="">İlçe Seçin</option>
                    </select>
                    <label>Mahalle</label>
                    <select class="form-control" name="mahalle" id="mahalle">
                        <option value="">Mahalle Seçin</option>
                    </select>
                    <label>Sokak-Cadde</label>
                    <select class="form-control" name="sokak" id="sokak">
                        <option value="">Sokak-Cadde Seçin</option>
                    </select>
                    <label>Bina Numarası</label>
                    <input type="text" name="building" class="form-control" required>

                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required value="{{$user->email}}">

                    <label>Doğum Tarihi</label>
                    <input type="date" name="date_of_birth" class="form-control" required value="{{$user->date_of_birth}}">
                </div>
                <div class="form-group">
                    <button type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-primary btn-block">Bilgilerimi Günceller</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajax({
            url: '{{route('get.city')}}',
            dataType: "json",
            success: function (response) {
                document.getElementById('il').innerHTML='';
                var satir = $('<option>', {
                    value:null,
                    text: 'İl Seçiniz'
                });
                $("#il").append(satir)
                for(var i = 0; i < response.length; i++){
                    satir = $('<option>', {
                        value:response[i].city_key ,
                        text: response[i].city_title
                    });
                    $("#il").append(satir)
                }
            }
        });
    </script>
    <script>
        $("#il").on("change",function(){
            var data = new Object();
            data.city = $("#il").val();
            console.log(data.city)
            $.ajax({
                url: '{{route('get.town')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'İlçe Seçiniz'
                    });
                    for(var i = 0; i < response.length; i++){
                        satir = $('<option>', {
                            value:response[i].town_key ,
                            text: response[i].town_title
                        });
                        $("#ilce").append(satir)
                    }
                }
            });
        })
    </script>
    <script>
        $("#ilce").on("change",function(){
            var data = new Object();
            data.town = $("#ilce").val();
            $.ajax({
                url: '{{route('get.neighbourhood')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'Mahalle Seçiniz'
                    });
                    document.getElementById('mahalle').innerHTML='';
                    for(var i = 0; i < response.length; i++){
                        satir = $("<option>").text(response[i].neighbourhood_title)
                        satir = $('<option>', {
                            value:response[i].neighbourhood_key ,
                            text: response[i].neighbourhood_title
                        });
                        $("#mahalle").append(satir)
                    }
                }
            });
        })
    </script>
    <script>
        $("#mahalle").on("change",function(){
            var data = new Object();
            data.street = $("#mahalle").val();
            $.ajax({
                url: '{{route('get.street')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'Sokak Seçiniz'
                    });                    document.getElementById('sokak').innerHTML='';
                    for(var i = 0; i < response.length; i++){
                        satir = $('<option>', {
                            value:response[i].street_id ,
                            text: response[i].street_title
                        });
                        $("#sokak").append(satir)
                    }
                }
            });
        })
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
