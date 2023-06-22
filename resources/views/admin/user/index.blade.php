@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Kullanıcılar')
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
                <h3>Kullanı Listesi</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="userTables" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad-Soyad</th>
                        <th>Telefon Numarası</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Doğum Tarihi</th>
                        <th>Abonelik Durumu</th>
                        <th>Güncelleme</th>
                        <th>Silme </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="usersUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Asansör Güncelleme</h5>
                </div>
                <div class="modal-body">
                    <form id="formUpdate" name="formUpdate" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" required>
                            <label>Telefon Numarası</label>
                            <input type="number" name="phoneUpdate" class="form-control" required>
                            <label>İsim</label>
                            <input type="text" name="nameUpdate" class="form-control" required>
                            <label>Soyisim</label>
                            <input type="text" name="surnameUpdate" class="form-control" required>
                            <label>İl</label>
                            <select class="form-control" name="ilUpdate" id="il">
                                <option value="">İli Seçin</option>
                            </select>
                            <label>İlçe</label>
                            <select class="form-control" name="ilceUpdate" id="ilce">
                                <option value="">İlçe Seçin</option>
                            </select>
                            <label>Mahalle</label>
                            <select class="form-control" name="mahalleUpdate" id="mahalle">
                                <option value="">Mahalle Seçin</option>
                            </select>
                            <label>Sokak-Cadde</label>
                            <select class="form-control" name="sokakUpdate" id="sokak">
                                <option value="">Sokak-Cadde Seçin</option>
                            </select>
                            <label>Bina Numarası</label>
                            <input type="text" name="buildingUpdate" class="form-control" required>
                            <label>Email</label>
                            <input type="text" name="emailUpdate" class="form-control" required>
                            <label>Doğum Tarihi</label>
                            <input type="date" name="date_of_birthUpdate" class="form-control" required>
                        </div>
                        <button type="button" id="updateButton" onclick="updateUser()" class="btn ml-1 text-white" style="background-color: #F28123;" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" >Güncelle</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Modal End -->
@endsection
@section('js')
    <script>
        var table = $('#userTables').DataTable( {
            order: [
                [0,'DESC']
            ],
            "dom": "<'row'<'col mt-1'l><'col-9 mt-1'f><'col 'tr>> <'row'<'col 'i><'col mt-1'p>>",
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            ajax: '{{route('user.fetch')}}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'phone'},
                {data: 'email'},
                {data: 'address'},
                {data: 'date_of_birth'},
                {data: 'subscription'},
                {data: 'update', orderable: false, searchable: false},
                {data: 'delete', orderable: false, searchable: false},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        });
    </script>

    <script>
        function updateUser(){
            var form = document.getElementById('formUpdate');
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '{{route('user.update')}}',
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
                    $('#usersUpdateModal').modal("toggle");
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
                        url:'{{route('user.delete')}}',
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
        $.ajax({
            url: '{{route('get.city')}}',
            dataType: "json",
            success: function (response) {
                document.getElementById('il').innerHTML='';
                var satir = $('<option>', {
                    value:null,
                    text: 'İl Seçiniz'
                });
                $("#il").append(satir)
                for(var i = 0; i < response.length; i++){
                    satir = $('<option>', {
                        value:response[i].city_key ,
                        text: response[i].city_title
                    });
                    $("#il").append(satir)
                }
            }
        });
    </script>
    <script>
        $("#il").on("change",function(){
            var data = new Object();
            data.city = $("#il").val();
            console.log(data.city)
            $.ajax({
                url: '{{route('get.town')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'İlçe Seçiniz'
                    });
                    for(var i = 0; i < response.length; i++){
                        satir = $('<option>', {
                            value:response[i].town_key ,
                            text: response[i].town_title
                        });
                        $("#ilce").append(satir)
                    }
                }
            });
        })
    </script>
    <script>
        $("#ilce").on("change",function(){
            var data = new Object();
            data.town = $("#ilce").val();
            $.ajax({
                url: '{{route('get.neighbourhood')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'Mahalle Seçiniz'
                    });
                    document.getElementById('mahalle').innerHTML='';
                    for(var i = 0; i < response.length; i++){
                        satir = $("<option>").text(response[i].neighbourhood_title)
                        satir = $('<option>', {
                            value:response[i].neighbourhood_key ,
                            text: response[i].neighbourhood_title
                        });
                        $("#mahalle").append(satir)
                    }
                }
            });
        })
    </script>
    <script>
        $("#mahalle").on("change",function(){
            var data = new Object();
            data.street = $("#mahalle").val();
            $.ajax({
                url: '{{route('get.street')}}',
                data: data,
                dataType: "json",
                success: function (response) {
                    var satir = $('<option>', {
                        value:null,
                        text: 'Sokak Seçiniz'
                    });                    document.getElementById('sokak').innerHTML='';
                    for(var i = 0; i < response.length; i++){
                        satir = $('<option>', {
                            value:response[i].street_id ,
                            text: response[i].street_title
                        });
                        $("#sokak").append(satir)
                    }
                }
            });
        })
    </script>
    <script>
        function updateUserForm(id) {
            var phone = $('[name="phoneUpdate"]');
            var name = $('[name="nameUpdate"]');
            var surname = $('[name="surnameUpdate"]');
            var il = $('[name="ilUpdate"]');
            var ilce = $('[name="ilceUpdate"]');
            var mahalle = $('[name="mahalleUpdate"]');
            var sokak = $('[name="sokakUpdate"]');
            var bina = $('[name="buildingUpdate"]');
            var mail = $('[name="emailUpdate"]');
            var date_of_birth = $('[name="date_of_birthUpdate"]');
            $.ajax({
                type: 'GET',
                url: '{{route('user.get')}}',
                data: {id: id},
                success: function (data) {

                    $('[name="user_id"]').val(id);
                    phone.val(data.phone);
                    name.val(data.name);
                    surname.val(data.surname);
                    il.val(data.il);
                    ilce.val(data.ilce);
                    mahalle.val(data.mahalle);
                    sokak.val(data.sokak);
                    bina.val(data.bina);
                    mail.val(data.email);
                    date_of_birth.val(data.date_of_birth);
                    $('#usersUpdateModal').modal("toggle");

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
@endsection
