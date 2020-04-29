<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\docentesFormRequest;
use App\Models\Docentes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toast;

class docentescontroller extends Controller
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
            $docentes = DB::table('docentes as d')
                ->join('especialidades as e', 'd.especialidad_id', '=', 'e.id')
                ->join('universidades as u', 'd.universidad_id', '=', 'u.id')
                ->select('d.id', 'd.dni', 'd.nombres', 'd.apellidos', 'd.imagen', 'd.activo', 'd.borrado', 'e.especialidad', 'u.nombre', 'u.abreviatura')
                ->where('d.borrado', '=', 0)
                ->where('d.apellidos', 'LIKE', '%' . $query . '%')
                ->get();
            return view('admin.docentes.index', [
                "docentes" => $docentes, "searchText" => $query, "usuarios" => $usuarios
            ]);
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
        $especialidades = DB::table('especialidades')
            ->where('activa', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $universidades = DB::table('universidades')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.docentes.create', [
            'especialidades' => $especialidades, 'universidades' => $universidades, "usuarios" => $usuarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(docentesFormRequest $request)
    {
        $input  = array('file' => Input::file('imagen'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/docentes/create');

        }else{
        $docentes = new Docentes;
        $docentes->dni = $request->get('dni');
        $docentes->nombres = $request->get('nombres');
        $docentes->apellidos = $request->get('apellidos');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\docentes', $file->getClientOriginalName());
            $docentes->imagen = $file->getClientOriginalName();
        }
        $docentes->activo = $request->get('activo');
        $docentes->borrado = 0;
        $docentes->especialidad_id = $request->get('especialidad');
        $docentes->universidad_id = $request->get('universidad');
        $docentes->save();
        toastr()->success('Docente Registrado Correctamente'); //Los mensajes.
        return redirect::to('admin/docentes');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $docentes = Docentes::findOrFail($id);
        if (($docentes->activo) == '1') {
            $docentes->activo = 0;
            $docentes->update();
        } else {
            $docentes->activo = '1';
            $docentes->update();
        }
        return redirect::to('admin/docentes');
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
        $docentes = Docentes::findOrFail($id);
        $especialidades = DB::table('especialidades')
            ->where('activa', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $universidades = DB::table('universidades')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.docentes.edit', ['docentes' => $docentes, 'especialidades' => $especialidades, 'universidades' => $universidades, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(docentesFormRequest $request, $id)
    {
        $input  = array('file' => Input::file('imagen'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/docentes');

        }else{
        $docentes = Docentes::findOrFail($id);
        $docentes->dni = $request->get('dni');
        $docentes->nombres = $request->get('nombres');
        $docentes->apellidos = $request->get('apellidos');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\docentes', $file->getClientOriginalName());
            $docentes->imagen = $file->getClientOriginalName();
        }
        $docentes->borrado = 0;
        $docentes->especialidad_id = $request->get('especialidad');
        $docentes->universidad_id = $request->get('universidad');
        $docentes->save();
        toastr()->success('Docente Registrado Correctamente'); //Los mensajes.
        return redirect::to('admin/docentes');
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
        $docentes = Docentes::findOrFail($id);
        $docentes->borrado = 1;
        $docentes->update();
        return Redirect::to('admin/docentes');
    }
}
