@extends('online.layouts.master')
@section('title','Admin Paneli')
@section('title-page','İletişimler')
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
            <h3>İletişim Listesi</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="contactsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Mesaj</th>
                        <th>Okundu Bilgisi</th>
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
        var table = $('#contactsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{route('contacts.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'surname'},
                {data: 'email'},
                {data: 'phone'},
                {data: 'message'},
                {data: 'status', orderable: false, searchable: false},
                {data: 'delete', orderable: false, searchable: false},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        } );
    </script>
    <script>
        function check(id) {
            $.ajax({
                url:'{{route('contacts.check')}}',
                type:'POST',
                data: {
                    id:id,
                    _token:'{{csrf_token()}}'
                },
                success:()=>{
                    table.ajax.reload();
                    toastr.success('İletişim onaylandı.', 'Başarılı');
                }
            })
        }

        function uncheck(id) {
            $.ajax({
                url:'{{route('contacts.uncheck')}}',
                type:'POST',
                data: {
                    id:id,
                    _token:'{{csrf_token()}}'
                },
                success:()=>{
                    table.ajax.reload();
                    toastr.success('İletişim onayı kaldırıldı.', 'Başarılı');
                }
            })
        }

        function contactsDelete(id){
            Swal.fire({
                icon:'warning',
                title:'Emin Misiniz',
                text:'İletişimi Silmek İstediğinize Emin Misiniz ?',
                showCancelButton:true,
                showConfirmButton:true,
                confirmButtonText:'Sil',
                cancelButtonText:'İptal',
            }).then((res)=>{
                if(res.isConfirmed){
                    $.ajax({
                        url:'{{route('contacts.delete')}}',
                        type:'POST',
                        data: {
                            id:id,
                            "_token":'{{csrf_token()}}'
                        },
                        success:(response)=>{
                            Swal.fire({
                                icon:'success',
                                title:'Başarılı',
                            })
                            table.ajax.reload();
                        }
                    })
                }
            })
        }
    </script>
@endsection
