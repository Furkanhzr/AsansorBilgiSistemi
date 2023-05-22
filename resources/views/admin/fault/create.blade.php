@extends('online.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Arıza Kaydı Oluştur')
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
            <h3  style="color: black"><strong>Arıza Kaydı Oluşturma</strong></h3>
            <hr style="color: #F28123; width: 225px;height: 2px;">
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <input type="text" name="phone" id="phone" placeholder="Telefon Numarası" required>
                <div id="result"></div>
            <form method="POST" action="{{route('fault.create.post')}}" enctype="multipart/form-data">
                @csrf
                <select class="form-group" name="elevator" id="elevator">
                    <option value="">Önce Telefon Numarasını Giriniz</option>
                </select>

                <div class="form-group">
                    <label>Arıza Açıklaması</label>
                    <textarea id="editor" name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-primary btn-block">Arıza Kaydı Oluştur</button>
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
                            document.getElementById('elevator').innerHTML='';
                            satir = $("<option>").text('Telefon Numarası Kayıtlı Değil')
                            $("#elevator").append(satir)
                            if (phone.length === 0) {
                                document.getElementById('elevator').innerHTML='';
                                satir = $("<option>").text('Önce Telefon Numarasını Giriniz')
                                $("#elevator").append(satir)
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
                    document.getElementById('elevator').innerHTML='';
                    satir = $("<option>").text('Lütfen Asansörünüzü Seçiniz')
                    $("#elevator").append(satir)
                    for(var i = 0; i < response.length; i++){
                        satir = $("<option>").text(response[i].key_code)
                        $("#elevator").append(satir)
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
