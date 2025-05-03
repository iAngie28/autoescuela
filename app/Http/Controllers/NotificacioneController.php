<?php

namespace App\Http\Controllers;

use App\Models\Notificacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NotificacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NotificacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $notificaciones = Notificacione::paginate();

        return view('notificacione.index', compact('notificaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $notificaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $notificacione = new Notificacione();

        return view('notificacione.create', compact('notificacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificacioneRequest $request): RedirectResponse
    {
        Notificacione::create($request->validated());

        return Redirect::route('notificaciones.index')
            ->with('success', 'Notificacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $notificacione = Notificacione::find($id);

        return view('notificacione.show', compact('notificacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $notificacione = Notificacione::find($id);

        return view('notificacione.edit', compact('notificacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificacioneRequest $request, Notificacione $notificacione): RedirectResponse
    {
        $notificacione->update($request->validated());

        return Redirect::route('notificaciones.index')
            ->with('success', 'Notificacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Notificacione::find($id)->delete();

        return Redirect::route('notificaciones.index')
            ->with('success', 'Notificacione deleted successfully');
    }
}
