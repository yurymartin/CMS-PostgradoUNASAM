@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el usuarios: {{$usuarioss->name}}</h3>
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
            {!!Form::model($usuarioss,['method'=>'PATCH','route'=>['usuarios.update',$usuarioss->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="box-body">
                <div class="row">
                    <h4 style="margin-left: 20px">Credenciales</h4>
                    <div class="box box-danger box-solid" style="width: 97%;margin-left: 20px">
                        <div class="box-body">
                            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                                <label for="nombre">Nuevo password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nombre">Confirmar Nuevo Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" name="imagen" class="form-control">
                                </div>
                            </div>
                            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <label for="">Tipo usuario</label>
                                    <select name="tipo" id="" class="form-control">
                                        @foreach ($tipo_usuarios as $tipo)
                                        @if ($tipo->id==$usuarioss->tipousuario_id)
                                        <option value="{{$tipo->id}}" selected>{{$tipo->tipo}}</option>
                                        @else
                                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                        @endif
                                        {{$tipo->tipo}}
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
            @endsection