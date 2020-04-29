@extends('web.layout.admin')
@section('contenido')

<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Maestr&iacute;as
                <small>total de maestrias</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a>
                </li>
                <li class="active">Maestr&iacute;as</li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    @foreach($catmaestria as $catm)
    <div class="col-md-12">
        <a name="{{$catm->categoria}}"></a>
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <h2>
                        <center>{{$catm->categoria}}</center>
                        </h2>
                    </p>
                </div>
            </div>
        </div>
        @foreach($maestrias as $maest)
        @if($catm->id == $maest->catmaestria_id)
        <div class="row" style="padding-bottom: 2em;">
            <div class="col-md-6">
                <a href="{{$maest->link}}" target="_blank">
                    <img class="img-responsive img-hover" style="width: 500px;height: 300px" src="{{ asset('img/maestrias/'.$maest->ruta) }}"
                        alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h3>{{$maest->maestria}}</h3>
                <h4></h4>
                <p>

                </p>
                <a class="btn btn-primary" href="{{$maest->link}}"
                    target="_blank">Ver Maestría</i></a>
            </div>
            <a name="{{$maest->maestria}}"></a>
        </div>
        

        @endif

        @endforeach

    </div>
    @endforeach

</div>

@endsection