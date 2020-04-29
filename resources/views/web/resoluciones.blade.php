@extends('web.layout.admin')
@section('contenido')
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Resoluciones
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Resoluciones</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <div class="col-md-8 img-portfolio">
            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th style="">Número de Resolución</th>
                        <th class="text-center">Ver</th>
                    </tr>

                    @foreach ($resolucion as $row)

                    @php

                    $i=1;
                    @endphp

                    <tr>
                        <td>@php
                            echo $i;
                            @endphp</td>
                        <td>{{$row->nom_documento}}</td>
                        <td><a href='{{ asset('/documentos/'.$row->link) }}' target='_blank'><i style='position: relative;'
                                    class='fa          fa-file-pdf fa-stack-1x fa'><strong>ABRIR</strong></i></a></td>
                    </tr>

                    @php
                    $i++;
                    @endphp
                    @endforeach



                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
    @endsection