<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jerarquia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\jerarquiaFormRequest;
use DB;
use Auth;

class jerarquiaController extends Controller
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
            $jerarquias = DB::table('jerarquia')
                ->where('jerarquia', 'like', '%' . $query . '%')
                ->where('borrado', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
            return view("admin.jerarquias.index", ["jerarquias" => $jerarquias, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.jerarquias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(jerarquiaFormRequest $request)
    {
        $jerarquias = new Jerarquia;
        $jerarquias->jerarquia = $request->get('jerarquias');
        $jerarquias->activo = $request->get('activo');
        $jerarquias->borrado = '0';
        $jerarquias->save();
        return Redirect::to('admin/jerarquias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $jerarquias = Jerarquia::findOrFail($id);
        if (($jerarquias->activo) == '1') {
            $jerarquias->activo = 0;
            $jerarquias->update();
        } else {
            $jerarquias->activo = '1';
            $jerarquias->update();
        }
        return Redirect::to('admin/jerarquias');
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
        return view("admin.jerarquias.edit", ["jerarquias" => Jerarquia::findOrFail($id), 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jerarquias = Jerarquia::findOrFail($id);
        $jerarquias->jerarquia = $request->get('jerarquias');
        $jerarquias->update();
        return Redirect::to('admin/jerarquias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jerarquias = Jerarquia::findOrFail($id);
        $jerarquias->borrado = 1;
        $jerarquias->update();
        return Redirect::to('admin/jerarquias');
    }
}
