<?php

namespace App\Http\Controllers;

use App\Models\ExamenCategoriaAspira;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ExamenCategoriaAspiraRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ExamenCategoriaAspiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $examenCategoriaAspiras = ExamenCategoriaAspira::paginate();

        return view('examen-categoria-aspira.index', compact('examenCategoriaAspiras'))
            ->with('i', ($request->input('page', 1) - 1) * $examenCategoriaAspiras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $examenCategoriaAspira = new ExamenCategoriaAspira();

        return view('examen-categoria-aspira.create', compact('examenCategoriaAspira'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamenCategoriaAspiraRequest $request): RedirectResponse
    {
        ExamenCategoriaAspira::create($request->validated());

        return Redirect::route('examen-categoria-aspiras.index')
            ->with('success', 'ExamenCategoriaAspira created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $examenCategoriaAspira = ExamenCategoriaAspira::find($id);

        return view('examen-categoria-aspira.show', compact('examenCategoriaAspira'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $examenCategoriaAspira = ExamenCategoriaAspira::find($id);

        return view('examen-categoria-aspira.edit', compact('examenCategoriaAspira'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamenCategoriaAspiraRequest $request, ExamenCategoriaAspira $examenCategoriaAspira): RedirectResponse
    {
        $examenCategoriaAspira->update($request->validated());

        return Redirect::route('examen-categoria-aspiras.index')
            ->with('success', 'ExamenCategoriaAspira updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ExamenCategoriaAspira::find($id)->delete();

        return Redirect::route('examen-categoria-aspiras.index')
            ->with('success', 'ExamenCategoriaAspira deleted successfully');
    }
}
