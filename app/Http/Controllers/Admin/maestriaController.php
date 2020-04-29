<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\maestriaFormRequest;
use App\Models\Maestrias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class maestriaController extends Controller
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
            $maestrias = DB::table('maestrias as m')
                ->join('catmaestrias as cm', 'm.catmaestria_id', '=', 'cm.id')
                ->select('m.id', 'm.maestria', 'm.descripcion', 'm.link', 'm.activo', 'cm.categoria','m.ruta')
                ->where('m.borrado', '=', 0)
                ->where('m.maestria', 'like', '%' . $query . '%')
                ->orderBy('m.id', 'desc')
                ->get();
            return view('admin.maestrias.index', ['maestrias' => $maestrias, 'searchText' => $query, "usuarios" => $usuarios]);
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
        $cat_maestria = DB::table('catmaestrias')
            ->where('activo', '=', 1,)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.maestrias.create', ['cat_maestria' => $cat_maestria, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(maestriaFormRequest $request)
    {
        $maestria = new Maestrias;
        $maestria->maestria = $request->get('maestria');
        $maestria->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(resource_path() . '\views\web\maestrias', $file->getClientOriginalName());
            $maestria->link = $file->getClientOriginalName();
        }
        if (Input::hasFile('imagen')) {
            $file2 = Input::file('imagen');
            $file2->move(public_path() . '\img\maestrias', $file2->getClientOriginalName());
            $maestria->ruta = $file2->getClientOriginalName();
        }
        $maestria->activo = $request->get('estado');
        $maestria->catmaestria_id = $request->get('cat_maestria');
        $maestria->borrado = 0;
        $maestria->save();
        return redirect::to('admin/maestrias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $maestrias = Maestrias::findOrFail($id);
        if (($maestrias->activo) == '1') {
            $maestrias->activo = 0;
            $maestrias->update();
        } else {
            $maestrias->activo = '1';
            $maestrias->update();
        }
        return redirect::to('admin/maestrias');
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
        $maestrias = Maestrias::findOrFail($id);
        $cat_maestria = DB::table('catmaestrias')
            ->where('activo', '=', 1,)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.maestrias.edit', ['maestrias' => $maestrias, 'cat_maestria' => $cat_maestria, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(maestriaFormRequest $request, $id)
    {
        $maestria = Maestrias::findOrFail($id);
        $maestria->maestria = $request->get('maestria');
        $maestria->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(resource_path() . '\views\web\maestrias', $file->getClientOriginalName());
            $maestria->link = $file->getClientOriginalName();
        }
        if (Input::hasFile('imagen')) {
            $file2 = Input::file('imagen');
            $file2->move(public_path() . '\img\maestrias', $file2->getClientOriginalName());
            $maestria->ruta = $file2->getClientOriginalName();
        }
        $maestria->catmaestria_id = $request->get('cat_maestria');
        $maestria->update();
        return redirect::to('admin/maestrias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maestria = Maestrias::findOrFail($id);
        $maestria->borrado = 1;
        $maestria->update();
        return redirect::to('admin/maestrias');
    }
}
