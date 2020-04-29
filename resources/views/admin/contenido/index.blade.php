@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Listado de Contenido Web<a href="/admin/contenido/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.contenido.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CONTENIDO</th>
                            <th>DESCRIPCIÓN</th>
                            <th>LINK</th>
                            <th>CLASE</th>
                            <th>ESTADO</th>
                            <th>TIPO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contenido as $conte)
                        <tr>
                            <td>{{$conte->id}}</td>
                            <td>{{$conte->contenido}}</td>
                            <td>{{$conte->descripcion}}</td>
                            <td>{{$conte->link}}</td>
                            <td>{{$conte->clase}}</td>
                            <td>
                                @if (($conte->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td>{{$conte->tipo}}</td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\contenidoController@show',$conte->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\contenidoController@edit',$conte->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$conte->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.contenido.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection