@extends('theme/'.$theme.'/layout')
@section('contenido')
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Listado de Doctorados<a href="/admin/doctorados/create">|<button class="btn btn-success"><i
                                class="fa fa-plus"></i></button></a></h3>
                @include('admin.doctorados.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DOCTORADOS</th>
                            <th>DESCRIPCIÓN</th>
                            <th>LINK</th>
                            <th>IMAGEN</th>
                            <th>ESTADO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctorados as $doctorado)
                        <tr>
                            <td>{{$doctorado->id}}</td>
                            <td>{{$doctorado->doctorado}}</td>
                            <td>{{$doctorado->descripcion}}</td>
                            <td>{{$doctorado->link}}</td>
                            <td class="text-center">
                                <img src="{{asset('img/doctorados/'.$doctorado->ruta)}}" alt="{{$doctorado->ruta}}"
                                    height="50px" width="50px" class="img-thumbnail">
                            </td>
                            <td>
                                @if (($doctorado->activo) =='1')
                                <span class="badge bg-green">{{'activado'}}</span>
                                @else
                                <span class="badge bg-red">{{'desactivado'}}</span>
                                @endif
                            </td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\doctoradosController@show',$doctorado->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\doctoradosController@edit',$doctorado->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$doctorado->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.doctorados.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection