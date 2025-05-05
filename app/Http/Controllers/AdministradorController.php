<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AdministradorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $administradors = Administrador::paginate();

        return view('administrador.index', compact('administradors'))
            ->with('i', ($request->input('page', 1) - 1) * $administradors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $administrador = new Administrador();

        return view('administrador.create', compact('administrador'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministradorRequest $request): RedirectResponse
    {
        Administrador::create($request->validated());

        return Redirect::route('administradors.index')
            ->with('success', 'Administrador created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $administrador = Administrador::find($id);

        return view('administrador.show', compact('administrador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $administrador = Administrador::find($id);

        return view('administrador.edit', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdministradorRequest $request, Administrador $administrador): RedirectResponse
    {
        $administrador->update($request->validated());

        return Redirect::route('administradors.index')
            ->with('success', 'Administrador updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Administrador::find($id)->delete();

        return Redirect::route('administradors.index')
            ->with('success', 'Administrador deleted successfully');
    }
}
