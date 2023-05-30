@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Ürün Oluştur')
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
            <h3  style="color: black"><strong>Ürün Oluşturma</strong></h3>
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
            <form method="POST" action="{{route('products.create.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Ürün Başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ürün Fotoğrafı</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ürün İçeriği</label>
                    <textarea id="editor" name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-primary btn-block">Ürünü Oluştur</button>
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

@endsection
