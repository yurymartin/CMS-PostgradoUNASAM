<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\documentosFormRequest;
use App\Models\Documentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toast;

class documentoscontroller extends Controller
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
            $documentos = DB::table('documentos as d')
                ->join('tipodocumentos as ti', 'd.tipodocumento_id', '=', 'ti.id')
                ->select('d.id', 'd.nom_documento', 'd.descripcion', 'd.link', 'd.activo', 'ti.tipo')
                ->where('d.borrado', '=', 0)
                ->where('d.nom_documento', 'like', '%' . $query . '%')
                ->orderBy('d.id', 'desc')
                ->get();
            return view('admin.documentos.index', ['documentos' => $documentos, 'searchText' => $query, "usuarios" => $usuarios]);
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
        $tipodocumentos = DB::table('tipodocumentos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.documentos.create', ['tipodocumentos' => $tipodocumentos, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(documentosFormRequest $request)
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
            
            return Redirect::to('admin/documentos/create');

        }else{

        $iduser = Auth::user()->id;
        $documentos = new Documentos;
        $documentos->nom_documento = $request->get('documento');
        $documentos->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(public_path() . '\documentos', $file->getClientOriginalName());
            $documentos->link = $file->getClientOriginalName();
        }
        $documentos->activo = $request->get('estado');
        $documentos->users_id = $iduser;
        $documentos->tipodocumento_id = $request->get('tipo_documento');
        $documentos->borrado = 0;
        $documentos->save();
        toastr()->success('Documento registrado correctamente'); //Los mensajes.
        return redirect::to('admin/documentos');
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
        $documentos = Documentos::findOrFail($id);
        if (($documentos->activo) == '1') {
            $documentos->activo = 0;
            $documentos->update();
        } else {
            $documentos->activo = '1';
            $documentos->update();
        }
        return Redirect::to('admin/documentos');
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
        $documentos = Documentos::findOrFail($id);
        $tipodocumentos = DB::table('tipodocumentos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.documentos.edit', ['documentos' => $documentos, 'tipodocumentos' => $tipodocumentos, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(documentosFormRequest $request, $id)
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
            
            return Redirect::to('admin/documentos');

        }else{

        $iduser = Auth::user()->id;
        $documentos = Documentos::findOrFail($id);
        $documentos->nom_documento = $request->get('documento');
        $documentos->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(public_path() . '\documentos', $file->getClientOriginalName());
            $documentos->link = $file->getClientOriginalName();
        }
        $documentos->users_id = $iduser;
        $documentos->tipodocumento_id = $request->get('tipo_documento');
        $documentos->update();
        toastr()->success('Documento registrado correctamente'); //Los mensajes.
        return Redirect::to('admin/documentos');
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
        $documentos = Documentos::findOrFail($id);
        $documentos->borrado = 1;
        $documentos->update();
        return Redirect::to('admin/documentos');
    }
}
