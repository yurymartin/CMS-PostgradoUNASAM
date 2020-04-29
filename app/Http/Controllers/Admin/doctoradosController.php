<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\doctoradosFormRequest;
use App\Models\Doctorados;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;

class doctoradosController extends Controller
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
            $doctorados = DB::table('doctorados')
                ->where('borrado', '=', 0)
                ->where('doctorado', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->get();
            return view('admin.doctorados.index', ['doctorados' => $doctorados, 'searchText' => $query, "usuarios" => $usuarios]);
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

        return view('admin.doctorados.create', ["usuarios" => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(doctoradosFormRequest $request)
    {
        $doctorados = new Doctorados;
        $doctorados->doctorado = $request->get('doctorado');
        $doctorados->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(resource_path() . '/views/web/doctorados', $file->getClientOriginalName());
            $doctorados->link = $file->getClientOriginalName();
        }
        if (Input::hasFile('imagen')) {
            $file2 = Input::file('imagen');
            $file2->move(public_path() . '\img\doctorados', $file2->getClientOriginalName());
            $doctorados->ruta = $file2->getClientOriginalName();
        }
        $doctorados->activo = $request->get('estado');
        $doctorados->borrado = 0;
        $doctorados->save();
        return redirect::to('admin/doctorados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $doctorados = Doctorados::findOrFail($id);
        if (($doctorados->activo) == '1') {
            $doctorados->activo = 0;
            $doctorados->update();
        } else {
            $doctorados->activo = '1';
            $doctorados->update();
        }
        return redirect::to('admin/doctorados');
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
        $doctorados = Doctorados::findOrFail($id);
        return view('admin.doctorados.edit', ['doctorados' => $doctorados, "usuarios" => $usuarios]);
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
        $doctorados = Doctorados::findOrFail($id);
        $doctorados->doctorado = $request->get('doctorado');
        $doctorados->descripcion = $request->get('descripcion');
        if (Input::hasFile('link')) {
            $file = Input::file('link');
            $file->move(resource_path() . '/views/web/doctorados', $file->getClientOriginalName());
            $doctorados->link = $file->getClientOriginalName();
        }
        if (Input::hasFile('imagen')) {
            $file2 = Input::file('imagen');
            $file2->move(public_path() . '\img\doctorados', $file2->getClientOriginalName());
            $doctorados->ruta = $file2->getClientOriginalName();
        }
        $doctorados->update();
        return redirect::to('admin/doctorados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctorados = Doctorados::findOrFail($id);
        $doctorados->borrado = 1;
        $doctorados->update();
        return redirect::to('admin/doctorados');
    }
}
