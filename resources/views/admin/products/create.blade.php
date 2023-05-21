@extends('online.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Ürün Oluştur')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary"><strong>Ürün Oluştur</strong></h6>
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
                    <button type="submit" class="btn btn-primary btn-block">Ürünü Oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height':150
                }
            );
        });
    </script>

@endsection
