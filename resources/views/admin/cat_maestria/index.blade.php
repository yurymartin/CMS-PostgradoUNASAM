@extends('theme/'.$theme.'/layout')
@section('contenido')
@include('admin.cat_maestria.create')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>FACULTADES DE LAS MAESTRIAS</h3>
                @include('admin.cat_maestria.search')
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA</th>
                            <th>ESTADO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cat_maestria as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->categoria}}</td>
                            <td>
                                @if (($cat->activo) =='1')
                                <span class="badge bg-green">{{'ACTIVADO'}}</span>
                                @else
                                <span class="badge bg-red">{{'DESACTIVADO'}}</span>
                                @endif
                            </td>
                            <td style="width: 138px">
                                <a href="{{URL::action('admin\cat_maestriaController@show',$cat->id)}}"><button
                                        class="btn btn-success"><i class="fa fa-arrow-circle-down"></i></button></a>
                                <a href="{{URL::action('admin\cat_maestriaController@edit',$cat->id)}}"><button
                                        class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button
                                        class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @include('admin.cat_maestria.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection