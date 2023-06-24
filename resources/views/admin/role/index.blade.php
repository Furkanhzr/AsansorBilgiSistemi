@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Roller')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title justify-content-center">
                            <i class="fas fa-newspaper mr-1"></i>
                            Roller
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="role-table" class="display nowrap dataTable cell-border" style="width:100%">
                            <thead>
                            <tr>
                                <th>id</th>
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
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        var table = $('#role-table').DataTable( {
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
            ]
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
