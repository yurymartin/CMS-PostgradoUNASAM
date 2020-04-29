@extends('web.layout.admin')
@section('contenido')
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Noticias
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a>
                </li>
                <li class="active">Noticias</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    @foreach ($documento as $row)
    <div class='wellNoti row text-center'>
        <br>
        <div class='col-md-12 img-portfolio text-primary text-center'>
            <h3 align='center'><strong>{{$row->contenido}}</strong></h3>
            <a href="{{ asset('contenido/'.$row->link) }}"><img src="{{ asset('img/noticia.png') }}" alt=""
                    style="width: 150px"></a>
        </div>
        <button class='btn btn-secondary'><a href="{{ asset('contenido/'.$row->link) }}" class='fa fa-eye'> Ver
                más...</a></button>
        <div class='col-md-12 img-portfolio'>
            <p class='pull-right'><small><cite title=''>Fuente: EPG - UNASAM </cite></small></p>
        </div>
    </div>
    <hr>
    @endforeach
    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
    @endsection