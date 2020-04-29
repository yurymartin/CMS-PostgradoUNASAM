@extends('theme/AdminLTE/layout')
@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Nuevo Miembro del personal administrativo</h3>
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
            {!!Form::open(array('url'=>'admin/personal','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="nombre">Dni</label>
                    <input type="number" name="dni" class="form-control" placeholder="Ingrese su Dni" required>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="">Jerarquia</label>
                    <select name="jerarquia" id="" class="form-control">
                        @foreach ($jerarquia as $car)
                        <option value="{{$car->id}}">NIVEL: {{$car->jerarquia}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="">Cargo</label>
                    <select name="cargo" id="" class="form-control">
                        @foreach ($cargo as $car)
                        <option value="{{$car->id}}">{{$car->cargo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus Nombres">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus Apellidos">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagenC" id="imagenC" class="form-control" accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE,.DOCX,.docx,.PDF,.pdf">
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