@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Asansörler')
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
                        <h3>Asansörler</h3>
                    </div>
                    <div class="col">
                        <span>
                            <a class="btn float-end text-white" style="background-color: #F28123;" lass="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#elevatorsCreateModal" >Asansör Oluştur</a>
                        </span>
                    </div>
                </div>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="elevatorsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Asansör Türü</th>
                        <th>Müşteri</th>
                        <th>Satış Durumu</th>
                        <th>Anahtar Kodu</th>
                        <th>Güncelleme</th>
                        <th>Silme</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- Create Modal -->
            <div class="modal fade" id="elevatorsCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Asansör Oluşturma</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formCreate" name="formCreate" class="form-horizontal">
                                <input type="hidden" name="idCreate" id="idCreate">
                                <div class="form-group">
                                    <label for="elevatorTypeCreate">Asansör Türü</label>
                                    <select class="form-control" name="elevator_type_id" id="elevatorTypeCreate">
                                        <option selected disabled>Seçim Yapınız</option>
                                        @foreach($elevatorTypes as $elevatorType)
                                            <option value="{{$elevatorType->id}}">{{$elevatorType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userCreate">Müşteri</label>
                                    <select class="form-control" name="user_id" id="userCreate">
                                        <option value="{{null}}" selected>Seçim Yapınız</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keyCodeCreate">Anahtar Kodu</label>
                                    <input type="text" name="key_code" class="form-control" id="keyCodeCreate"
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
            <div class="modal fade" id="elevatorsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Asansör Güncelleme</h5>
                        </div>
                        <div class="modal-body">
                            <form id="formUpdate" name="formUpdate" class="form-horizontal">
                                <input type="hidden" name="idUpdate" id="idUpdate">
                                <div class="form-group">
                                    <label for="elevatorTypeUpdate">Asansör Türü</label>
                                    <select class="form-control" name="elevator_type_id" id="elevatorTypeUpdate">
                                        <option selected disabled>Seçim Yapınız</option>
                                        @foreach($elevatorTypes as $elevatorType)
                                            <option value="{{$elevatorType->id}}">{{$elevatorType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userUpdate">Müşteri</label>
                                    <select class="form-control" name="user_id" id="userUpdate">
                                        <option value="{{null}}" selected>Seçim Yapınız</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keyCodeUpdate">Anahtar Kodu</label>
                                    <input type="text" name="key_code" class="form-control" id="keyCodeUpdate"
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
        var table = $('#elevatorsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: '{{route('elevators.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'elevator_type_id'},
                {data: 'user_id'},
                {data: 'status'},
                {data: 'key_code'},
                {data: 'update', orderable: false, searchable: false},
                {data: 'delete', orderable: false, searchable: false},
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
        $(document).ready(function(){
            $('#keyCodeCreate').inputmask('****************');
            $('#keyCodeUpdate').inputmask('****************');
        });
    </script>
    <script>
        $('#createButton').click(function () {
            $.ajax({
                url: '{{route('elevators.create')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    elevator_type_id: document.getElementById('elevatorTypeCreate').value,
                    user_id: document.getElementById('userCreate').value,
                    key_code: document.getElementById('keyCodeCreate').value,
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
                            html: 'Asansör Başarıyla Eklendi!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    table.ajax.reload();
                    $('#formCreate').trigger("reset");
                    $('#elevatorsCreateModal').modal('hide');
                },
                error: function (data) {
                }
            });
        });

        $('body').on('click', '.updateElevatorsModal', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '{{route("elevators.edit",'/')}}'+'/'+id,
                method: 'GET',
                success: function (response) {
                    $('#idUpdate').val(response.id);
                    $('#elevatorTypeUpdate').val(response.elevator_type_id);
                    $('#userUpdate').val(response.user_id);
                    $('#keyCodeUpdate').val(response.key_code);
                },
                error: function (error) {
                }
            });
        });

        $('#updateButton').click(function () {
            $.ajax({
                url: '{{route('elevators.update')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: document.getElementById('idUpdate').value,
                    elevator_type_id: document.getElementById('elevatorTypeUpdate').value,
                    user_id: document.getElementById('userUpdate').value,
                    key_code: document.getElementById('keyCodeUpdate').value,
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
                            html: 'Asansör Başarıyla Güncellendi!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    table.ajax.reload();
                    $('#formUpdate').trigger("reset");
                    $('#elevatorsUpdateModal').modal('hide');
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

        function elevatorsDelete(id){
            Swal.fire({
                icon:'warning',
                title:'Emin Misiniz',
                text:'Asansör Silmek İstediğinize Emin Misiniz ?',
                showCancelButton:true,
                showConfirmButton:true,
                confirmButtonText:'Sil',
                cancelButtonText:'İptal',
            }).then((res)=>{
                if(res.isConfirmed){
                    $.ajax({
                        url:'{{route('elevators.delete')}}',
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
