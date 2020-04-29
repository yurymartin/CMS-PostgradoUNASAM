<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Nueva jerarquia</h3>
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
            {!!Form::open(array('url'=>'admin/jerarquias','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-log-10 col-md-10 col-sm-10 col-xs-12">
                <div class="form-group">
                    <label for="jerarquias">Jerarquia</label>
                    <input type="text" name="jerarquias" class="form-control" placeholder="Ingrese Jerarquia">
                </div>
            </div>
            <div class="col-log-2 col-md-2 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="activo" id="" class="form-control">
                        <option value="1" selected>ACTIVADO</option>
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