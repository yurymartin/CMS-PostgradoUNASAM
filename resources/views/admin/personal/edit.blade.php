@extends ('theme/AdminLTE/layout')
@section ('contenido')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar el miembro: {{$personaladministrativo->nombres}} {{$personaladministrativo->apellidos}}</h3>
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
            {!!Form::model($personaladministrativo,['method'=>'PATCH','route'=>['personal.update',$personaladministrativo->id],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="nombre">Dni</label>
                    <input type="number" name="dni" class="form-control" placeholder="dni..." value="{{$personaladministrativo->dni}}">
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-6">
                <div class="form-group">
                    <label for="">Grado</label>
                    <select name="jerarquia" id="" class="form-control">
                        @foreach ($jerarquia as $jerar)
                        @if ($personaladministrativo->jerarquia_id==$jerar->id)
                        <option value="{{$jerar->id}}" selected>{{$jerar->jerarquia}}</option>
                        @else
                        <option value="{{$jerar->id}}">{{$jerar->jerarquia}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="">Cargo</label>
                    <select name="cargo" id="" class="form-control">
                        @foreach ($cargo as $car)
                        @if ($personaladministrativo->cargos_id==$car->id)
                        <option value="{{$car->id}}" selected>{{$car->cargo}}</option>
                        @else
                        <option value="{{$car->id}}">{{$car->cargo}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="nombres..."
                        value="{{$personaladministrativo->nombres}}">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="apellidos..."
                        value="{{$personaladministrativo->apellidos}}">
                </div>
            </div>
            <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    @if (($personaladministrativo->imagen)!="")
                    <img src="{{asset('img/personal/'.$personaladministrativo->imagen)}}" height="50px" widht="100px" alt=""
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