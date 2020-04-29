<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UNASAM Postgrado 2019</title>
    <meta name="author" content="UNASAM, Universidad Nacional Santiago Antunez de Mayolo, Postgrado2019">
    <meta name="description" content="Escuela de Postgrado UNASAM 2019">
    <meta name="keywords"
        content="unasam postgrado 2019,admision postgrado 2019,unasam,postgrado,admision postgrado,resultados postgrado unasam 2019,inscripcion postgrado unasam,inscripcion postgrado unasam 2019, admision postgrado unasam">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="{{('images/logoUnasam.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{ asset('css/gale.css')}}">
    <link rel="stylesheet" href="{{ asset('css/video.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icono.ico') }}" />
    <!------------------ SCROLL REVEAL--------------------->
    <script src="{{ asset('web/scroll/scrollreveal.js') }}"></script>
    <!----------------------------------------------------->
</head>

<body onload="abrirModal();">
    <!-- IDEM -->
    <header>
        <div class="container-fluid topBar">
            <div class="row">
                <div class="col-md-12 container">
                    <div class="col-md-2 logoBannerAlign">
                        <a class="" href="index.php">
                            <span><img class="logoBanner" src="img/social/logoUnasam.png" alt="Responsive image"></span>
                        </a>
                    </div>
                    <div class="col-md-8 universidad">
                        <p>
                            <h1 class="titulo">UNIVERSIDAD NACIONAL "SANTIAGO ANTUNEZ DE MAYOLO"</h1>
                        </p>
                        <p>
                            <h4 class="text-center">"Una nueva Universidad para el Desarrollo"</h4>
                        </p>
                        <p>
                            <h3 class="subtitulo">ESCUELA DE POSTGRADO</h3>
                        </p>
                    </div>
                    <div class="logoBannerAlign col-md-2">
                        <a href="https://www.facebook.com/epgunasam2019/" style="margin-right: 300px"><img src="{{ asset('img/logo.png') }}" alt=""
                                style="width: 70%;height: 70%;border-radius: 100%"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="social">
            <ul>
                <li><a href="https://www.facebook.com/epgunasam2019/" target="_blank" class="icon-facebook"><span
                            class="fa fa-facebook"></span></a></li>
                <li><a href="https://twitter.com/POSGRADOUNASAM" target="_blank" class="icon-twitter"><span
                            class="fa fa-twitter"></span></a></li>
                <li><a href="https://plus.google.com/u/0/101698653546977208065" target="_blank" class="icon-mail"><span
                            class="fa fa-google-plus"></span></a></li>
                <li><a href="https://www.youtube.com/channel/UCp7H7SLUEc13EF9rdLgfP9Q" target="_blank"
                        class="icon-pinterest"><span class="fa fa-youtube"></span></a></li>
            </ul>
        </div>


        <section>
            <nav class="navbar menu navbar-default" role="navigation">
                <div class="container">
                    <div class="nav-header">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar1">
                                <span class="sr-only">Menu</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar1">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> INICIO</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-education"></span> NOSOTROS<span
                                            class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-doble-doctorado">
                                        <li><a href="nosotros">Palabras de Bienvenida</a></li>
                                        <li><a href="{{URL::to('historia')}}">Reseña Histórica</a></li>
                                        <li><a href="personalAdministrativo">Personal Administrativo</a></li>
                                        <li><a href="consejoDirectivo">Consejo Directivo</a></li>
                                        <li><a href="docentes">Docentes</a></li>
                                    </ul>
                                </li>
                                <li class="admision2019"><a href="admision" style="    
                                        background: #e11b1b;border: #7e5757 solid 6px;text-shadow: azure;
                                        font-size: 17px;
                                        text-decoration: underline;
                                        text-shadow: 2px 2px 4px #b88b8b;"><span
                                            class="glyphicon glyphicon-align-justify"></span> ADMISION 2019</a></li>

                                <li class="dropdown">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-education"></span> MAESTRIAS<span
                                            class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-doble">
                                        <div class="row row-menu-doble">
                                            <div class="col-md-6 colorPrimerPanel">

                                                @foreach ($catmaestria1 as $cmaestria)

                                                <li class="dropdown-header">
                                                    <h4>{{$cmaestria->categoria}}</h4>
                                                </li>
                                                @foreach ($maestrias as $maestria)
                                                @if (($cmaestria->id)==($maestria->catmaestria_id))
                                                <li><a href="{{$maestria->link}}">{{$maestria->maestria}} <img
                                                            src='{{ asset('') }}' alt=''></a></li>
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                            <div class="col-md-6 colorSegundoPanel">
                                                @foreach ($catmaestria2 as $cmaestria)

                                                <li class="dropdown-header">
                                                    <h4>{{$cmaestria->categoria}}</h4>
                                                </li>
                                                @foreach ($maestrias as $maestria)
                                                @if (($cmaestria->id)==($maestria->catmaestria_id))
                                                <li><a href="{{$maestria->link}}">{{$maestria->maestria}} <img
                                                            src='{{ asset('') }}' alt=''></a></li>
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-education"></span> DOCTORADOS<span
                                            class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-doble-doctorado">
                                        @foreach ($doctorado as $cmaestria)

                                        <li><a href="{{$cmaestria->link}}">{{$cmaestria->doctorado}} <img
                                                    src='' alt=''></a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href="http://koha.unasam.edu.pe/"><span class="glyphicon glyphicon-book"></span>
                                        BIBLIOTECA VIRTUAL</a></li>
                                <li><a href="http://sgapg.unasam.edu.pe/login"><span
                                            class="glyphicon glyphicon-book"></span> SGAPG UNASAM</a></li>
                                {{--<li><a href="/login"><span class="glyphicon glyphicon-user"></span> ACCEDER</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
    </header>
    <div>
        @yield('contenido')
    </div>
    <footer style="background-color: #6a0909">
        <div class="container" id="footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-3" style="font-weight: bold;">
                        <h5><strong>ESCUELA DE POSTGRADO</strong></h5>
                        <div class="row">
                            <h5>Secretaria de la Dirección </h5>
                            <ul class="text-justify">
                                <li>Teléfono:(043) 640020 - Anexo 3102 </li>
                            </ul>
                            <h5>Secretaria Académica </h5>
                            <ul class="text-justify">
                                <li>Teléfono: (043) 640020 - Anexo 3104 </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pull-right">
                        <address class="text-right textShadowFooter">
                            <i class="icon-location"></i> Av. Sim&oacute;n Bol&iacute;var S/N - Vill&oacute;n Alto<br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="post-footer" id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    Postgrado Unasam, <span class="mit-license"><strong>Todos los Derechos Reservados 2019
                            ©</strong></span>
                    <p>Administrado por:<a class="developers" href="http://ogtise.unasam.edu.pe/" target="_blank"> Web
                            Master Postgrado</a> / <a class="developers" href="admin/" target="_blank"> Admin</a></p>
                </div>
                <div class="col-sm-4 text-right">
                    <img src="http://counter1.allfreecounter.com/private/contadorvisitasgratis.php?c=fe53fb09e0d1cedeb4f85162fd923eda"
                        border="0" title="contador de visitas" alt="contador de visitas">
                </div>
            </div>
        </div>
    </div>
    <script>
        window.sr = ScrollReveal();
            sr.reveal('.nav',{
                duration: 1000,
                origin: 'bottom'
            });
        window.sr = ScrollReveal();
            sr.reveal('.logoBannerAlign',{
                duration: 2000,
                origin: 'top',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('.universidad',{
                duration: 2000,
                origin: 'top',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#footer',{
                duration: 3000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#footer2',{
                duration: 3000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
                sr.reveal('.page-header',{
                    duration: 2000,
                    origin: 'left',
                    distance: '300px'
                });
        window.sr = ScrollReveal();
                sr.reveal('.panel-group',{
                    duration: 2000,
                    origin: 'right',
                    distance: '300px'
                });
                window.sr = ScrollReveal();
                sr.reveal('.table',{
                    duration: 2000,
                    origin: 'left',
                    distance: '300px'
                });       
    </script>
    <script>
        (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12';
                        fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        $(document).ready(function(e) {
                    $(".ver").click(function(e) {
                        var idContenido = $(this).attr("id");
                        $("#nt").val(idContenido);
                        //alert(idContenido);
                        
                    });
                    
                });
    </script>
    <script>
        (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    </div>
    <!--/.container-->
    </section>

    <script src="{{asset('web/js/jquery.js')}}"></script>
    <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/js/jquery.prettyPhoto.js')}}"></script> <!-- 1 -->
    <script src="{{asset('web/js/main.js')}}"></script> <!-- 1 -->
    <script src="{{asset('web/js/wow.min.js')}}"></script> <!-- 1 -->
    <script src="{{asset('web/js/mainBar.js')}}"></script>
    <script src="{{asset('web/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('web/js/contact_me.js')}}"></script>

    <script>
        $('.carousel').carousel({interval: 4500})
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
                    $("#imagenes a[rel^='prettyPhoto']").prettyPhoto({theme: 'default',slideshow:2500, autoplay_slideshow:true});	
                });
    </script>

</body>

</html>