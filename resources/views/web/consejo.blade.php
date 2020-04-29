@extends('web.layout.admin')
@section('contenido')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Consejo Directivo<small></small></h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Consejo Directivo</li>
            </ol>
            <div class="row">
                <div class="container">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            @foreach ($consejo_director as $consejod)
                            <th colspan='4' class='text-center'>{{$consejod->cargo}}</th>
                            <tr>
                                <td id="tabla" class="text-center" width='30px'>{{$loop->iteration}}</td>
                                <td id="tabla" class="text-uppercase">{{$consejod->grado}} {{$consejod->nombres}}
                                    {{$consejod->apellidos}}</td>
                                <td id="tabla" class="text-center"><img style='width: 70px;height: 70px'
                                        src="{{ asset('img/consejo/'.$consejod->imagen) }}" alt=""></td>
                                <td></td>
                            </tr>
                            @endforeach
                            <th colspan='4' class='text-center'>DIRECTORES DE UNIDADES</th>
                            @foreach ($consejo_unidades as $consejou)
                            @php
                            $i = 0;
                            @endphp
                            <tr>
                                <td id="tabla" width='30px' class="text-center">{{$loop->iteration}}</td>
                                <td id="tabla" class="text-uppercase">{{$consejou->grado}} {{$consejou->nombres}}
                                    {{$consejou->apellidos}}</td>
                                <td id="tabla" class="text-center"><img style='width: 70px;height: 70px'
                                        src="{{ asset('img/consejo/'.$consejou->imagen) }}" alt=""></td>
                                <td id="tabla" class="text-center">{{$consejou->abreviatura}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
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
            sr.reveal('#tabla',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
    </script>
    @endsection