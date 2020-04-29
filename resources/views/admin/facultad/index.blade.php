@extends('theme/'.$theme.'/layout')
@section('contenido')
@include('admin.facultad.create')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Facultades</h3>
                @include('admin.facultad.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FACULTAD</th>
                            <th>ABREVIATURA</th>
                            <th>ACTIVO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facultad as $facu)
                        <tr>
                            <td>{{$facu->id}}</td>
                            <td>{{$facu->nombre}}</td>
                            <td>{{$facu->abreviatura}}</td>
                            <td>
                                @if (($facu->activo)=='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\facultadController@show',$facu->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\facultadController@edit',$facu->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$facu->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.facultad.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection