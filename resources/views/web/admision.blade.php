@extends('web.layout.admin')
@section('contenido')
<section id="content">
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Admisión 2019
          <small>Postgrado</small>
          <div class="fb-share-button" data-href="" data-layout="button_count"></div>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php">Inicio</a>
          </li>
          <li class="active">Admisión 2019</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <!-----------------------------------------------------------ACORDION---------------------------------------->
    <div class="row bg-primary text-center">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border" id="titulo">
            <h3 class="box-title">MAESTRIAS</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="tabla">
            <div class="box-group" id="accordion">
              @foreach ($catmaestria1 as $cat)
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
                    @foreach ($maestrias as $maestria)
                    @if (($maestria->catmaestria_id)==($cat->id))
                    <ol>
                      <li class="bg-info" style="margin-right: 30px"><a
                          href="{{$maestria->link}}">{{$maestria->maestria}}<img src='img/new.gif' alt=''></a></li>
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
      <!-- /.box -->
    </div>
    <hr>
    <!-----------------------------------------------------------FIN ACORDION---------------------------------------->

    <div class="row text-center" style="background-color: coral;padding-bottom: 10px">
      <div class="col-md-12">
        <div class="box box-solid" id="tabla2">
          <div class="box-header with-border">
            <h3 class="box-title">DOCTORADOS</h3>
          </div>
          <div class="box-body">
            @foreach ($doctorado as $row)
            <a href=" {{$row->link}} " class="btn btn-block btn-danger">{{$row->doctorado}} <img src='img/new.gif'
                alt=''></a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- FIN TITULO -->
    <hr>
    <!----------------------------------------------------ACTIVIDADES------------------------------------------------->
    <div class="row text-center" id="tabla3">
      <div class="col-md-12">
        <div class="col-md-8">
          @include('web.admisionSecciones')
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <a href="http://www.admisionunasam.com/postgrado/inscripcion" target="_blank"><img
                src="{{ asset('img/banner_admision.png') }}" class='img-responsive' alt=""></a>
          </div>
          <div class="panel panel-default">
            <a href="https://drive.google.com/file/d/1UytIeqQFmIiRmaWFKY8RihlOfPvUtjhV/view?fbclid=IwAR1DbeA-NOmOpmVb4zqYv1I0Jn7vPMWElkr5mlp_PW6jTsEPtxkkME5XTNM"
              target="_blank"><img src="{{ asset('img/proceso.png') }}" class='img-responsive' alt=""></a>
          </div>
          <div class="panel panel-default">
            <a href="https://drive.google.com/file/d/1eOW3tMwkmwCXRJk4AVST4LoN1X5U90RE/view?fbclid=IwAR2t9hST4AyhyiUSi4Db6P30vyKL8ztE_5zbtn6hqeIO9dYongVqWIuAGbw"
              target="_blank"><img src="{{ asset('img/reglamento.png') }}" class='img-responsive' alt=""></a>
          </div>
          <div class="panel panel-default">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfhb4tDKpzs-FJ33EOUXYacsL-pDYgzWBS8iZsZxRS6wdf85Q/viewform?fbclid=IwAR3meB0cDdWNh4aaVaMchOUbk0O2uOeAkpZ8sGqyRlRKoef4wimWB7OzcRE"
              target="_blank"><img src="{{ asset('img/preinscripciones.png') }}" class='img-responsive' alt=""></a>
          </div>
        </div>
      </div>
    </div>
    <!---------------------------------------------------------------------------------------------------------------->
    <!--/.row-->
    <script>
        window.sr = ScrollReveal();
            sr.reveal('.page-header',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#tabla',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#titulo',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#tabla2',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#tabla2',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
          window.sr = ScrollReveal();
            sr.reveal('#tabla3',{
                duration: 2000,
                origin: 'bottom',
                distance: '300px'
            });
    </script>
  @endsection