@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Miembros del consejo directivo<a href="/admin/consejo/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.consejo_directivo.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>GRADO</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>FACULTAD</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th>CARGO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consejo as $conse)
                        <tr>
                            <td>{{$conse->id}}</td>
                            <td>{{$conse->dni}}</td>
                            <td>{{$conse->abreviatura}}</td>
                            <td>{{$conse->nombres}}</td>
                            <td>{{$conse->apellidos}}</td>
                            <td>{{$conse->nombre}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/consejo/'.$conse->imagen)}}" alt="{{$conse->imagen}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($conse->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td>{{$conse->cargo}}</td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\consejo_directivoController@show',$conse->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\consejo_directivoController@edit',$conse->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$conse->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.consejo_directivo.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection