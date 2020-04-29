@extends('theme/'.$theme.'/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Editar actividad: {{$actividades->actividad}}</h3>
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
            {!!Form::model($actividades,['method'=>'PATCH','route'=>['actividades.update',$actividades->id],'autocomplete'=>'off','files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Actividad</label>
                <input type="text" name="actividad" class="form-control" placeholder="actividad..." value="{{$actividades->actividad}}">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Fecha</label>
                <input type="date" name="fecha" class="form-control" placeholder="Fecha..." value="{{$actividades->fecha}}">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Hora</label>
                <input type="time" name="hora" class="form-control" placeholder="hora..." value="{{$actividades->hora}}">
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control" src="{{ asset('img/actividades/'.$actividades->imagen) }}">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" placeholder="descripcion...">{{$actividades->descripcion}}</textarea>
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