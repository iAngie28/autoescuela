<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PaqueteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $paquetes = Paquete::paginate();

        return view('paquete.index', compact('paquetes'))
            ->with('i', ($request->input('page', 1) - 1) * $paquetes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $paquete = new Paquete();

        return view('paquete.create', compact('paquete'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaqueteRequest $request): RedirectResponse
    {
        Paquete::create($request->validated());

        return Redirect::route('paquetes.index')
            ->with('success', 'Paquete created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $paquete = Paquete::find($id);

        return view('paquete.show', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $paquete = Paquete::find($id);

        return view('paquete.edit', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaqueteRequest $request, Paquete $paquete): RedirectResponse
    {
        $paquete->update($request->validated());

        return Redirect::route('paquetes.index')
            ->with('success', 'Paquete updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Paquete::find($id)->delete();

        return Redirect::route('paquetes.index')
            ->with('success', 'Paquete deleted successfully');
    }
}
