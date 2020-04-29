@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar la maestria: {{$maestrias->maestria}}</h3>
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
            {!!Form::model($maestrias,['method'=>'PATCH','route'=>['maestrias.update',$maestrias->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Maestria</label>
                    <input type="text" name="maestria" class="form-control" value="{{$maestrias->maestria}}"
                        placeholder="maestria...">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Categoria Maestria</label>
                    <select name="cat_maestria" id="" class="form-control">
                        @foreach ($cat_maestria as $categoria)
                        @if ($categoria->id==$maestrias->catmaestria_id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->categoria}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="imagen">link</label>
                    <input type="file" name="link" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <textarea name="descripcion" id="" class="form-control" cols="50"
                        rows="5">{{$maestrias->descripcion}}</textarea>
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