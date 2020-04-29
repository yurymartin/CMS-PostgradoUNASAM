@extends('theme/AdminLTE/layout')
@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Registrar Nuevo Usuario</h3>
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
    {!!Form::open(array('url'=>'admin/usuarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
    <div class="box-body">
        <div class="row">
            <h4 style="margin-left: 10px">Datos personales</h4>
            <div class="box box-danger box-solid" style="width: 98%;margin-left: 10px">
                <div class="box-body">
                    <div class="col-log-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="form-group">
                            <label for="nombre">Dni</label>
                            <input type="number" name="dni" class="form-control" placeholder="Ingrese dni" required>
                        </div>
                    </div>
                    <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombres</label>
                            <input type="text" name="nombres" class="form-control" placeholder="Ingrese Nombres">
                        </div>
                    </div>
                    <div class="col-log-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese Apellidos">
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="margin-left: 10px">Credenciales</h4>
            <div class="box box-danger box-solid" style="width: 98%;margin-left: 10px">
                <div class="box-body">
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Login</label>
                            <input type="text" name="name" class="form-control" placeholder="Ingrese Login" required>
                        </div>
                    </div>
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="nombre">password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingrese Password"required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Confirmar Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirmar Password" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="">Estado</label>
                            <select name="activo" id="" class="form-control">
                                <option value="1">ACTIVADO</option>
                                <option value="0">DESACTIVADO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                    </div>
                    <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="">Tipo usuario</label>
                            <select name="tipo" id="" class="form-control">
                                @foreach ($tipo_usuarios as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
</div>
@endsection