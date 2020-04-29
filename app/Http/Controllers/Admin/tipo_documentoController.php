<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\tipo_documentoFormRequest;
use App\Models\Tipodocumentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class tipo_documentoController extends Controller
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
            $tipo_documento = DB::table('tipodocumentos')
                ->where('borrado', '=', 0)
                ->where('tipo', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.tipo_documento.index', ['tipo_documento' => $tipo_documento, 'searchText' => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipo_documento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipo_documentoFormRequest $request)
    {
        $tipo_documento = new Tipodocumentos;
        $tipo_documento->tipo = $request->get('tipo');
        $tipo_documento->activo = $request->get('activo');
        $tipo_documento->borrado = 0;
        $tipo_documento->save();
        return redirect::to('admin/tipo_documento');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tipo_documento = Tipodocumentos::findOrFail($id);
        if (($tipo_documento->activo) == '1') {
            $tipo_documento->activo = 0;
            $tipo_documento->update();
        } else {
            $tipo_documento->activo = '1';
            $tipo_documento->update();
        }
        return redirect::to('admin/tipo_documento');
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
        return view('admin.tipo_documento.edit', ["tipo_documento" => Tipodocumentos::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipo_documentoFormRequest $request, $id)
    {
        $tipo_documento = Tipodocumentos::findOrFail($id);
        $tipo_documento->tipo = $request->get('tipo');;
        $tipo_documento->update();
        return redirect::to('admin/tipo_documento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_documento = Tipodocumentos::findOrFail($id);
        $tipo_documento->borrado = 1;
        $tipo_documento->update();
        return redirect::to('admin/tipo_documento');
    }
}
