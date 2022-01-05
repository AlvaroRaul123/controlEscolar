<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Docente;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtengo todos los grupos para desplegarlos en una tabla
        //$grupos=Grupo::all();
        $grupos=Grupo::select('grupos.id','grupos.grupo_nombre','grupos.grado','nivels.nivel','docentes.nombre','apellido_p','apellido_m')
        ->join('nivels','nivels.id','=','grupos.nivel_id')
        ->join('docentes','docentes.id','=','grupos.docente_id')
        ->get();

        return view('administrativo.grupos.index',compact('grupos'));
        //echo '<pre>'.print_r($grupos, true).'</pre>';     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //trago todos los docente y los guardo el docenteslist y luego lo mando a la vista
        //crear grupo, eso con el fin de seleccional al docente con un combobox
        $docenteslist=Docente::all();
        $nvls=Nivel::all();
        return view('administrativo.grupos.create',compact('docenteslist','nvls'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grups=new Grupo;
        $grups->grupo_nombre=$request->input('grupo');
        $grups->grado=$request->input('grado');
        $grups->cupo_maximo=$request->input('cupo');
        $grups->nivel_id=$request->input('nivel');
        $grups->docente_id=$request->input('docente');
        $grups->save();
        return redirect()->route('grupos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
              echo("holaaa");
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }


}
