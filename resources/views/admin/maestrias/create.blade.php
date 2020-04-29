@extends('theme/AdminLTE/layout')
@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Nuevo Maestria</h3>
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
            {!!Form::open(array('url'=>'admin/maestrias','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Maestria</label>
                    <input type="text" name="maestria" class="form-control" placeholder="maestria...">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Categoria Maestria</label>
                    <select name="cat_maestria" id="" class="form-control">
                        @foreach ($cat_maestria as $cat)
                        <option value="{{$cat->id}}">{{$cat->categoria}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="estado" id="" class="form-control">
                        <option value="1">ACTIVADO</option>
                        <option value="0">DESACTIVADO</option>
                    </select>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="imagen">link</label>
                    <input type="file" name="link" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <textarea name="descripcion" id="" class="form-control" cols="50" rows="5"
                        placeholder="descripcion..."></textarea>
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