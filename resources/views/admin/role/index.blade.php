@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Roller')
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
            <h3>Roller</h3>
            <table class="table table-bordered dataTable" id="role-table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Adı</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>Güncelle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        var table = $('#role-table').DataTable( {
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY:  true,
            scrollCollapse: true,
            ajax: '{!!route('fetch.index')!!}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'update'},
                {data: 'delete'}
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        });

    </script>

    <script>
        function deleted(id){
            Swal.fire({
                icon:'warning',
                title:'Emin Misiniz',
                text:'Rolü Silmek İstediğinize Emin Misiniz ?',
                showCancelButton:true,
                showConfirmButton:true,
                confirmButtonText:'Sil',
                cancelButtonText:'İptal',
            }).then((res)=>{
                if(res.isConfirmed){
                    $.ajax({
                        url:'{{route('role.delete')}}',
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
            })        }

    </script>



@endsection
