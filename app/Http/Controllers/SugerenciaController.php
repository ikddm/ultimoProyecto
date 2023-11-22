<?php

namespace App\Http\Controllers;
use App\Models\Sugerencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sugerencia' => 'required|string',
        ]);
    
        $sugerencia = new Sugerencia();
        $sugerencia->creadorId = Auth::user()->id;
        $sugerencia->mensaje = $request->input('sugerencia');
        $sugerencia->created_at = Carbon::now();
        $sugerencia->save();
    
        return redirect()->back()->with('success', 'Sugerencia enviada con éxito y registrada en la base de datos');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Sugerencia $sugerencia)
    {
        $todasSugerencias = Sugerencia::all();
        return view('misSugerencias',compact('todasSugerencias'));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sugerencia $sugerencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sugerencia $sugerencia)
    {
        $newsugerencia =Sugerencia::find($sugerencia->id);
        $newsugerencia->mensaje= $request->mensaje;
        $newsugerencia->save();
        return redirect('verSugerencias');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sugerencia $sugerencia)
    {   
        $sugerencia->delete();
        return redirect('verSugerencias');
    }
}
