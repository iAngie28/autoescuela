<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InstructorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $instructors = Instructor::paginate();

        return view('instructor.index', compact('instructors'))
            ->with('i', ($request->input('page', 1) - 1) * $instructors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $instructor = new Instructor();

        return view('instructor.create', compact('instructor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorRequest $request): RedirectResponse
    {
        Instructor::create($request->validated());

        return Redirect::route('instructors.index')
            ->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $instructor = Instructor::find($id);

        return view('instructor.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $instructor = Instructor::find($id);

        return view('instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, Instructor $instructor): RedirectResponse
    {
        $instructor->update($request->validated());

        return Redirect::route('instructors.index')
            ->with('success', 'Instructor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Instructor::find($id)->delete();

        return Redirect::route('instructors.index')
            ->with('success', 'Instructor deleted successfully');
    }
}
