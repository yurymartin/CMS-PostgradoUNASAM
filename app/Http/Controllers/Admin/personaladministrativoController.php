<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\personasFormRequest;
use App\Models\Personaladministrativo;
use App\Models\Personas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toast;

class personaladministrativoController extends Controller
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
            $personaladministrativo = DB::table('personaladministrativo as cd')
                ->join('personas as p', 'cd.persona_id', '=', 'p.id')
                ->join('cargos as c', 'cd.cargos_id', '=', 'c.id')
                ->join('jerarquia as j', 'cd.jerarquia_id', '=', 'j.id')
                ->select('cd.id', 'p.dni', 'p.nombres', 'p.apellidos', 'cd.imagen', 'cd.activo', 'c.cargo', 'j.jerarquia', 'cd.borrado')
                ->where('cd.borrado', '=', 0)
                ->where('p.dni', 'LIKE', '%' . $query . '%')
                ->get();
            return view('admin.personal.index', ["personaladministrativo" => $personaladministrativo, "searchText" => $query, "usuarios" => $usuarios]);
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
        $jerarquia = DB::table('jerarquia')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $cargo = DB::table('cargos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.personal.create', ['jerarquia' => $jerarquia, 'cargo' => $cargo, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(personasFormRequest $request)
    {
        $input  = array('file' => Input::file('imagenC'));
        $reglas = array('file' => 'required|file|mimes:png,jpg,jpeg,gif,jpe,PNG,JPG,JPEG,GIF,JPE,DOCX,docx,PDF,pdf');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            // dd('error');
            // Toast::error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            toastr()->error('El archivo ingresado como imagen no es una imagen válida, ingrese otro archivo o limpie el formulario');
            // Toast::error('message', 'title');
            
            return Redirect::to('admin/personal/create');

        }else{
        $personas = new Personas();
        $personas->dni = $request->get('dni');
        $personas->nombres = $request->get('nombres');
        $personas->apellidos = $request->get('apellidos');
        $personas->activo = 1;
        $personas->borrado = 0;
        $personas->save();
        $personaladministrativo = new Personaladministrativo();
        if (Input::hasFile('imagenC')) {
            $file = Input::file('imagenC');
            $file->move(public_path() . '/img/personal', $file->getClientOriginalName());
            $personaladministrativo->imagen = $file->getClientOriginalName();
        }
        $personaladministrativo->activo = $request->get('activo');
        $personaladministrativo->borrado = 0;
        $personaladministrativo->jerarquia_id = $request->get('jerarquia');
        $personaladministrativo->persona_id = $personas->id;
        $personaladministrativo->cargos_id = $request->get('cargo');
        $personaladministrativo->save();
        toastr()->success('Personal Registrado Correctamente'); //Los mensajes.
        return redirect::to('admin/personal');
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
        $personaladministrativo = Personaladministrativo::findOrFail($id);
        if (($personaladministrativo->activo) == '1') {
            $personaladministrativo->activo = 0;
            $personaladministrativo->update();
        } else {
            $personaladministrativo->activo = '1';
            $personaladministrativo->update();
        }
        return Redirect::to('admin/personal');
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
        //$consejo = ConsejoDirectivos::findOrFail($id);
        $personaladministrativo = DB::table('personaladministrativo as cd')
            ->join('personas as p', 'cd.persona_id', '=', 'p.id')
            ->select('cd.id', 'p.dni', 'p.nombres', 'p.apellidos', 'p.activo', 'cd.activo', 'cd.imagen', 'cd.jerarquia_id', 'cd.cargos_id')
            ->where('cd.id', '=', $id)
            ->first();
        $cargo = DB::table('cargos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $jerarquia = DB::table('jerarquia')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.personal.edit', ['personaladministrativo' => $personaladministrativo, 'jerarquia' => $jerarquia, 'cargo' => $cargo, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(personasFormRequest $request, $id)
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
            
            return Redirect::to('admin/personal');

        }else{   
        $personass = DB::table('personaladministrativo as cd')
            ->join('personas as p', 'cd.persona_id', '=', 'p.id')
            ->select('p.id', 'p.dni', 'p.nombres', 'p.apellidos', 'p.created_at', 'p.updated_at')
            ->where('cd.id', '=', $id)
            ->first();
        $idpersonas = $personass->id;
        $personas = Personas::findOrFail($idpersonas);
        $personas->dni = $request->get('dni');
        $personas->nombres = $request->get('nombres');
        $personas->apellidos = $request->get('apellidos');
        $personas->update();
        $personaladministrativo = Personaladministrativo::findOrFail($id);
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '/img/personal', $file->getClientOriginalName());
            $personaladministrativo->imagen = $file->getClientOriginalName();
        }
        $personaladministrativo->borrado = 0;
        $personaladministrativo->jerarquia_id = $request->get('jerarquia');
        $personaladministrativo->persona_id = $personas->id;
        $personaladministrativo->cargos_id = $request->get('cargo');
        $personaladministrativo->update();
        toastr()->success('Personal Registrado Correctamente'); //Los mensajes.
        return Redirect::to('admin/personal');
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
        $personaladministrativo = Personaladministrativo::findOrFail($id);
        $personaladministrativo->borrado = 1;
        $personaladministrativo->update();
        return Redirect::to('admin/personal');
    }
}
