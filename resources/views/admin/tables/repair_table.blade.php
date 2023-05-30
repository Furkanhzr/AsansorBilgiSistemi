<div class="table-responsive">
    <table class="table table-hover table-lg">
        <thead>
        <tr>
            <th>Adres</th>
            <th>Asansör Anahtarı</th>
            <th>Açıklama</th>
            <th>Bakım Tarihi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($repairs as $repair)
            <tr>
                <td class="col-3">
                    @if(isset($repair->getElevator->getUser))
                        <p class="font-bold ms-3 mb-0">{{$repair->getElevator->getUser->address}}</p>
                    @else
                        <p class="font-bold ms-3 mb-0">Belirtilmedi</p>
                    @endif
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{{$repair->getElevator->key_code}}</p>
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{!!$repair->description!!}</p>
                </td>
                <td class="col-auto">
                    <p class=" mb-0">{{$repair->repair_time}}</p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="float: right;">
        {!!$repairs->links('pagination::bootstrap-4')!!}
    </div>
</div>
