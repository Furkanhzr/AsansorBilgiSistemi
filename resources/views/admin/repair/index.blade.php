@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Bakımlar')
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
                <h3>Bakım Listesi</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="repairsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Asansör ID</th>
                        <th>Bakım Durumu</th>
                        <th>Açıklama</th>
                        <th>Bakım Tarihi</th>
                        @if (auth()->user()->can('create fatura'))
                            <th>Faturalandırma</th>
                        @endif
                        <th>Detay</th>
                        @if (auth()->user()->can('update bakimlar'))
                            <th>Güncelleme</th>
                        @endif
                        @if (auth()->user()->can('delete bakimlar'))
                            <th>Silme </th>
                        @endif
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="repairsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Asansör Güncelleme</h5>
                </div>
                <div class="modal-body">
                    <form id="formUpdate" name="formUpdate" class="form-horizontal">
                        <div class="form-group">
                            <label>Bakım Durumu</label> <br>
                            <input type="radio" name="durum" value="0">
                            <label>Bakım Yapılmadı</label>
                            <input type="radio" name="durum" value="1">
                            <label>Bakım Yapıldı</label><br>
                        </div>
                        <div class="form-group">
                            <label>Bakım Açıklaması</label>
                            <textarea id="editor" name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Kapat</span>
                            </button>
                            <button type="button" id="updateButton" onclick="updateRepair()" class="btn ml-1 text-white" style="background-color: #F28123;" data-bs-dismiss="modal">
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

    <!-- Transaction Modal Start -->
    <div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Fatura Oluştur</h5>
                </div>
                <div class="modal-body">
                    <form id="formCreate" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Fiyat</label>
                            <input class="form-control" type="number" name="cost" id="cost" placeholder="00" required>
                        </div>

                        <div class="form-group">
                            <label>Açıklama</label>
                            <input class="form-control" type="text" name="description" id="description" placeholder="Açıklama" required>
                        </div>

                        <input hidden name="transaction_type" id="transaction_type" value="2">
                        <input hidden name="repair_id" id="repair_id">
                    </form>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kapat</span>
                        </button>
                        <button onclick="createBill()" type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kaydet</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Transaction Modal End -->

@endsection
@section('js')
    <script>
        var table = $('#repairsTable').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            ajax: '{{route('repair.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'elevator_id'},
                {data: 'status'},
                {data: 'description'},
                {data: 'repair_time'},
                    @if (auth()->user()->can('create fatura'))
                {data: 'transaction', orderable: false, searchable: false},
                    @endif
                {data: 'show', orderable: false, searchable: false},
                    @if (auth()->user()->can('update bakimlar'))
                {data: 'update', orderable: false, searchable: false},
                    @endif
                    @if (auth()->user()->can('delete bakimlar'))
                {data: 'delete', orderable: false, searchable: false},
                    @endif
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        } );
    </script>

    <script>
        function updateRepair(){
            var form = document.getElementById('formUpdate');
            var formData = new FormData(form);
            var fault = document.getElementById('repair-id').value
            formData.append('repair_id', fault);
            $.ajax({
                type: 'POST',
                url: '{{route('repair.update')}}',
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
                    $('#repairsUpdateModal').modal("toggle");
                    table.ajax.reload();
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
        function detailModal(id) {
            console.log(id)
            $("#detailModal").modal('show')
            $.ajax({
                url:'{{route('repair.detail')}}',
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
                    document.getElementById("message").innerHTML = response[0].repair_description;
                }
            })
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
                        url:'{{route('repair.delete')}}',
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

    <script>
        function billModal(id) {
            $("#billModal").modal('show')
            document.getElementById('repair_id').value = id
        }
        function createBill() {
            $.ajax({
                url: '{{route('repair.transaction')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    repair_id: document.getElementById('repair_id').value,
                    cost: document.getElementById('cost').value,
                    description: document.getElementById('description').value,
                    transaction_type: document.getElementById('transaction_type').value,
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
                            html: 'Fatura Başarıyla Oluşturuldu!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }
                    table.ajax.reload();
                    $('#formCreate').trigger("reset");
                    $('#billModal').modal('hide');
                },
                error: function (data) {
                }
            });
        }

    </script>

@endsection
