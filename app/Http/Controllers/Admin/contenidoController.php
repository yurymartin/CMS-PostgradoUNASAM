<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\contenidoFormRequest;
use App\Models\Contenido;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toast;

class contenidoController extends Controller
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
            $contenido = DB::table('contenido as c')
                ->join('tipocontenido as tc', 'c.tipocontenido_id', '=', 'tc.id')
                ->select('c.id', 'c.contenido', 'c.descripcion', 'c.link', 'c.clase', 'c.activo', 'tc.tipo')
                ->where('c.borrado', '=', 0)
                ->where('c.contenido', 'like', '%' . $query . '%')
                ->orderBy('c.id', 'desc')
                ->get();
            return view('admin.contenido.index', ['contenido' => $contenido, 'searchText' => $query, "usuarios" => $usuarios]);
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
        $tipocontenido = DB::table('tipocontenido')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.contenido.create', ['tipocontenido' => $tipocontenido, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contenidoFormRequest $request)
    {
        $input  = array('file' => Input::file('link'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/contenido/create');

        }else{

        $iduser = Auth::user()->id;
        $contenido = new Contenido;
        $contenido->contenido = $request->get('contenido');
        $contenido->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(public_path() . '\contenido', $file->getClientOriginalName());
            $contenido->link = $file->getClientOriginalName();
        }
        $contenido->clase = $request->get('clase');
        $contenido->activo = $request->get('estado');
        $contenido->users_id = $iduser;
        $contenido->tipocontenido_id = $request->get('tipo_contenido');
        $contenido->borrado = 0;
        $contenido->save();

        toastr()->success('El Contenido fue registrado correctamente'); //Los mensajes.

        return redirect::to('admin/contenido');
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
        $contenido = Contenido::findOrFail($id);
        if (($contenido->activo) == '1') {
            $contenido->activo = 0;
            $contenido->update();
        } else {
            $contenido->activo = '1';
            $contenido->update();
        }
        return Redirect::to('admin/contenido');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::user()->id;
        $usuarios = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();
        $contenido = Contenido::findOrFail($id);
        $tipocontenido = DB::table('tipocontenido')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.contenido.edit', ['contenido' => $contenido, 'tipocontenido' => $tipocontenido, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(contenidoFormRequest $request, $id)
    {
        $input  = array('file' => Input::file('link'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/contenido');

        }else{
        $iduser = Auth::user()->id;
        $contenido = Contenido::findOrFail($id);
        $contenido->contenido = $request->get('contenido');
        $contenido->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(public_path() . '\contenido', $file->getClientOriginalName());
            $contenido->link = $file->getClientOriginalName();
        }
        $contenido->clase = $request->get('clase');
        $contenido->users_id = $iduser;
        $contenido->tipocontenido_id = $request->get('tipo_contenido');
        $contenido->update();
        toastr()->success('El Contenido fue registrado correctamente'); //Los mensajes.
        return Redirect::to('admin/contenido');
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
        $contenido = Contenido::findOrFail($id);
        $contenido->borrado = 1;
        $contenido->update();
        return Redirect::to('admin/contenido');
    }
}
