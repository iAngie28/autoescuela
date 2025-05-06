<?php

namespace App\Http\Controllers;

use App\Models\GrupoExaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GrupoExamanRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GrupoExamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $grupoExamen = GrupoExaman::paginate();

        return view('grupo-examan.index', compact('grupoExamen'))
            ->with('i', ($request->input('page', 1) - 1) * $grupoExamen->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $grupoExaman = new GrupoExaman();

        return view('grupo-examan.create', compact('grupoExaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoExamanRequest $request): RedirectResponse
    {
        GrupoExaman::create($request->validated());

        return Redirect::route('grupo-examen.index')
            ->with('success', 'GrupoExaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $grupoExaman = GrupoExaman::find($id);

        return view('grupo-examan.show', compact('grupoExaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $grupoExaman = GrupoExaman::find($id);

        return view('grupo-examan.edit', compact('grupoExaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoExamanRequest $request, GrupoExaman $grupoExaman): RedirectResponse
    {
        $grupoExaman->update($request->validated());

        return Redirect::route('grupo-examen.index')
            ->with('success', 'GrupoExaman updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        GrupoExaman::find($id)->delete();

        return Redirect::route('grupo-examen.index')
            ->with('success', 'GrupoExaman deleted successfully');
    }
}
