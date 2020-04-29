<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Actividades;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\actividadesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Validator;
use Toast;

class actividadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $iduser = Auth::user()->id;
            $usuarios = DB::table('users as u')
                ->join('personas as p', 'u.persona_id', '=', 'p.id')
                ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
                ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
                ->where('u.id', '=', $iduser)
                ->first();
            $query = trim($request->get('searchText'));
            $actividades = DB::table('actividades')
                ->where('actividad', 'like', '%' . $query . '%')
                ->where('borrado', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.actividades.index', ["actividades" => $actividades, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $usuarios = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();
        return view("admin.actividades.create", ["usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(actividadesFormRequest $request)
    {
        
        
        $input  = array('file' => Input::file('imagen'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/actividades/create');

        }else{

        $actividades = new Actividades;
        $actividades->actividad = $request->get('actividad');
        $actividades->descripcion = $request->get('descripcion');
        $actividades->fecha = $request->get('fecha');
        $actividades->hora = $request->get('hora');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\actividades', $file->getClientOriginalName());
            $actividades->imagen = $file->getClientOriginalName();
        }
        $actividades->activo = $request->get('activo');
        $actividades->borrado = '0';
        $actividades->save();

        toastr()->success('Banner registrado correctamente'); //Los mensajes.
        return Redirect::to('admin/actividades');

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $actividades = Actividades::findOrFail($id);
        if (($actividades->activo) == '1') {
            $actividades->activo = 0;
            $actividades->update();
        } else {
            $actividades->activo = '1';
            $actividades->update();
        }
        return Redirect::to('admin/actividades');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(actividadesFormRequest $request, $id)
    {
        $iduser = Auth::user()->id;
        $usuarios = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();
        return view("admin.actividades.edit", ["actividades" => Actividades::findOrFail($id), "usuarios" => $usuarios]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(actividadesFormRequest $request, $id)
    {   
        $input  = array('file' => Input::file('imagen'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/actividades');

        }else{
        $actividades = Actividades::findOrFail($id);
        $actividades->actividad = $request->get('actividad');
        $actividades->descripcion = $request->get('descripcion');
        $actividades->fecha = $request->get('fecha');
        $actividades->hora = $request->get('hora');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\actividades', $file->getClientOriginalName());
            $actividades->imagen = $file->getClientOriginalName();
        }
        $actividades->update();
        toastr()->success('Banner registrado correctamente'); //Los mensajes.
        return Redirect::to('admin/actividades');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividades = Actividades::findOrFail($id);
        $actividades->borrado = 1;
        $actividades->update();
        return Redirect::to('admin/actividades');
    }
}
