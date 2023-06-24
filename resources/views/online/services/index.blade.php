@extends('online.layouts.master')
@section('title','Online İşlemler')
@section('title-page','Alınan Hizmetler')
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
                <span class="float-right"></span>
            </h6>
        </div>
        <div class="card-body">
            <h3>Alınan Hizmetler</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="billsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Hizmet Türü</th>
                        <th>Ücret</th>
                        <th>Durum</th>
                        <th>Ödenme Tarihi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var table = $('#billsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            ajax: '{{route('bills.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'transaction_type'},
                {data: 'cost'},
                {data: 'status'},
                {data: 'payment_time'},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        });
    </script>
@endsection
