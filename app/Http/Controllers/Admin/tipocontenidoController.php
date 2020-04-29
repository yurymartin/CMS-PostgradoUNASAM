<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\tipocontenidoFormRequest;
use App\Models\Tipocontenido;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;


class tipocontenidoController extends Controller
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
            $tipocontenido = DB::table('tipocontenido')
                ->where('borrado', '=', 0)
                ->where('tipo', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.tipocontenido.index', ['tipocontenido' => $tipocontenido, 'searchText' => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipocontenido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipocontenidoFormRequest $request)
    {
        $tipocontenido = new Tipocontenido;
        $tipocontenido->tipo = $request->get('tipo');
        $tipocontenido->activo = $request->get('activo');
        $tipocontenido->borrado = 0;
        $tipocontenido->save();
        return redirect::to('admin/tipocontenido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tipocontenido = Tipocontenido::findOrFail($id);
        if (($tipocontenido->activo) == '1') {
            $tipocontenido->activo = 0;
            $tipocontenido->update();
        } else {
            $tipocontenido->activo = '1';
            $tipocontenido->update();
        }
        return redirect::to('admin/tipocontenido');
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
        return view('admin.tipocontenido.edit', ["tipocontenido" => Tipocontenido::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipocontenidoFormRequest $request, $id)
    {
        $tipocontenido = Tipocontenido::findOrFail($id);
        $tipocontenido->tipo = $request->get('tipo');;
        $tipocontenido->update();
        return redirect::to('admin/tipocontenido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipocontenido = Tipocontenido::findOrFail($id);
        $tipocontenido->borrado = 1;
        $tipocontenido->update();
        return redirect::to('admin/tipocontenido');
    }
}
