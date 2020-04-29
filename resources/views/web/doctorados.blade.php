@extends('web.layout.admin')
@section('contenido')

<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Doctorados
                <small>total de doctorados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a>
                </li>
                <li class="active">Doctorados</li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    @foreach($doctorado as $doct)
    <div class="col-md-12">
        <a name="{{$doct->doctorado}}"></a>
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <h2>
                            <center>{{$doct->doctorado}}</center>
                        </h2>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row" style="padding-bottom: 2em;">
            <div class="col-md-6">
                <a href="{{$doct->link}}" target="_blank">
                    <img class="img-responsive img-hover" style="width: 500px;height: 300px" src="{{ asset('img/doctorados/'.$doct->ruta) }}" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{$doct->link}}" target="_blank">Ver Doctorado</i></a>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection