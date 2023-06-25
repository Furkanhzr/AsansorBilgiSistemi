@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Asansör Türleri')
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
                <div class="row">
                    <div class="col">
                        <h3>Asansör Türleri</h3>
                    </div>
                    @if (auth()->user()->can('create asansorler'))
                    <div class="col">
                        <span>
                            <a class="btn float-end text-white" style="background-color: #F28123;" lass="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#elevatorTypesCreateModal" >Asansör Türü Oluştur</a>
                        </span>
                    </div>
                    @endif
                </div>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="elevatorTypesTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Asansör Türü Adı</th>
                        @if (auth()->user()->can('update asansorler'))
                        <th>Güncelleme</th>
                        @endif
                        @if (auth()->user()->can('delete asansorler'))
                        <th>Silme</th>
                        @endif
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- Create Modal -->
            <div class="modal fade" id="elevatorTypesCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Asansör Türü Oluşturma</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formCreate" name="formCreate" class="form-horizontal">
                                <input type="hidden" name="idCreate" id="idCreate">
                                <div class="form-group">
                                    <label for="nameInput">Asansör Türü Adı</label>
                                    <input type="text" name="name" class="form-control" id="nameCreate"
                                           value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Kapat</span>
                                    </button>
                                    <button type="button" id="createButton" class="btn ml-1 text-white" style="background-color: #F28123;" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" >Oluştur</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create Modal End -->

            <!-- Update Modal -->
            <div class="modal fade" id="elevatorTypesUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Asansör Türü Güncelleme</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formUpdate" name="formUpdate" class="form-horizontal">
                                <input type="hidden" name="idUpdate" id="idUpdate">
                                <div class="form-group">
                                    <label for="nameInput">Asansör Türü Adı</label>
                                    <input type="text" name="name" class="form-control" id="nameUpdate"
                                           value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Kapat</span>
                                    </button>
                                    <button type="button" id="updateButton" class="btn ml-1 text-white" style="background-color: #F28123;" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" >Güncelle</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update Modal End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        var table = $('#elevatorTypesTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{route('elevator_types.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                @if (auth()->user()->can('update asansorler'))
                {data: 'update', orderable: false, searchable: false},
                @endif
                @if (auth()->user()->can('delete asansorler'))
                {data: 'delete', orderable: false, searchable: false},
                @endif
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        } );
    </script>
    <script>
        //Enter'a basınca form bozulma bugu için. Enter tuşunu deaktif eder.
        $(document).ready(function() {
            $(window).keydown(function(event){
                if((event.keyCode == 13) && ($(event.target)[0]!=$("textarea")[0])) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <script>
        $('#createButton').click(function () {
            $.ajax({
                url: '{{route('elevator_types.create')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: document.getElementById('nameCreate').value,
                },
                success: function (data) {
                    if (data.Error != null) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: data.Error,
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'Asansör Türü Başarıyla Eklendi!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    table.ajax.reload();
                    $('#formCreate').trigger("reset");
                    $('#elevatorTypesCreateModal').modal('hide');
                },
                error: function (data) {
                }
            });
        });

        $('body').on('click', '.updateElevatorTypesModal', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{route("elevator_types.edit",'/')}}'+'/'+id,
                method: 'GET',
                success: function (response) {
                    $('#idUpdate').val(response.id);
                    $('#nameUpdate').val(response.name);
                },
                error: function (error) {
                }
            });
        });

        $('#updateButton').click(function () {
            $.ajax({
                url: '{{route('elevator_types.update')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: document.getElementById('idUpdate').value,
                    name: document.getElementById('nameUpdate').value,
                },

                success: function (data) {
                    if (data.Error != null) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: data.Error,
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'Asansör Türü Başarıyla Güncellendi!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    table.ajax.reload();
                    $('#formUpdate').trigger("reset");
                    $('#elevatorTypesUpdateModal').modal('hide');
                },

                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });
        });

        function elevatorTypesDelete(id){
            Swal.fire({
                icon:'warning',
                title:'Emin Misiniz',
                text:'Asansör Türünü Silmek İstediğinize Emin Misiniz ?',
                showCancelButton:true,
                showConfirmButton:true,
                confirmButtonText:'Sil',
                cancelButtonText:'İptal',
            }).then((res)=>{
                if(res.isConfirmed){
                    $.ajax({
                        url:'{{route('elevator_types.delete')}}',
                        type:'POST',
                        data: {
                            id:id,
                            "_token":'{{csrf_token()}}'
                        },
                        success:(response)=>{
                            Swal.fire({
                                icon:'success',
                                title:'Başarılı',
                                confirmButtonText: "Tamam",
                            })
                            table.ajax.reload();
                        }
                    })
                }
            })
        }
    </script>
@endsection
