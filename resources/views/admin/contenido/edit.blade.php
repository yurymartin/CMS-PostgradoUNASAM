@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el contenido web: <b>{{$contenido->contenido}}</b></h3>
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
            {!!Form::model($contenido,['method'=>'PATCH','route'=>['contenido.update',$contenido->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Contenido</label>
                    <input type="text" name="contenido" class="form-control" placeholder="contenido..."
                        value="{{$contenido->contenido}}">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="file" name="link" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Tipo contenido</label>
                    <select name="tipo_contenido" id="" class="form-control">
                        @foreach ($tipocontenido as $tipo)
                        @if ($tipo->id==$contenido->tipocontenido_id)
                        <option value="{{$tipo->id}}" selected>{{$tipo->tipo}}</option>
                        @else
                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <textarea name="descripcion" id="" class="form-control" cols="50" rows="5"
                        placeholder="descripcion...">{{$contenido->descripcion}}</textarea>
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