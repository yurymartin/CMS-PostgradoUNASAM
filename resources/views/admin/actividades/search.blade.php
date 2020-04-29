{!! Form::open(array('url'=>'admin/actividades','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="row">
    <div class="col-md-4 pull-right">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="searchText" placeholder="Buscar..."
                    value="{{$searchText}}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus"></i></button>
                </span>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}