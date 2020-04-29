@extends('web.layout.admin')
@section('contenido')
<!-- Page Content -->
<div class='container'>
    <!-- Page Heading/Breadcrumbs -->
    <div class='row'>
        <div class='col-lg-12'>
            <h1 class='page-header'>Personal Administrativo
                <small></small>
            </h1>
            <ol class='breadcrumb'>
                <li><a href='index.php'>Inicio</a></li>
                <li class='active'>Nosotros</li>
                <li class='active'>Personal Administrativo</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" id="titulo">
        <div class=" col-md-12 container">
            <div class="container">
                <div class="panel panel-default">
                    <div class='panel-heading'>
                        <h4><i class='fa fa-fw fa-compass'></i> Personal Administrativo</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="text-center bg-primary container" style="color: black">
        <br>
        @foreach ($personal as $person)
        @if (($person->jerarquia)=='1')
        <div class="panel text-center" style="width: 200px;display: inline-block" id="paneles">
            <div class="panel-heading bg-primary">
                <p><strong>{{$person->cargo}}</strong></p>
            </div>
            <div class="panel-body">
                <p>{{$person->nombres}} {{$person->apellidos}}</p>
                <br>
            </div>
        </div>
        @endif
        @endforeach
        <p></p>
        @foreach ($personal as $person)
        @if (($person->jerarquia)=='2')
        <div class="panel text-center" style="width: 200px;display: inline-block" id="paneles2">
            <div class="panel-heading bg-danger">
                <p>{{$person->cargo}}</p>
            </div>
            <div class="panel-body">
                <p>{{$person->nombres}} {{$person->apellidos}}</p>
                <br>
            </div>
        </div>
        @endif
        @endforeach
        <p></p>
        @foreach ($personal as $person)
        @if (($person->jerarquia)=='3')
        <div class="panel" style="width: 200px;display: inline-block" id="paneles3">
            <div class="panel-heading bg-warning">
                <p>{{$person->cargo}}</p>
            </div>
            <div class="panel-body">
                <p>{{$person->nombres}} {{$person->apellidos}}</p>
                <br>
            </div>
        </div>
        @endif
        @endforeach
    </section>
    <div class="row">
        <div class='col-md-12' id="imagen">
            <br>
            <img class='img-responsive' style="width: 600px;height: 500px;margin: 0 auto"
                src='{{ asset('img/frontis.jpg') }}' alt=''>
        </div>
    </div>
    <script>
        window.sr = ScrollReveal();
            sr.reveal('.page-header',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#titulo',{
                duration: 2000,
                origin: 'top',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#paneles',{
                duration: 1000,
                origin: 'bottom',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#paneles2',{
                duration: 2000,
                origin: 'bottom',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#paneles3',{
                duration: 3000,
                origin: 'bottom',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#imagen',{
                duration: 3000,
                origin: 'right',
                distance: '300px'
            });
    </script>
    @endsection