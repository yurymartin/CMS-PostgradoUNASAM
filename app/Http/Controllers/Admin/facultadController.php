<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\facultadFormRequest;
use App\Models\Facultades;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class facultadController extends Controller
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
            $facultad = DB::table('facultades')
                ->where('borrado', '=', 0)
                ->where('nombre', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.facultad.index', [
                'facultad' => $facultad, "searchText" => $query, "usuarios" => $usuarios
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.facultad.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(facultadFormRequest $request)
    {
        $facultad = new Facultades;
        $facultad->nombre = $request->get('nombre');
        $facultad->abreviatura = $request->get('abreviatura');
        $facultad->activo = $request->get('activo');
        $facultad->borrado = '0';
        $facultad->save();
        return Redirect::to('admin/facultad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $facultad = Facultades::findOrFail($id);
        if (($facultad->activo) == '1') {
            $facultad->activo = 0;
            $facultad->update();
        } else {
            $facultad->activo = '1';
            $facultad->update();
        }
        return Redirect::to('admin/facultad');
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
        return view("admin.facultad.edit", ["facultad" => Facultades::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(facultadFormRequest $request, $id)
    {
        $facultad = Facultades::findOrFail($id);
        $facultad->nombre = $request->get('nombre');
        $facultad->abreviatura = $request->get('abreviatura');
        $facultad->update();
        return Redirect::to('admin/facultad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultades::findOrFail($id);
        $facultad->borrado = '1';
        $facultad->update();
        return Redirect::to('admin/facultad');
    }
}
