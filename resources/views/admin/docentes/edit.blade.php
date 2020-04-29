@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el miembro: {{$docentes->nombres}} {{$docentes->apellidos}}</h3>
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
    </div>
    <div class="box-body">
        <div class="row">
            {!!Form::model($docentes,['method'=>'PATCH','route'=>['docentes.update',$docentes->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-6">
                <div class="form-group">
                    <label for="nombre">Dni</label>
                <input type="number" name="dni" class="form-control" placeholder="dni..." value="{{$docentes->dni}}">
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="nombres..." value="{{$docentes->nombres}}">
                </div>
            </div>
            <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="apellidos..." value="{{$docentes->apellidos}}">
                </div>
            </div>
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="activo" id="" class="form-control">
                        @if ($docentes->activo=='1')
                        <option value="1" selected>ACTIVADO</option>
                        <option value="0">DESACTIVADO</option>
                        @else
                        <option value="1">ACTIVADO</option>
                        <option value="0" selected>DESACTIVADO</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="">Especialidad</label>
                    <select name="especialidad" id="" class="form-control">
                        @foreach ($especialidades as $espe)
                        @if ($docentes->especialidad_id==$espe->id)
                        <option value="{{$espe->id}}" selected>{{$espe->especialidad}}</option>
                        @else
                        <option value="{{$espe->id}}">{{$espe->especialidad}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="">Universidad</label>
                    <select name="universidad" id="" class="form-control">
                        @foreach ($universidades as $universidad)
                        @if ($docentes->universidad_id==$universidad->id)
                        <option value="{{$universidad->id}}" selected>{{$universidad->nombre}}</option>
                        @else
                        <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="col-log-7 col-md-7 col-sm-7 col-xs-12">
                <div class="form-group">
                    @if (($docentes->imagen)!="")
                    <img src="{{asset('img/docentes/'.$docentes->imagen)}}" height="50px" widht="100px" alt=""
                        class="img-responsive">
                    @endif
                </div>
            </div>
            <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
    @endsection