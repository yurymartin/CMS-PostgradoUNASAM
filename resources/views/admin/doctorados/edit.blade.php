@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el doctorado: {{$doctorados->doctorado}}</h3>
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
            {!!Form::model($doctorados,['method'=>'PATCH','route'=>['doctorados.update',$doctorados->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">doctorados</label>
                    <input type="text" name="doctorado" class="form-control" value="{{$doctorados->doctorado}}" placeholder="doctorado...">
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
                    <label for="">imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <textarea name="descripcion" id="" class="form-control" cols="50"
                        rows="5">{{$doctorados->descripcion}}</textarea>
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