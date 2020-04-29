@extends('web.layout.admin')
@section('contenido')
<div class='container'>

    <!-- Page Heading/Breadcrumbs -->
    <div class='row'>
        <div class='col-lg-12'>
            <h1 class='page-header'>Galeria de Imágenes
                <small></small>
            </h1>
            <ol class='breadcrumb'>
                <li><a href='index.php'>Inicio</a>
                </li>
                <li class='active'>Imágenes</li>
            </ol>
        </div>
    </div>
    @foreach ($foto as $fot)
    <div class="col-md-9">
        <a class="black-text" href='{{asset('contenido/'.$fot->link)}}' data-size="1600x1067">
            <img src='{{asset('contenido/'.$fot->link)}}' class="img-responsive">
            <h3 class="text-center">{{$fot->contenido}}</h3>
        </a>
        <div class="h-30"></div>
    </div>
    @endforeach

    @endsection