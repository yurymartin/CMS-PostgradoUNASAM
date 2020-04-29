<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GradosAcademicos;
use App\Http\Requests\gradosacademicosFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class gradosAcademicosController extends Controller
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
            $grados = DB::table('gradosacademicos')
                ->where('borrado', '=', 0)
                ->where('grado', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.grados.index', ['grados' => $grados, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.grados.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(gradosacademicosFormRequest $request)
    {
        $grados = new GradosAcademicos();
        $grados->grado = $request->get('grado');
        $grados->abreviatura = $request->get('abreviatura');
        $grados->activo = $request->get('activo');
        $grados->borrado = '0';
        $grados->save();
        return Redirect::to('admin/grados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $grados = GradosAcademicos::findOrFail($id);
        if (($grados->activo) == '1') {
            $grados->activo = 0;
            $grados->update();
        } else {
            $grados->activo = '1';
            $grados->update();
        }
        return Redirect::to('admin/grados');
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
        return view("admin.grados.edit", ["grados" => GradosAcademicos::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(gradosacademicosFormRequest $request, $id)
    {
        $grados = GradosAcademicos::findOrFail($id);
        $grados->grado = $request->get('grado');
        $grados->abreviatura = $request->get('abreviatura');
        $grados->update();
        return Redirect::to('admin/grados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradps = GradosAcademicos::findOrFail($id);
        $gradps->borrado = '1';
        $gradps->update();
        return Redirect::to('admin/grados');
    }
}
