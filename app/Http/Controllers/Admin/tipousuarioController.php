<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\tipousuariosFormRequest;
use App\Models\TipoUsuarios;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class tipousuarioController extends Controller
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
            $tipousuarios = DB::table('tipousuarios')
                ->where('borrado', '=', 0)
                ->where('tipo', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.tipousuarios.index', ['tipousuarios' => $tipousuarios, 'searchText' => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipousuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipousuariosFormRequest $request)
    {
        $tipousuarios = new TipoUsuarios;
        $tipousuarios->tipo = $request->get('tipo');
        $tipousuarios->activo = $request->get('activo');
        $tipousuarios->borrado = 0;
        $tipousuarios->save();
        return redirect::to('admin/tipousuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tipousuarios = TipoUsuarios::findOrFail($id);
        if (($tipousuarios->activo) == '1') {
            $tipousuarios->activo = 0;
            $tipousuarios->update();
        } else {
            $tipousuarios->activo = '1';
            $tipousuarios->update();
        }
        return redirect::to('admin/tipousuarios');
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
        return view('admin.tipousuarios.edit', [
            "tipousuarios" => TipoUsuarios::findOrFail($id), "usuarios" => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipousuariosFormRequest $request, $id)
    {
        $tipousuarios = TipoUsuarios::findOrFail($id);
        $tipousuarios->tipo = $request->get('tipo');
        $tipousuarios->update();
        return redirect::to('admin/tipousuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipousuarios = TipoUsuarios::findOrFail($id);
        $tipousuarios->borrado = 1;
        $tipousuarios->update();
        return redirect::to('admin/tipousuarios');
    }
}
