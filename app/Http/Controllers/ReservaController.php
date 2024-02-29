<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Support\Facades\Gate;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = auth()->user()->reservas;

        return view("reservas.index", ["reservas"=>$reservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $vuelo = Vuelo::find($request->vuelo_id);
        $salida = $vuelo->aeropuertoSalida->nombre;
        $llegada = $vuelo->aeropuertoLlegada->nombre;
        $precio = $vuelo->precio;


        if (reserva::all()) {
            $arrayFila = reserva::all()->pluck('plaza')->where('id', $request->vuelo_id);
        } else {
            $arrayFila = [];
        }
        return view("reservas.create", [
            "vuelo_id" => $vuelo->id,
            "plazas"=> $vuelo->plazas,
            "usuario"=>auth()->user()->id,
            "salida"=> $salida,
            "llegada"=> $llegada,
            "arrayFila" => $arrayFila,
            "precio" => $precio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reserva::create([
            "user_id" =>auth()->user()->id,
            "vuelo_id" => $request->vuelo_id,
            "plaza" => $request->plaza
        ]);
        return redirect()->route("vuelos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        if (!Gate::allows('update', $reserva)) {
            abort(403);
        }

        if (reserva::all()) {
            $arrayFila = reserva::all()->pluck('plaza')->where('id', $reserva->vuelo->vuelo_id);
        } else {
            $arrayFila = [];
        }
        return view("reservas.edit", ["reserva"=> $reserva, "arrayFila"=>$arrayFila]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {

        $reserva->update([
            "user_id" =>auth()->user()->id,
            "vuelo_id" => $reserva->vuelo_id,
            "plaza" => $request->plaza
        ]);
        return redirect()->route("reservas.index");    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        if (!Gate::allows('delete', $reserva)) {
            abort(403);
        }
        Reserva::destroy([$reserva->id]);
        return redirect()->route("reservas.index");
    }
}
