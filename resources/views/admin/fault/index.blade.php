@extends('admin.layouts.master')
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

    <!-- Update Modal -->
    <div class="modal fade" id="faultsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Asansör Güncelleme</h5>
                </div>
                <div class="modal-body">
                    <form id="formUpdate" name="formUpdate" class="form-horizontal">
                        <div class="form-group">
                            <label>Arıza Durumu</label> <br>
                            <input type="radio" name="durum" value="0">
                            <label>Devam Ediyor</label>
                            <input type="radio" name="durum" value="1">
                            <label>Çözüldü</label><br>
                        </div>
                        <div class="form-group">
                            <label>Arıza Açıklaması</label>
                            <textarea id="editor" name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Kapat</span>
                            </button>
                            <button type="button" id="updateButton" onclick="updateFault()" class="btn ml-1 text-white" style="background-color: #F28123;" data-bs-dismiss="modal">
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

    <!-- Detail Modal Start -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">İletişim Bilgisi Detayı</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row row-cols-1" style="margin-bottom: 30px;border-bottom: 1px solid lightgrey">
                            <div class="col">
                                <h6>Ad:</h6>
                                <p id="name"></p>
                                <hr>
                            </div>
                            <div class="col">
                                <h6>Soyad:</h6>
                                <p id="surname"></p>
                                <hr>
                            </div>
                            <div class="col">
                                <h6>Email:</h6>
                                <p id="email"></p>
                                <hr>
                            </div>
                            <div class="col">
                                <h6>Telefon:</h6>
                                <p id="phone"></p>
                                <hr>
                            </div>
                            <div class="col">
                                <h6>Adres:</h6>
                                <p id="adress"></p>
                                <hr>
                            </div>
                            <div class="col">
                                <h6>Açıklama:</h6>
                                <p id="message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kapat</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Modal End -->
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
    <script>
        function detailModal(id) {
            console.log(id)
            $("#detailModal").modal('show')
            $.ajax({
                url:'{{route('fault.detail')}}',
                type:'GET',
                data: {
                    id:id,
                },
                success:(response)=>{
                    table.ajax.reload();
                    console.log(response);
                    document.getElementById("name").innerHTML = response[1].user.name;
                    document.getElementById("surname").innerHTML = response[1].user.surname;
                    document.getElementById("email").innerHTML = response[1].user.email;
                    document.getElementById("phone").innerHTML = response[1].user.phone;
                    document.getElementById("adress").innerHTML = response[1].user.address;
                    document.getElementById("message").innerHTML = response[0].fault_description;
                }
            })
        }
    </script>
    <script>
        function updateFault(){
            var form = document.getElementById('formUpdate');
            var formData = new FormData(form);
            var fault = document.getElementById('fault-id').value
            formData.append('fault_id', fault);
            $.ajax({
                type: 'POST',
                url: '{{route('faults.update')}}',
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    table.ajax.reload();
                    var elements = document.getElementById("formUpdate").elements;
                    for (var i = 0, element; element = elements[i++];) {
                        element.value = "";
                    }
                    $('#faultsUpdateModal').modal("toggle");
                    dataTable.ajax.reload();
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
                    });
                }
            });
        }
    </script>
    <script>
        function productsDelete(id){
            Swal.fire({
                icon:'warning',
                title:'Emin Misiniz',
                text:'Ürünü Silmek İstediğinize Emin Misiniz ?',
                showCancelButton:true,
                showConfirmButton:true,
                confirmButtonText:'Sil',
                cancelButtonText:'İptal',
            }).then((res)=>{
                if(res.isConfirmed){
                    $.ajax({
                        url:'{{route('fault.delete')}}',
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
