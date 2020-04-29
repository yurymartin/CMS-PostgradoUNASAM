<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\universidadesFormRequest;
use App\Models\Universidades;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class universidadesController extends Controller
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
            $universidades = DB::table('universidades')
                ->where('borrado', '=', 0)
                ->where('nombre', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.universidades.index', ['universidades' => $universidades, "searchText" => $query, "usuarios" => $usuarios]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.universidades.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(universidadesFormRequest $request)
    {
        $universidades = new Universidades;
        $universidades->nombre = $request->get('nombre');
        $universidades->abreviatura = $request->get('abreviatura');
        $universidades->activo = $request->get('activo');
        $universidades->borrado = '0';
        $universidades->save();
        return Redirect::to('admin/universidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $universidades = Universidades::findOrFail($id);
        if (($universidades->activo) == '1') {
            $universidades->activo = 0;
            $universidades->update();
        } else {
            $universidades->activo = '1';
            $universidades->update();
        }
        return Redirect::to('admin/universidades');
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
        return view("admin.universidades.edit", ["universidades" => Universidades::findOrFail($id), "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(universidadesFormRequest $request, $id)
    {
        $universidades = Universidades::findOrFail($id);
        $universidades->nombre = $request->get('nombre');
        $universidades->abreviatura = $request->get('abreviatura');
        $universidades->update();
        return Redirect::to('admin/universidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universidades = Universidades::findOrFail($id);
        $universidades->borrado = '1';
        $universidades->update();
        return Redirect::to('admin/universidades');
    }
}
