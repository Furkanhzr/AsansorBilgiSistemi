@extends('online.layouts.master')
@section('title','Online İşlemler')
@section('title-page','Ödeme & Borçlar')
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
            <h3>Ödeme & Borçlar</h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="billsTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Ödeme Türü</th>
                        <th>Açıklama</th>
                        <th>Ücret</th>
                        <th>Durum</th>
                        <th>Ödenme Tarihi</th>
                        <th>Ödenme Yap</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Transaction Modal Start -->
    <div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ödeme Yap</h5>
                </div>
                <div class="modal-body">
                    <form id="formCreate" enctype="multipart/form-data">
                        <div class="text-center">
                            <img src="{{asset('images')}}/payment (2).png" style="object-fit: cover; width: 265px;">
                        </div>
                        <input hidden name="id" id="id">
                        <div class="form-group">
                            <label>Kartın Üstündeki İsim</label>
                            <input class="form-control" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>Kart Numarası</label>
                            <input class="form-control" type="text" id="cardNo" required>
                        </div>

                        <div class="form-group">
                            <label>Son Kullanma Tarihi</label>
                            <input class="form-control" id="date" type="text" placeholder="MM/YY" required>
                        </div>

                        <div class="form-group">
                            <label>CVV</label>
                            <input class="form-control" id="cvv" type="text" required>
                        </div>
                    </form>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Geri</span>
                        </button>
                        <button onclick="createBill()" type="submit" style="background-color: #F28123; border-color: #F28123;" class="btn btn-secondary text-white" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Ödeme Yap</span>
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
        $(document).ready(function(){
            $('#cardNo').inputmask('9999-9999-9999-9999');
            $('#date').inputmask('99/99');
            $('#cvv').inputmask('999');
        });
    </script>
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
                {data: 'description'},
                {data: 'cost'},
                {data: 'status'},
                {data: 'payment_time'},
                {data: 'pay', orderable: false, searchable: false},
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Turkish.json",
            },
        });
    </script>
    <script>
        function billModal(id) {
            $("#billModal").modal('show')
            document.getElementById('id').value = id
        }

        function createBill() {
            $.ajax({
                url: '{{route('bills.pay.post')}}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: document.getElementById('id').value,
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
                            html: 'Ödeme Başarılı!',
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
