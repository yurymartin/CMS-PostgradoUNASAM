{!! Form::open(array('url'=>'admin/documentos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buesqueda" value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus"></i></button>
        </span>
    </div>
</div>
{{Form::close()}}