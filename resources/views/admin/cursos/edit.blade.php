@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el curso <b>{{$cursos->curso}}</b></h3>
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
            {!!Form::model($cursos,['method'=>'PATCH','route'=>['cursos.update',$cursos->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">cursos</label>
                    <input type="text" name="cursos" class="form-control" placeholder="contenido..."
                        value="{{$cursos->curso}}">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Horario</label>
                    <input type="file" name="horario" class="form-control">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="">Maestria</label>
                    <select name="maestria" id="" class="form-control">
                        @foreach ($maestrias as $maestria)
                        @if ($maestria->id==$cursos->maestria_id)
                        <option value="{{$maestria->id}}" selected>{{$maestria->maestria}}</option>
                        @else
                        <option value="{{$maestria->id}}">{{$maestria->maestria}}</option>
                        @endif
                        @endforeach
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