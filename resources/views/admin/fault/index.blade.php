@extends('online.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Arızalar')
@section('content')
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #F28123;
            border-color: #F28123;
        }
    </style>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <span class="float-right">
                    </span>
            </h6>
        </div>
        <div class="card-body">
                <h3>Arızalar Listesi</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="faultsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kullanıcı ID</th>
                        <th>Asansör ID</th>
                        <th>Fatura ID</th>
                        <th>Arıza Durumu</th>
                        <th>Açıklama</th>
                        <th>Oluşturulma Saati</th>
                        <th>Çözülme Tarihi</th>
                        <th>Detay</th>
                        <th>Güncelleme</th>
                        <th>Silme </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var table = $('#faultsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            ajax: '{{route('faults.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'user_id'},
                {data: 'elevator_id'},
                {data: 'transaction_id'},
                {data: 'status'},
                {data: 'description'},
                {data: 'down_time'},
                {data: 'solved_time'},
                {data: 'show', orderable: false, searchable: false},
                {data: 'update', orderable: false, searchable: false},
                {data: 'delete', orderable: false, searchable: false},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        } );
    </script>

@endsection
