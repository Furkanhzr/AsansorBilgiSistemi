@extends('admin.layouts.master')
@section('title','Admin Paneli')
@section('title-page','Rol Oluştur')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <span class="float-right">
                    </span>
            </h6>
        </div>
        <div class="card-body">
            <h3>Rol Oluşturma</h3>
            <div id="basic-form">
                <form role="form" action="{{route('role.create.post')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adı</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                       placeholder="Adı" style="width: 300px;">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" style="overflow-x: unset;">
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <th>İzin</th>
                                            <th width="100">Oku</th>
                                            <th width="100">Oluştur</th>
                                            <th width="100">Güncelle</th>
                                            <th width="100">Sil</th>
                                        </tr>
                                        @foreach($permissions->get_permissions() as $key => $permission)
                                            <tr>
                                                <td>
                                                    <label class="control-label">{{$permission}}</label>
                                                </td>
                                                <td><input type="checkbox" name="permissions[]" value="read {{$key}}"></td>
                                                <td><input type="checkbox" name="permissions[]" value="create {{$key}}"></td>
                                                <td><input type="checkbox" name="permissions[]" value="update {{$key}}"></td>
                                                <td><input type="checkbox" name="permissions[]" value="delete {{$key}}"></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-block btn-secondary btn-lg">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
