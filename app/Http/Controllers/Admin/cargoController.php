<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cargos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CargoFormRequest;
use DB;
use Auth;

class cargoController extends Controller
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
            $cargos = DB::table('cargos')
                ->where('cargo', 'like', '%' . $query . '%')
                ->where('borrado', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
            return view("admin.cargo.index", ["cargos" => $cargos, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cargo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoFormRequest $request)
    {
        $cargo = new Cargos;
        $cargo->cargo = $request->get('cargo');
        $cargo->activo = $request->get('activo');
        $cargo->borrado = '0';
        $cargo->save();
        return Redirect::to('admin/cargo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $cargo = Cargos::findOrFail($id);
        if (($cargo->activo) == '1') {
            $cargo->activo = 0;
            $cargo->update();
        } else {
            $cargo->activo = '1';
            $cargo->update();
        }
        return Redirect::to('admin/cargo');
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
        return view("admin.cargo.edit", ["cargo" => Cargos::findOrFail($id), 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoFormRequest $request, $id)
    {
        $cargo = Cargos::findOrFail($id);
        $cargo->cargo = $request->get('cargo');
        $cargo->update();
        return Redirect::to('admin/cargo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = Cargos::findOrFail($id);
        $cargo->borrado = 1;
        $cargo->update();
        return Redirect::to('admin/cargo');
    }
}
