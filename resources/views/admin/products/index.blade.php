@extends('online.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Ürünler')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <span class="float-right">
{{--                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-trash"> Silinen Makaleler</i> </a>--}}
                    </span>

            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="productsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Fotoğraf</th>
                        <th>Açıklama</th>
                        <th>Güncelleme</th>
                        <th>Silme</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var table = $('#productsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{route('products.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'image_id'},
                {data: 'description'},
                {data: 'update', orderable: false, searchable: false},
                {data: 'delete', orderable: false, searchable: false},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        } );
    </script>
@endsection
