@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>DOCENTES<a href="/admin/docentes/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.docentes.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th>ESPECIALIDAD</th>
                            <th>UNIVERSIDAD</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docentes as $docente)
                        <tr>
                            <td>{{$docente->id}}</td>
                            <td>{{$docente->dni}}</td>
                            <td>{{$docente->nombres}}</td>
                            <td>{{$docente->apellidos}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/docentes/'.$docente->imagen)}}" alt="{{$docente->imagen}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($docente->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td>{{$docente->especialidad}}</td>
                            <td>{{$docente->nombre}}</td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\docentesController@show',$docente->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\docentesController@edit',$docente->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$docente->id}}" data-toggle="modal">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.docentes.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection