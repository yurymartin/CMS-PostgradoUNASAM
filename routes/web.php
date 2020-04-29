<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', function () {
        $iduser = Auth::user()->id;
        $usuarios = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();
        return view("admin", ["usuarios" => $usuarios]);
    });


});
Route::resource('admin/cargo', 'admin\cargoController');
Route::resource('admin/jerarquias', 'admin\jerarquiaController');
Route::resource('admin/personal', 'admin\personaladministrativoController');
Route::resource('admin/consejo', 'admin\consejo_directivoController');
Route::resource('admin/facultad', 'admin\facultadController');
Route::resource('admin/cat_maestria', 'admin\cat_maestriaController');
Route::resource('admin/maestrias', 'admin\maestriaController');
Route::resource('admin/doctorados', 'admin\doctoradosController');
Route::resource('admin/tipo_documento', 'admin\tipo_documentoController');
Route::resource('admin/tipocontenido', 'admin\tipocontenidoController');
Route::resource('admin/documentos', 'admin\documentosController');
Route::resource('admin/contenido', 'admin\contenidoController');
Route::resource('admin/grados', 'admin\gradosAcademicosController');
Route::resource('admin/especialidades', 'admin\especialidadesController');
Route::resource('admin/tipousuarios', 'admin\tipousuarioController');
Route::resource('admin/usuarios', 'admin\usuariosController');
Route::resource('admin/universidades', 'admin\universidadesController');
Route::resource('admin/docentes', 'admin\docentesController');
Route::resource('admin/actividades', 'admin\actividadesController');
Route::resource('admin/cursos', 'admin\cursosController');

/* ------------------------ RUTAS DEL LA PAGINA WEBA -------------------*/
Route::get('/', 'web\indexController@index');
Route::get('historia', 'web\indexController@historia');
Route::get('nosotros', 'web\indexController@nosotros');
Route::get('maestria_Adm_Neg_MBA', 'web\indexController@maestan');
Route::get('maestria_Gestion_Publica', 'web\indexController@maestgp');
Route::get('maestria_Agroindustria', 'web\indexController@maestai');
Route::get('maestria_Dir_Cons', 'web\indexController@maestdc');
Route::get('maestria_Gestion_Amb', 'web\indexController@maestga');
Route::get('maestria_Gestion_Ries_Camb_Clim', 'web\indexController@maestgr');
Route::get('maestria_Ing_Rec_Hid', 'web\indexController@maestih');
Route::get('maestria_Ing_Estructural', 'web\indexController@maestie');
Route::get('maestria_Gest_Oper', 'web\indexController@maestgo');
Route::get('maestria_Tec_Infor_Sist_Inf', 'web\indexController@maestti');
Route::get('maestria_Audit_Seg_Inf', 'web\indexController@maestsa');
Route::get('maestria_Desa_Agra_Sost', 'web\indexController@maestda');
Route::get('maestria_DES', 'web\indexController@maestdes');
Route::get('maestria_EB', 'web\indexController@maestdeb');
Route::get('maestria_PGE', 'web\indexController@maestpge');
Route::get('maestria_CL', 'web\indexController@maestcli');
Route::get('mestria_ACG', 'web\indexController@maestacg');
Route::get('mestria_finanzas', 'web\indexController@maestfin');
Route::get('maestria_TF', 'web\indexController@maesttf');
Route::get('maestria_SS', 'web\indexController@maestss');
Route::get('maestria_GIM', 'web\indexController@maestgim');
Route::get('maestria_Matematica', 'web\indexController@maestmat');
Route::get('maestria_Ge_Pro', 'web\indexController@maestgpro');
Route::get('maestria_Ges_Salud', 'web\indexController@maestges');
Route::get('maestria_Cien_Pen', 'web\indexController@maestciepen');
Route::get('maestria_Der_Civil', 'web\indexController@maestderciv');
Route::get('maestria_DPAJ', 'web\indexController@maestdpaj');
Route::get('maestria_CODS', 'web\indexController@maestcods');
//principal
Route::get('resoluciones', 'web\indexController@resolu');
Route::get('documentos_norm', 'web\indexController@docunorm');
Route::get('contacto', 'web\indexController@contacto');
Route::get('noticias', 'web\indexController@noticia');
Route::get('imagenes', 'web\indexController@galfoto');
Route::get('videos', 'web\indexController@galvideo');
Route::get('admision', 'web\indexController@admi');
Route::get('consejoDirectivo', 'web\indexController@consejo');
Route::get('personalAdministrativo', 'web\indexController@personal');
Route::get('docentes', 'web\indexController@docentes');
Route::get('programacionclases', 'web\indexController@horarios');
Route::get('maestrias', 'web\indexController@maestrias');
Route::get('doctorados', 'web\indexController@doctorados');
//doctorados
Route::get('doctorado_admi', 'web\indexController@dadministracion');
Route::get('doctorado_IngComputacion', 'web\indexController@dcomputacion');
Route::get('doctorado_CIENSALUD', 'web\indexController@dciensalud');
Route::get('doctorado_CONTABILIDAD', 'web\indexController@dcontabilidad');
Route::get('doctorado_DCP', 'web\indexController@dcienpol');
Route::get('doctorado_ECONOMIA', 'web\indexController@deconomia');
Route::get('doctorado_EDUCACION', 'web\indexController@deducacion');
Route::get('doctorado_ENFERMERIA', 'web\indexController@denfermeria');
Route::get('doctorado_INGENIERIA_AMBIENTAL', 'web\indexController@dambiental');
Route::get('doctorado_OBSTETRICIA', 'web\indexController@dobstetricia');
/*--------------------------------------------------------------------- */


//Route::get('/admin', 'AdminController@index');

/*Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::get('cargo', 'cargoController@index')->name('cargo');
    Route::get('cargo/crear', 'cargoController@create')->name('crear_cargo');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
