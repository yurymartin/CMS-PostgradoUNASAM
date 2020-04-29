<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consejo_directivoFormRequest;
use App\Models\ConsejoDirectivos;
use App\Models\Personas;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Toast;
class consejo_directivoController extends Controller
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
            $consejo = DB::table('consejodirectivos as cd')
                ->join('personas as p', 'cd.persona_id', '=', 'p.id')
                ->join('cargos as c', 'cd.cago_id', '=', 'c.id')
                ->join('facultades as f', 'cd.facultad_id', '=', 'f.id')
                ->join('gradosacademicos as ga', 'cd.gradoacademico_id', '=', 'ga.id')
                ->select('cd.id', 'p.dni', 'p.nombres', 'p.apellidos', 'cd.imagen', 'cd.activo', 'c.cargo', 'f.nombre', 'ga.grado', 'ga.abreviatura', 'cd.borrado')
                ->where('cd.borrado', '=', 0)
                ->where('p.apellidos', 'LIKE', '%' . $query . '%')
                ->get();
            return view('admin.consejo_directivo.index', ["consejo" => $consejo, "searchText" => $query, "usuarios" => $usuarios]);
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
        $facultad = DB::table('facultades')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $cargo = DB::table('cargos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $gradosacademicos = DB::table('gradosacademicos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.consejo_directivo.create', ['facultad' => $facultad, 'cargo' => $cargo, 'gradosacademicos' => $gradosacademicos, "usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Consejo_directivoFormRequest $request)
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
            
            return Redirect::to('admin/consejo/create');

        }else{
        $personas = new Personas();
        $personas->dni = $request->get('dni');
        $personas->nombres = $request->get('nombres');
        $personas->apellidos = $request->get('apellidos');
        $personas->activo = 1;
        $personas->borrado = 0;
        $personas->save();
        $consejo = new ConsejoDirectivos();
        $consejo->activo = $request->get('activo');
        $consejo->borrado = 0;
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\consejo', $file->getClientOriginalName());
            $consejo->imagen = $file->getClientOriginalName();
        }
        $consejo->persona_id = $personas->id;
        $consejo->cago_id = $request->get('cargo');
        $consejo->facultad_id = $request->get('facultad');
        $consejo->gradoacademico_id = $request->get('grado');
        $consejo->save();
        toastr()->success('Consejo Directivo Registrado Correctamente');
        return redirect::to('admin/consejo');

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
        $consejo = ConsejoDirectivos::findOrFail($id);
        if (($consejo->activo) == '1') {
            $consejo->activo = 0;
            $consejo->update();
        } else {
            $consejo->activo = '1';
            $consejo->update();
        }
        return Redirect::to('admin/consejo');
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
        $consejo = DB::table('consejodirectivos as cd')
            ->join('personas as p', 'cd.persona_id', '=', 'p.id')
            ->select('cd.id', 'p.dni', 'p.nombres', 'p.apellidos', 'p.activo', 'cd.activo', 'cd.imagen', 'cd.gradoacademico_id', 'cd.cago_id', 'cd.facultad_id')
            ->where('cd.id', '=', $id)
            ->first();
        $facultad = DB::table('facultades')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $cargo = DB::table('cargos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        $gradosacademicos = DB::table('gradosacademicos')
            ->where('activo', '=', 1)
            ->where('borrado', '=', 0)
            ->get();
        return view('admin.consejo_directivo.edit', ['consejo' => $consejo, 'facultad' => $facultad, 'cargo' => $cargo, 'gradosacademicos' => $gradosacademicos, "usuarios" => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Consejo_directivoFormRequest $request, $id)
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
            
            return Redirect::to('admin/consejo');

        }else{
        $personass = DB::table('consejodirectivos as cd')
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
        $consejo = ConsejoDirectivos::findOrFail($id);
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '\img\consejo', $file->getClientOriginalName());
            $consejo->imagen = $file->getClientOriginalName();
        }
        $consejo->cago_id = $request->get('cargo');
        $consejo->facultad_id = $request->get('facultad');
        $consejo->gradoacademico_id = $request->get('grado');
        $consejo->update();
        toastr()->success('Consejo Directivo Registrado Correctamente');
        return Redirect::to('admin/consejo');
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
        $consejo = ConsejoDirectivos::findOrFail($id);
        $consejo->borrado = 1;
        $consejo->update();
        return Redirect::to('admin/consejo');
    }
}
