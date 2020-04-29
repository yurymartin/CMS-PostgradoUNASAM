@extends('theme/'.$theme.'/layout')
@section('contenido')
@include('admin.especialidades.create')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Especialidades</h3>
                @include('admin.especialidades.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ESPECIALIDADES</th>
                            <th>ACTIVO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($especialidades as $especialidad)
                        <tr>
                            <td>{{$especialidad->id}}</td>
                            <td>{{$especialidad->especialidad}}</td>
                            <td>
                                @if (($especialidad->activa)=='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\especialidadesController@show',$especialidad->id)}}"><button class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\especialidadesController@edit',$especialidad->id)}}"><button  class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$especialidad->id}}" data-toggle="modal">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.especialidades.modal')  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection