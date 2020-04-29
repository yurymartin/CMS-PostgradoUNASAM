<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cursos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\cursosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Validator;
use Toast;

class cursosController extends Controller
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
            $cursos = DB::table('cursos as c')
                ->join('maestrias as m', 'c.maestria_id', '=', 'm.id')
                ->select('c.id', 'c.curso', 'c.horario', 'c.activo', 'm.maestria')
                ->where('c.curso', 'like', '%' . $query . '%')
                ->where('c.borrado', '=', 0)
                ->orderBy('c.id', 'desc')
                ->get();
            return view("admin.cursos.index", ["cursos" => $cursos, "searchText" => $query, "usuarios" => $usuarios]);
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
        $maestrias = DB::table('maestrias')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.cursos.create', ['maestrias' => $maestrias, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cursosFormRequest $request)
    {
        $input  = array('file' => Input::file('horario'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/cursos/create');

        }else{
        $cursos = new cursos;
        $cursos->curso = $request->get('cursos');
        if (Input::hasFile('horario')) {
            $file = Input::file('horario');
            $file->move(public_path() . '\img\cursos', $file->getClientOriginalName());
            $cursos->horario = $file->getClientOriginalName();
        }
        $cursos->activo = $request->get('estado');
        $cursos->borrado = 0;
        $cursos->maestria_id = $request->get('maestria');
        $cursos->save();
        toastr()->success('Curso Registrado Correctamente'); //Los mensajes.
        return redirect::to('admin/cursos');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Cursos::findOrFail($id);
        if (($cursos->activo) == '1') {
            $cursos->activo = 0;
            $cursos->update();
        } else {
            $cursos->activo = '1';
            $cursos->update();
        }
        return redirect::to('admin/cursos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $iduser = Auth::user()->id;
        $usuarios = DB::table('users as u')
            ->join('personas as p', 'u.persona_id', '=', 'p.id')
            ->join('tipousuarios as tu', 'u.tipousuario_id', '=', 'tu.id')
            ->select('u.id', 'p.nombres', 'p.apellidos', 'u.imagen', 'tu.tipo')
            ->where('u.id', '=', $iduser)
            ->first();
        $cursos = Cursos::findOrFail($id);
        $maestrias = DB::table('maestrias')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.cursos.edit', ['cursos' => $cursos, 'maestrias' => $maestrias, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cursosFormRequest $request, $id)
    {
        $input  = array('file' => Input::file('horario'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/cursos');

        }else{
        $cursos = Cursos::findOrFail($id);
        $cursos->curso = $request->get('cursos');
        if (Input::hasFile('horario')) {
            $file = Input::file('horario');
            $file->move(public_path() . '\img\cursos', $file->getClientOriginalName());
            $cursos->horario = $file->getClientOriginalName();
        }
        $cursos->maestria_id = $request->get('maestria');
        $cursos->update();
        toastr()->success('Curso Registrado Correctamente'); //Los mensajes.
        return redirect::to('admin/cursos');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursos = Cursos::findOrFail($id);
        $cursos->borrado = 1;
        $cursos->update();
        return redirect::to('admin/cursos');
    }
}
