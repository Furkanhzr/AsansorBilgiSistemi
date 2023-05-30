@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Bakım Kaydı Oluştur')
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
            <h3  style="color: black"><strong>Bakım Kaydı Oluşturma</strong></h3>
            <hr style="color: #F28123; width: 310px;height: 2px;">
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Telefon Numarası" required>
                    </div>
                    <div class="col-9" style="margin-top: 7px;">
                        <div id="result"></div>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{route('repair.create.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="elevatordiv">
                    <label for="seckutusu">Önce Telefon Numarasını Giriniz</label>

                </div>

                <div class="form-group">
                    <label>Bakım Tarihi</label>
                    <input type="date" name="repair_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-primary btn-block">Bakım Kaydı Oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#phone').on('input', function () {
                var phone = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{route('fault.user.phonecheck')}}",
                    data: { phone: phone },
                    dataType: "json",
                    success: function (response) {
                        if (response.result) {
                            $('#result').html('<i class="fas fa-check"></i>');
                            var data = new Object();
                            data.phone = document.querySelector('input[name="phone"]').value;;
                            getUserElevator(data)
                        } else {
                            $('#result').html('<i class="fas fa-times"></i>');
                            document.getElementById('elevatordiv').innerHTML='';
                            satir = $("<label>").text('Telefon Numarası Kayıtlı Değil')
                            $("#elevatordiv").append(satir)
                            if (phone.length === 0) {
                                document.getElementById('elevator').innerHTML='';
                                satir = $("<label>").text('Önce Telefon Numarasını Giriniz')
                                $("#elevatordiv").append(satir)
                                document.getElementById('result').innerHTML='';
                            }
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function getUserElevator(data){
            $.ajax({
                url: '{{route('fault.user.elevators')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    document.getElementById('elevatordiv').innerHTML='';
                    var satir = $("<label>").text('Lütfen Asansörleri Seçiniz')
                    $("#elevatordiv").append(satir)
                    for(var i = 0; i < response.length; i++){
                        satir = $("<input type='checkbox' name='elevators[]' multiple>").val(response[i].key_code)
                        $("#elevatordiv").append(satir)
                        satir = $("<label>").text(response[i].key_code)
                        $("#elevatordiv").append(satir)
                    }
                }
            });
        }

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
