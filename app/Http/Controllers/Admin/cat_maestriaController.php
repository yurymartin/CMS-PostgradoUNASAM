<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Catmaestrias;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\cat_maestriaFormRequest;
use DB;
use Illuminate\Support\Facades\Auth;

class cat_maestriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $iduser = Auth::user()->id;
            $query = trim($request->get('searchText'));
            $usuarios = DB::table('users as u')
                ->join('personas as p', 'u.persona_id', '=', 'p.id')
                ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
                ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
                ->where('u.id', '=', $iduser)
                ->first();
            $cat_maestria = DB::table('catmaestrias')
                ->where('borrado', '=', 0)
                ->where('categoria', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.cat_maestria.index', ['cat_maestria' => $cat_maestria, 'searchText' => $query, 'usuarios' => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cat_maestria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cat_maestriaFormRequest $request)
    {
        $cat_maestria = new Catmaestrias;
        $cat_maestria->categoria = $request->get('categoria');
        $cat_maestria->activo = $request->get('activo');
        $cat_maestria->borrado = 0;
        $cat_maestria->save();
        return redirect::to('admin/cat_maestria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $cat_maestria = Catmaestrias::findOrFail($id);
        if (($cat_maestria->activo) == '1') {
            $cat_maestria->activo = 0;
            $cat_maestria->update();
        } else {
            $cat_maestria->activo = '1';
            $cat_maestria->update();
        }
        return redirect::to('admin/cat_maestria');
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
            ->select('u.id', 'p.nombres', 'p.apellidos', 'p.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();

        return view("admin.cat_maestria.edit", ["cat_maestria" => Catmaestrias::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cat_maestriaFormRequest $request, $id)
    {
        $cat_maestria = Catmaestrias::findOrFail($id);
        $cat_maestria->categoria = $request->get('categoria');
        $cat_maestria->borrado = 0;
        $cat_maestria->update();
        return redirect::to('admin/cat_maestria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat_maestria = Catmaestrias::findOrFail($id);
        $cat_maestria->borrado = 1;
        $cat_maestria->update();
        return redirect::to('admin/cat_maestria');
    }
}
