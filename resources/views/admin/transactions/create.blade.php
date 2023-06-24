@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Kurulum Fatura Oluştur')
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
            <h3  style="color: black"><strong>Kurulum Fatura Oluşturma</strong></h3>
            <hr style="color: #F28123; width: 375px;height: 2px;">
        </div>
        <div class="card-body">
{{--            @if($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <li>{{$error}}</li>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            @endif--}}
            <form method="POST" action="{{route('transactions.create.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Telefon Numarası</label>
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Telefon Numarası" required>
                        </div>
                        <div class="col-9" style="margin-top: 7px;">
                            <div id="result"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fiyat</label>
                    <input class="form-control" type="number" name="cost" style="width: 265px;" placeholder="00" required>
                </div>


                <div class="form-group">
                    <label>Açıklama</label>
                    <input class="form-control" type="text" name="description" placeholder="Açıklama" required>
                </div>

                <div class="form-group">
                    <button type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-primary btn-block">Fatura Oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(document).ready(function () {
            $('#phone').on('input', function () {
                var phone = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{route('transactions.user.phonecheck')}}",
                    data: { phone: phone },
                    dataType: "json",
                    success: function (response) {
                        if (response.result) {
                            $('#result').html('<i class="fas fa-check" style="color: limegreen"></i>');
                        } else {
                            $('#result').html('<i class="fas fa-times" style="color: red"></i>');
                        }
                    }
                });
            });
        });
    </script>

@endsection
