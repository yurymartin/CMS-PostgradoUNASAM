<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especialidades;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\especialidadesFormRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class especialidadesController extends Controller
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
            $especialidades = DB::table('especialidades')
                ->where('especialidad', 'like', '%' . $query . '%')
                ->where('borrado', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.especialidades.index', ["especialidades" => $especialidades, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.especialidades.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(especialidadesFormRequest $request)
    {
        $especialidades = new Especialidades;
        $especialidades->especialidad = $request->get('especialidad');
        $especialidades->activa = $request->get('activo');
        $especialidades->borrado = '0';
        $especialidades->save();
        return Redirect::to('admin/especialidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $especialidades = Especialidades::findOrFail($id);
        if (($especialidades->activa) == '1') {
            $especialidades->activa = 0;
            $especialidades->update();
        } else {
            $especialidades->activa = '1';
            $especialidades->update();
        }
        return Redirect::to('admin/especialidades');
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
        return view("admin.especialidades.edit", ["especialidades" => Especialidades::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(especialidadesFormRequest $request, $id)
    {
        $especialidades = Especialidades::findOrFail($id);
        $especialidades->especialidad = $request->get('especialidad');
        $especialidades->update();
        return Redirect::to('admin/especialidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidades = Especialidades::findOrFail($id);
        $especialidades->borrado = 1;
        $especialidades->update();
        return Redirect::to('admin/especialidades');
    }
}
