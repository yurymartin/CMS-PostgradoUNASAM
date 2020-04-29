@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Miembros del personal administrativo<a href="/admin/personal/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.personal.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>JERARQUIA</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th>CARGO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personaladministrativo as $personal)
                        <tr>
                            <td>{{$personal->id}}</td>
                            <td>{{$personal->dni}}</td>
                            <td>{{$personal->nombres}}</td>
                            <td>{{$personal->apellidos}}</td>
                            <td>{{$personal->jerarquia}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/personal/'.$personal->imagen)}}" alt="{{$personal->imagen}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($personal->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td>{{$personal->cargo}}</td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\personaladministrativoController@show',$personal->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\personaladministrativoController@edit',$personal->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$personal->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.personal.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection