@extends('theme/'.$theme.'/layout')
@section('contenido')
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Consejo Directivo</h3>
            <p>Miembros del Consejo Directivo</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-user-secret"></i></div>
        <a href="admin/grados" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Administrativo</h3>
            <p>Personal Administrativo</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-university"></i></div>
        <a href="admin/personal" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Maestrias</h3>
            <p>Mantenimiento de Maestrias</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-address-book"></i></div>
        <a href="admin/maestrias" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Doctorados</h3>
            <p>Mantenimiento de Doctorados</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-university"></i></div>
        <a href="admin/doctorados" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>

<!---------------------------------------------- SEGUNDA LIENA------------------------------------------>

<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Cursos</h3>
            <p>Mantenimiento de los cursos</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-user-secret"></i></div>
        <a href="admin/cursos" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Docentes</h3>
            <p>Mantenimiento de Docentes</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-university"></i></div>
        <a href="admin/docentes" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Documentos</h3>
            <p>Mantenimiento de Documentos</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-address-book"></i></div>
        <a href="admin/documentos" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Contenido Web</h3>
            <p>El Contenido de la Pagina Web</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-university"></i></div>
        <a href="admin/contenido" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>

<!---------------------------------------------- TERCERA LINEA------------------------------------------>

<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Usuarios</h3>
            <p>Mantenimiento de los Usuarios</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-user-secret"></i></div>
        <a href="admin/usuarios" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
        <div class="inner">
            <h3 style="font-size: 30px;">Actividades</h3>
            <p>Actividades de la Escuela de Postgrado</p>
        </div>
        <div class="icon" style="top: 7px;"><i class="fa fa-university"></i></div>
        <a href="admin/actividades" id="recibosH" class="small-box-footer" style="height: 37px;"><i
                class="fa fa-arrow-circle-right" style="font-size: 30px;"></i>
        </a>
    </div>
</div>
@endsection