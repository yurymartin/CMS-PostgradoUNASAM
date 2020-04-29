@extends('theme/'.$theme.'/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Editar Cargo: {{$facultad->nombre}}</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="box-body">
        <div class="row">
            {!!Form::model($facultad,['method'=>'PATCH','route'=>['facultad.update',$facultad->id]])!!}
            {{Form::token()}}
            <div class="col-log-10 col-md-10 col-sm-10 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Facultad</label>
                    <input type="text" name="nombre" class="form-control" value="{{$facultad->nombre}}" placeholder="facultad...">
                </div>
            </div>
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Abreviatura</label>
                    <input type="text" name="abreviatura" class="form-control" value="{{$facultad->abreviatura}}">
                </div>
            </div>
            <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection