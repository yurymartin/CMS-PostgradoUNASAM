@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Listado de cursos<a href="/admin/cursos/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.cursos.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CURSO</th>
                            <th>HORARIO</th>
                            <th>ESTADO</th>
                            <th>MAESTRIA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->id}}</td>
                            <td>{{$curso->curso}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/cursos/'.$curso->horario)}}" alt="{{$curso->horario}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($curso->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td>{{$curso->maestria}}</td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\cursosController@show',$curso->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\cursosController@edit',$curso->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$curso->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.cursos.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection