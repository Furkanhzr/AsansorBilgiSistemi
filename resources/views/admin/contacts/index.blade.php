@extends('admin.layouts.master')
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
                        <th>Detay</th>
                        @if (auth()->user()->can('update iletisim'))
                        <th>Okundu Bilgisi</th>
                        @endif
                        @if (auth()->user()->can('delete iletisim'))
                        <th>Silme</th>
                        @endif
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

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
                                <h6>Mesaj:</h6>
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
                {data: 'detail', orderable: false, searchable: false},
                @if (auth()->user()->can('update iletisim'))
                {data: 'status', orderable: false, searchable: false},
                @endif
                @if (auth()->user()->can('delete iletisim'))
                {data: 'delete', orderable: false, searchable: false},
                @endif
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

        function detailModal(id) {
            $("#detailModal").modal('show')
            $.ajax({
                url:'{{route('contacts.detail')}}',
                type:'GET',
                data: {
                    id:id,
                },
                success:(response)=>{
                    table.ajax.reload();
                    console.log(response);
                    document.getElementById("name").innerHTML = response.name;
                    document.getElementById("surname").innerHTML = response.surname;
                    document.getElementById("email").innerHTML = response.email;
                    document.getElementById("phone").innerHTML = response.phone;
                    document.getElementById("message").innerHTML = response.message;
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
