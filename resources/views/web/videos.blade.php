@extends('web.layout.admin')
@section('contenido')
<div class='container'>
    <!-- Page Heading/Breadcrumbs -->
    <div class='row'>
        <div class='col-lg-12'>
            <h1 class='page-header'>Galeria de Videos
                <small></small>
            </h1>
            <ol class='breadcrumb'>
                <li><a href='index.php'>Inicio</a>
                </li>
                <li class='active'>Videos</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach ($video as $vid)
        <div class="col-md-6">
            @php
            echo $vid->descripcion;
            @endphp
            <h3 class="text-center">{{$vid->contenido}}</h3>
        </div>

        @endforeach
    </div>

</div>
@endsection