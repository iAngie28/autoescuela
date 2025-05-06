<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PagoRequest;
use App\Models\Estudiante;
use App\Models\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pagos = Pago::paginate();

        return view('pago.index', compact('pagos'))
            ->with('i', ($request->input('page', 1) - 1) * $pagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pago = new Pago();
        $usuariosEstudiantes = Usuario::where('id_rol', 2)->get();
        $usuariosAdministrador = Usuario::where('id_rol', 1)->get(); // Usuarios con rol de estudiante
    return view('pago.create', compact('pago', 'usuariosEstudiantes', 'usuariosAdministrador'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagoRequest $request): RedirectResponse
    {
        Pago::create($request->validated());

        return Redirect::route('pagos.index')
            ->with('success', 'Pago created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pago = Pago::find($id);

        return view('pago.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pago = Pago::findOrFail($id); // Falla con 404 si no existe
        $usuariosEstudiantes = Usuario::where('id_rol', 2)->get();
        $usuariosAdministrador = Usuario::where('id_rol', 1)->get();
        return view('pago.edit', compact('pago', 'usuariosEstudiantes', 'usuariosAdministrador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagoRequest $request, Pago $pago): RedirectResponse
    {
        $pago->update($request->validated());

        return Redirect::route('pagos.index')
            ->with('success', 'Pago updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pago::find($id)->delete();

        return Redirect::route('pagos.index')
            ->with('success', 'Pago deleted successfully');
    }
}
