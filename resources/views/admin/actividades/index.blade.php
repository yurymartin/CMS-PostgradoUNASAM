@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>ACTIVIDADES<a href="/admin/actividades/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>@include('admin.actividades.search')</tr>
                        <tr>
                            <th>ID</th>
                            <th>ACTIVIDAD</th>
                            <th>DESCRIPCIÓN</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{$actividad->id}}</td>
                            <td>{{$actividad->actividad}}</td>
                            <td>{{$actividad->descripcion}}</td>
                            <td>{{$actividad->fecha}}</td>
                            <td>{{$actividad->hora}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/actividades/'.$actividad->imagen)}}" alt="{{$actividad->imagen}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($actividad->activo)=='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\actividadesController@show',$actividad->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\actividadesController@edit',$actividad->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$actividad->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.actividades.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection