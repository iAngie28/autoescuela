<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstudianteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estudiantes = Estudiante::paginate();

        return view('estudiante.index', compact('estudiantes'))
            ->with('i', ($request->input('page', 1) - 1) * $estudiantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estudiante = new Estudiante();

        return view('estudiante.create', compact('estudiante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudianteRequest $request): RedirectResponse
    {
        Estudiante::create($request->validated());

        return Redirect::route('estudiantes.index')
            ->with('success', 'Estudiante created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estudiante = Estudiante::find($id);

        return view('estudiante.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estudiante = Estudiante::find($id);

        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudianteRequest $request, Estudiante $estudiante): RedirectResponse
    {
        $estudiante->update($request->validated());

        return Redirect::route('estudiantes.index')
            ->with('success', 'Estudiante updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Estudiante::find($id)->delete();

        return Redirect::route('estudiantes.index')
            ->with('success', 'Estudiante deleted successfully');
    }
}
