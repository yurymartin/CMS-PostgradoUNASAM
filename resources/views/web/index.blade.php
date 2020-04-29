@extends('web.layout.admin')
@section('contenido')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-solid" style="margin-left: 10px;margin-right: 25px">
            <div class="box-body">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($slider as $sli)
                        @if (($loop->iteration)==1)
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        @else
                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                        @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($slider as $sli)
                        @if (($loop->iteration)==1)
                        <div class="item {{$sli->clase}}">
                            <img src="{{asset('/contenido/'.$sli->link)}}" alt="{{$sli->contenido}}"
                                style="width: 1500px;height: 600px">
                            <div class="carousel-caption">
                                <p class="text-danger">{{$sli->contenido}}</p>
                                {{$sli->parrafo}}
                            </div>
                        </div>
                        @else
                        <div class="item" id="descripSlider">
                            <img src="{{asset('/contenido/'.$sli->link)}}" alt="{{$sli->contenido}}"
                                style="width: 1500px;height: 600px">
                            <div class="carousel-caption">
                                <p class="text-danger">{{$sli->contenido}}</p>
                                {{$sli->parrafo}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="col-md-3">
                <div class="clients-comments text-center" id="director">
                    @foreach ($direc as $dir)
                    <img width='200px' heigth='300px' src='{{asset('contenido/'.$dir->link)}}' class="img-circle"
                        alt="">
                    <p>
                        <small><cite title="Dr. Loel"><b>{{$dir->contenido}}</b></cite></small><br>
                        <small><cite title="Director"><b>Director Escuela de Postgrado</b></cite></small>
                    </p>
                    @endforeach
                </div>
                <div id="lista">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href='programacionclases' class="barraDerecha">Programación de
                                Clases</a>
                        </li>
                        <li role="presentation"><a href="resoluciones" class="barraDerecha">Resoluciones</a></li>
                        <li role="presentation"><a href="documentos_norm" class="barraDerecha">Documentos Normativos</a>
                        </li>
                        <li role="presentation"><a href="#" class="barraDerecha" data-toggle="modal"
                                data-target="#modal_fut">Formato de Solicitud</a></li>
                        <li role="presentation"><a href="contacto" class="barraDerecha">Contactenos</a></li>
                    </ul>
                </div>
                <hr>
                <div id="lista2">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="noticias" class="barraDerecha">Ultimas Noticias</a></li>
                        <li role="presentation"><a href="imagenes" class="barraDerecha">Galeria de Imagenes</a></li>
                        <li role="presentation"><a href="videos" class="barraDerecha">Galeria de Videos</a></li>
                    </ul>
                </div>
                <hr class="bg-primary">
                <div id="lista3">
                    <h5 class="text-center bg-primary rounded repositorio">Repositorios</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="http://koha.unasam.edu.pe/" class="barraDerecha"
                                target="blank">Biblioteca Postgrado UNASAM</a></li>
                        <li role="presentation"><a href="http://repositorio.unasam.edu.pe/" class="barraDerecha"
                                target="blank">Repositorio de Tesis UNASAM</a></li>
                        <li role="presentation"><a href="http://cybertesis.unmsm.edu.pe/" class="barraDerecha"
                                target="blank">Repositorio de Tesis San Marcos</a></li>
                        <li role="presentation"><a href="http://cybertesis.uni.edu.pe/" class="barraDerecha"
                                target="blank">Repositorio de Tesis UNI</a></li>
                        <li role="presentation"><a
                                href="http://web2.unfv.edu.pe/sitio/index.php/estudiantes/repositorio-cientifico"
                                class="barraDerecha" target="blank">Repositorio de Tesis Federico Villareal </a>
                        </li>
                        <li role="presentation"><a href="http://www.unheval.edu.pe/biblioteca/?p=227"
                                class="barraDerecha" target="blank">Biblioteca UNHEVAL</a></li>
                        <li role="presentation"><a href="http://repositorio.up.edu.pe/" class="barraDerecha"
                                target="blank">Repositorio Tesis Universidad del Pácifico</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 bg-info" id="noticias">
                <!-- NOTICIAS -->
                <p style="font-family: 'Abril Fatface', cursive;font-size: 25px" class="text-primary">
                    <strong>NOTICIAS</strong></p>
                @foreach ($docnoticia as $row)
                <div class='col-md-3'>
                    <div class='recent-work-wrap'>
                        <div class='overlay'>
                            <div class='recent-work-inner'>
                                <a>
                                    <h5 style='color: #A30000' class="text-center text-uppercase">
                                        {{$row->contenido}}</h5>
                                </a>
                                <a href="{{ asset('contenido/'.$row->link) }}"><img src="{{ asset('img/noticia.png') }}"
                                        alt="" style="width: 150px"></a>
                                <button class='btn' style="background-color: #6a0909"><a
                                        href="{{ asset('contenido/'.$row->link) }}" class='fa fa-eye'
                                        style="color: white">Ver más...</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div style="padding-top: 40%" id="lista" class="container">
                    <p style="font-family: 'Abril Fatface', cursive;font-size: 25px" class="text-primary">
                        <strong>VIDEOS</strong></p>
                    @foreach ($video as $vid)
                    @php
                    echo $vid->descripcion;
                    @endphp
                    @break
                    @endforeach
                    <p></p>
                    <button class='btn' style="background-color: #6a0909"><a href="/videos" style="color: white">MAS
                            VIDEOS...</a></button>
                </div>
                <div id="tabla3" class="container" style="padding-top: 5%;margin-right: 100px">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <a href="http://www.admisionunasam.com/postgrado/inscripcion" target="_blank"><img
                                    src="{{ asset('img/banner_admision.png') }}" class='img-responsive' alt=""></a>
                            <a href="https://drive.google.com/file/d/1UytIeqQFmIiRmaWFKY8RihlOfPvUtjhV/view?fbclid=IwAR1DbeA-NOmOpmVb4zqYv1I0Jn7vPMWElkr5mlp_PW6jTsEPtxkkME5XTNM"
                                target="_blank"><img src="{{ asset('img/proceso.png') }}" class='img-responsive'
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <a href="https://drive.google.com/file/d/1eOW3tMwkmwCXRJk4AVST4LoN1X5U90RE/view?fbclid=IwAR2t9hST4AyhyiUSi4Db6P30vyKL8ztE_5zbtn6hqeIO9dYongVqWIuAGbw"
                                target="_blank"><img src="{{ asset('img/reglamento.png') }}" class='img-responsive'
                                    alt=""></a><a
                                href="https://docs.google.com/forms/d/e/1FAIpQLSfhb4tDKpzs-FJ33EOUXYacsL-pDYgzWBS8iZsZxRS6wdf85Q/viewform?fbclid=IwAR3meB0cDdWNh4aaVaMchOUbk0O2uOeAkpZ8sGqyRlRKoef4wimWB7OzcRE"
                                target="_blank"><img src="{{ asset('img/preinscripciones.png') }}"
                                    class='img-responsive' alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FUT -->
<div class="modal fade" id="modal_fut">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formato de Solicitud</h4>
            </div>
            <div class="modal-body">
                @include('web.fut')
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<p></p>
<div class="row" id="actividades">
    <div class="col-md-12">
        <div class="container bg-warning">
            @foreach ($actividades as $acti)
            @if (($loop->iteration)%2==0)
            <div class="col-md-6" style="margin-top: 20px;margin-bottom: 20px">
                <img src="{{ asset('img/actividades/'.$acti->imagen) }}" alt="{{$acti->actividad}}"
                    style="width: 800px;height: 400px" class="img img-responsive">
                <p></p>
            </div>
            <div class="col-md-6" style="margin-top: 20px;margin-bottom: 20px">
                @php
                echo $acti->descripcion
                @endphp
            </div>
            @else
            <div class="col-md-6" style="margin-top: 20px;margin-bottom: 20px">
                @php
                echo $acti->descripcion
                @endphp
            </div>
            <div class="col-md-6" style="margin-top: 20px;margin-bottom: 20px">
                <img src="{{ asset('img/actividades/'.$acti->imagen) }}" alt="{{$acti->actividad}}"
                    style="width: 800px;height: 400px" class="img img-responsive">
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<script>
    window.sr = ScrollReveal();
        sr.reveal('#director',{
            duration: 2000,
            origin: 'left',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('#lista',{
            duration: 1000,
            origin: 'left',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('#lista2',{
            duration: 2000,
            origin: 'left',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('#lista3',{
            duration: 3000,
            origin: 'left',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('.repositorio',{
            duration: 1000,
            origin: 'botton',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('#noticias',{
            duration: 2000,
            origin: 'right',
            distance: '300px'
        });
        window.sr = ScrollReveal();
        sr.reveal('#actividades',{
            duration: 2000,
            origin: 'right',
            distance: '300px'
        });
        
        
        
</script>
@endsection