@extends('theme/AdminLTE/layout')
@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Nuevo Docente</h3>
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
            {!!Form::open(array('url'=>'admin/docentes','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-6">
                <div class="form-group">
                    <label for="nombre">Dni</label>
                    <input type="number" name="dni" class="form-control" placeholder="Ingrese su Dni" required>
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus Nombres">
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus Apellidos">
                </div>
            </div>
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="activo" id="" class="form-control">
                        <option value="1">ACTIVADO</option>
                        <option value="0">DESACTIVADO</option>
                    </select>
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="">Especialidad</label>
                    <select name="especialidad" id="" class="form-control">
                        @foreach ($especialidades as $especialidad)
                        <option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="">Universidad</label>
                    <select name="universidad" id="" class="form-control">
                        @foreach ($universidades as $universidad)
                        <option value="{{$universidad->id}}">{{$universidad->nombre}} - {{$universidad->abreviatura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-7 col-md-7 col-sm-7 col-xs-12">
                <div class="form-group">
                    <label for="">Imagen</label>
                    <input type="file" name="imagen" class="form-control"  accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE,.DOCX,.docx,.PDF,.pdf">
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
</div>

@endsection