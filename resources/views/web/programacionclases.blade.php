@extends('web.layout.admin')
@section('contenido')
<div class="row">
    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Programacion de clases 2019
                <small>Postgrado</small>
                <div class="fb-share-button" data-href="" data-layout="button_count"></div>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a>
                </li>
                <li class="active">Programacion de clases 2019</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="container bg-primary text-center">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">MAESTRIAS</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        @foreach ($catmaestria as $cat)
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#{{$cat->id}}">
                                        <strong>{{$cat->categoria}}</strong>
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$cat->id}}" class="panel-collapse collapse">
                                <div class="box-body content">
                                    @foreach ($cursos as $curso)
                                    @if (($curso->id)==($cat->id))
                                    <ol>
                                        <li class="bg-info" style="margin-right: 30px">
                                            <a target="bank" href="{{ asset('img/cursos/'.$curso->horario) }}">{{$curso->maestria}}<img src='img/new.gif' alt=''>
                                            </a>
                                        </li>
                                    </ol>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<hr>
<!-----------------------------------------------------------FIN ACORDION---------------------------------------->
@endsection