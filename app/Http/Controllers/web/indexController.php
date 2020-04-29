<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '2')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $direc = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '5')
                ->orderBy('id')
                ->take(1)
                ->get();

            $docnoticia = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '1')
                ->orderBy('id')
                ->get();

            $futmaestria = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '15')
                ->where('id', '=', '1')
                ->orderBy('id')
                ->take(1)
                ->get();
            $futdoctorado = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '15')
                ->where('id', '=', '3')
                ->orderBy('id')
                ->take(1)
                ->get();
            $actividades = DB::table('actividades')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $foto = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '19')
                ->orderBy('id')
                ->get();

            $video = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '4')
                ->orderBy('id')
                ->get();

            return view('web.index', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'direc', 'docnoticia', 'futmaestria', 'futdoctorado', 'actividades', 'foto', 'video'));
        }
    }

    public function historia(Request $request)
    {
        if ($request) {
            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.reseniaHistorica', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function nosotros(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.nosotros', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function resolu(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '6')
                ->orderBy('id')
                ->get();

            return view('web.resoluciones', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion'));
        }
    }
    public function docunorm(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '7')
                ->orderBy('id')
                ->get();

            return view('web.documentos_norm', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion'));
        }
    }
    public function contacto(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '7')
                ->orderBy('id')
                ->get();

            return view('web.contacto', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion'));
        }
    }
    public function noticia(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '1')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '7')
                ->orderBy('id')
                ->get();
            $direc = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '21')
                ->orderBy('id')
                ->get();

            return view('web.noticias', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion', 'direc'));
        }
    }
    public function galfoto(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '17')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '7')
                ->orderBy('id')
                ->get();

            $direc = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '21')
                ->orderBy('id')
                ->get();

            $foto = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '3')
                ->orderBy('id')
                ->get();

            return view('web.imagenes', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion', 'direc', 'foto'));
        }
    }
    public function galvideo(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '17')
                ->orderBy('id')
                ->get();
            $resolucion = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '7')
                ->orderBy('id')
                ->get();

            $direc = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '21')
                ->orderBy('id')
                ->get();

            $foto = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '19')
                ->orderBy('id')
                ->get();

            $video = DB::table('contenido')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipocontenido_id', '=', '4')
                ->orderBy('id')
                ->get();

            return view('web.videos', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'resolucion', 'direc', 'foto', 'video'));
        }
    }
    public function admi(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $direc = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '21')
                ->orderBy('id')
                ->take(1)
                ->get();

            $docnoticia = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '17')
                ->orderBy('id')
                ->get();

            $fut = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '6')
                ->orderBy('id')
                ->take(1)
                ->get();

            $actividades = DB::table('actividades')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->get();

            return view('web.admision', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'direc', 'docnoticia', 'fut', 'actividades'));
        }
    }
    public function maestan(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Adm_Neg_MBA', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function maestgp(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Gestion_Publica', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function maestai(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Agroindustria', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestdc(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Dir_Cons', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function maestga(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Gestion_Amb', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestgr(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Gestion_Ries_Camb_Clim', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function maestih(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Ing_Rec_Hid', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestie(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Ing_Estructural', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestgo(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Gest_Oper', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestti(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Tec_Infor_Sist_Inf', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestsa(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Audit_Seg_Inf', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestda(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Desa_Agra_Sost', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestdes(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_DES', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestdeb(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_EB', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestpge(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_PGE', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestcli(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_CL', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestacg(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.mestria_ACG', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestfin(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.mestria_finanzas', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maesttf(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_TF', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestss(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_SS', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestgim(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_GIM', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestmat(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Matematica', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestgpro(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Ge_Pro', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestges(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Ges_Salud', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestciepen(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Cien_Pen', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestderciv(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_Der_Civil', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestdpaj(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_DPAJ', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function maestcods(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.maestrias.maestria_CODS', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dadministracion(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_admi', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dcomputacion(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_IngComputacion', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dciensalud(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_CIENSALUD', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dcontabilidad(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_CONTABILIDAD', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dcienpol(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_DCP', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function deconomia(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_ECONOMIA', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function deducacion(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_EDUCACION', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function denfermeria(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_ENFERMERIA', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dambiental(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_INGENIERIA_AMBIENTAL', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }
    public function dobstetricia(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            return view('web.doctorados.doctorado_OBSTETRICIA', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento'));
        }
    }

    public function consejo(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $consejo_director = DB::table('consejodirectivos as cd')
                ->join('personas as p', 'cd.persona_id', '=', 'p.id')
                ->join('cargos as c', 'cd.cago_id', '=', 'c.id')
                ->join('facultades as f', 'cd.facultad_id', '=', 'f.id')
                ->join('gradosacademicos as ga', 'cd.gradoacademico_id', '=', 'ga.id')
                ->where('cd.borrado', '0')
                ->where('cd.activo', '=', '1')
                ->where('cd.cago_id', '=', '1')
                ->select('cd.id', 'c.cargo', 'p.nombres', 'p.apellidos', 'ga.abreviatura as grado', 'cd.imagen', 'f.abreviatura')
                ->orderBy('cd.id')
                ->get();

            $consejo_unidades = DB::table('consejodirectivos as cd')
                ->join('personas as p', 'cd.persona_id', '=', 'p.id')
                ->join('cargos as c', 'cd.cago_id', '=', 'c.id')
                ->join('facultades as f', 'cd.facultad_id', '=', 'f.id')
                ->join('gradosacademicos as ga', 'cd.gradoacademico_id', '=', 'ga.id')
                ->select('cd.id', 'c.cargo', 'p.nombres', 'p.apellidos', 'ga.abreviatura AS grado', 'cd.imagen', 'f.abreviatura')
                ->where('cd.borrado', '0')
                ->where('cd.activo', '=', '1')
                ->where('cd.cago_id', '=', '2')
                ->orderBy('cd.id')
                ->get();

            return view('web.consejo', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'consejo_director', 'consejo_unidades'));
        }
    }
    public function personal(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $personal = DB::table('personaladministrativo as pe')
                ->join('personas as p', 'pe.persona_id', '=', 'p.id')
                ->join('jerarquia as j', 'pe.jerarquia_id', '=', 'j.id')
                ->join('cargos as c', 'pe.cargos_id', '=', 'c.id')
                ->select('pe.id', 'c.cargo', 'p.nombres', 'p.apellidos', 'j.jerarquia', 'pe.imagen')
                ->where('pe.borrado', '0')
                ->where('pe.activo', '=', '1')
                ->orderBy('pe.id')
                ->get();
            return view('web.personalAdministrativo', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'personal'));
        }
    }
    public function docentes(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $docentes = DB::table('docentes as d')
                ->join('especialidades as e', 'd.especialidad_id', '=', 'e.id')
                ->join('universidades as u', 'd.universidad_id', '=', 'u.id')
                ->select('d.id', 'd.nombres', 'd.apellidos', 'd.imagen', 'e.especialidad', 'u.nombre', 'u.abreviatura')
                ->where('d.borrado', '0')
                ->where('d.activo', '=', '1')
                ->orderBy('d.id')
                ->get();
            return view('web.docentes', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'docentes'));
        }
    }
    public function horarios(Request $request)
    {
        if ($request) {

            $catmaestria1 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get();

            $catmaestria2 = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'desc')
                ->take(7)
                ->get();

            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->where('m.borrado', '0')
                ->where('m.activo', '=', '1')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id')
                ->orderBy('m.id')
                ->get();

            $doctorado = DB::table('doctorados')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id')
                ->get();

            $slider = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '18')
                ->orderBy('id')
                ->get();

            $documento = DB::table('documentos')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->where('tipodocumento_id', '=', '2')
                ->orderBy('id')
                ->get();

            $catmaestria = DB::table('catmaestrias')
                ->where('borrado', '0')
                ->where('activo', '=', '1')
                ->orderBy('id', 'asc')
                ->get();

            $cursos = DB::table('cursos as c')
                ->join('maestrias as m', 'c.maestria_id', '=', 'm.id')
                ->select('m.id', 'c.horario', 'm.maestria')
                ->orderBy('id', 'asc')
                ->get();
            return view('web.programacionclases', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'slider', 'documento', 'catmaestria', 'cursos'));
        }
    }

    public function maestrias(Request $request)
    {

        $catmaestria1 = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'asc')
            ->take(4)
            ->get();

        $catmaestria2 = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        $maestrias = DB::table('maestrias as m')
            ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
            ->where('m.borrado', '0')
            ->where('m.activo', '=', '1')
            ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id', 'm.ruta')
            ->orderBy('m.id')
            ->get();

        $catmaestria = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'asc')
            ->get();

        $doctorado = DB::table('doctorados')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id')
            ->get();

        return view('web.maestrias', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'catmaestria'));
    }

    public function doctorados(Request $request)
    {

        $catmaestria1 = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'asc')
            ->take(4)
            ->get();

        $catmaestria2 = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        $maestrias = DB::table('maestrias as m')
            ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
            ->where('m.borrado', '0')
            ->where('m.activo', '=', '1')
            ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'm.borrado', 'm.catmaestria_id', 'm.ruta')
            ->orderBy('m.id')
            ->get();

        $catmaestria = DB::table('catmaestrias')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id', 'asc')
            ->get();

        $doctorado = DB::table('doctorados')
            ->where('borrado', '0')
            ->where('activo', '=', '1')
            ->orderBy('id')
            ->get();

        return view('web.doctorados', compact('maestrias', 'catmaestria1', 'catmaestria2', 'doctorado', 'catmaestria'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
