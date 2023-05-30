<div class="table-responsive">
    <table class="table table-hover table-lg" id="table_data">
        <thead>
        <tr>
            <th>Bildiren</th>
            <th>Asansör Anahtarı</th>
            <th>Açıklama</th>
            <th>Arıza Tarihi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faults as $fault)
            <tr>
                <td class="col-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-md">
                            <img src="{{asset('images')}}/customer.png">
                        </div>
                        <p class="font-bold ms-3 mb-0">{{$fault->getUser->name}} {{$fault->getUser->surname}}</p>
                    </div>
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{{$fault->getElevator->key_code}}</p>
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{!!$fault->description!!}</p>
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{{$fault->down_time}}</p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="float: right;">
        {!!$faults->links('pagination::bootstrap-4')!!}
    </div>
</div>
