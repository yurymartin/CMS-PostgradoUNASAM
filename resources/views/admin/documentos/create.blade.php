@extends('theme/AdminLTE/layout')
@section('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Nuevo Documento</h3>
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
            {!!Form::open(array('url'=>'admin/documentos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Documento</label>
                    <input type="text" name="documento" class="form-control" placeholder="Ingrese Documento">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="file" name="link" class="form-control"  accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE,.DOCX,.docx,.PDF,.pdf">
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="">Tipo Documento</label>
                    <select name="tipo_documento" id="" class="form-control">
                        @foreach ($tipodocumentos as $tipodocumento)
                        <option value="{{$tipodocumento->id}}">{{$tipodocumento->tipo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-3 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="estado" id="" class="form-control">
                        <option value="1">ACTIVADO</option>
                        <option value="0">DESACTIVADO</option>
                    </select>
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