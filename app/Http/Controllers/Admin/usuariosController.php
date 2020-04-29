<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\personasFormRequest;
use App\Http\Requests\usuariosFormRequest;
use App\Models\Personas;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class usuariosController extends Controller
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
            $usuarioss = DB::table('users as u')
                ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
                ->join('personas as p', 'u.persona_id', '=', 'p.id')
                ->select('u.id', 'u.name', 'u.activo', 'tu.tipo', 'p.dni', 'p.nombres', 'p.apellidos')
                ->where('u.borrado', '=', 0)
                ->where('u.name', 'LIKE', '%' . $query . '%')
                ->get();
            return view('admin.usuarios.index', ["usuarioss" => $usuarioss, "searchText" => $query, "usuarios" => $usuarios]);
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
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo', 'u.imagen')
            ->where('u.id', '=', $iduser)
            ->first();
        $tipo_usuarios = DB::table('tipousuarios')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.usuarios.create', ['tipo_usuarios' => $tipo_usuarios, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(usuariosFormRequest $request)
    {
        $personas = new Personas();
        $personas->dni = $request->get('dni');
        $personas->nombres = $request->get('nombres');
        $personas->apellidos = $request->get('apellidos');
        $personas->activo = 1;
        $personas->borrado = 0;
        $personas->save();
        $usuarios = new Usuarios();
        $usuarios->name = $request->get('name');
        $usuarios->password = bcrypt($request->get('password'));
        $usuarios->activo = $request->get('activo');
        $usuarios->borrado = 0;
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\usuarios', $file->getClientOriginalName());
            $usuarios->imagen = $file->getClientOriginalName();
        }
        $usuarios->tipousuario_id = $request->get('tipo');
        $usuarios->persona_id = $personas->id;
        $usuarios->save();
        return redirect::to('admin/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $usuarioss = Usuarios::findOrFail($id);
        if (($usuarioss->activo) == '1') {
            $usuarioss->activo = 0;
            $usuarioss->update();
        } else {
            $usuarioss->activo = '1';
            $usuarioss->update();
        }
        return Redirect::to('admin/usuarios');
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
        $usuarioss = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'u.name', 'u.activo', 'tu.tipo', 'p.dni', 'p.nombres', 'p.apellidos', 'u.name', 'u.password', 'u.tipousuario_id')
            ->where('u.id', '=', $iduser)
            ->first();
        $tipo_usuarios = DB::table('tipousuarios')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.usuarios.edit', ["usuarioss" => $usuarioss, "tipo_usuarios" => $tipo_usuarios, "usuarios" => $usuarios,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(usuariosFormRequest $request, $id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $usuarios->password = bcrypt($request->get('password'));
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\usuarios', $file->getClientOriginalName());
            $usuarios->imagen = $file->getClientOriginalName();
        }
        $usuarios->tipousuario_id = $request->get('tipo');
        $usuarios->update();
        return redirect::to('admin/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuarios::findOrFail($id);
        $usuarios->borrado = 1;
        $usuarios->update();
        return Redirect::to('admin/usuarios');
    }
}
