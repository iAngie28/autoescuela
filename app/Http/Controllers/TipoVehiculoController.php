<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoVehiculoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoVehiculos = TipoVehiculo::paginate();

        return view('tipo-vehiculo.index', compact('tipoVehiculos'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoVehiculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoVehiculo = new TipoVehiculo();

        return view('tipo-vehiculo.create', compact('tipoVehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoVehiculoRequest $request): RedirectResponse
    {
        TipoVehiculo::create($request->validated());

        return Redirect::route('tipo-vehiculos.index')
            ->with('success', 'TipoVehiculo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoVehiculo = TipoVehiculo::find($id);

        return view('tipo-vehiculo.show', compact('tipoVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoVehiculo = TipoVehiculo::find($id);

        return view('tipo-vehiculo.edit', compact('tipoVehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoVehiculoRequest $request, TipoVehiculo $tipoVehiculo): RedirectResponse
    {
        $tipoVehiculo->update($request->validated());

        return Redirect::route('tipo-vehiculos.index')
            ->with('success', 'TipoVehiculo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TipoVehiculo::find($id)->delete();

        return Redirect::route('tipo-vehiculos.index')
            ->with('success', 'TipoVehiculo deleted successfully');
    }
}
