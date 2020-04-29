@extends('web.layout.admin')
@section('contenido')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Docentes
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Docentes</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <div class="col-md-12 img-portfolio">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th class='text-center'>Nombre</th>
                    <th class='text-center'>Especialidad</th>
                    <th class='text-center'>Universidad</th>
                    <th class='text-center'>Cursos a Cargo</th>
                    <th class='text-center'>Foto</th>
                </tr>
                <tr style="text-align: center">
                    @foreach ($docentes as $docente)
                    <td id="tabla">{{$loop->iteration}}</td>
                    <td id="tabla">{{$docente->nombres}} {{$docente->apellidos}}</td>
                    <td id="tabla">{{$docente->especialidad}}</td>
                    <td id="tabla">{{$docente->abreviatura}}</td>
                    <td id="tabla"></td>
                    <td id="tabla"><img style='width: 70px;height: 70px' src="{{ asset('img/docentes/'.$docente->imagen) }}"
                            alt=""></td>
                    @endforeach
                </tr>
            </table>
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