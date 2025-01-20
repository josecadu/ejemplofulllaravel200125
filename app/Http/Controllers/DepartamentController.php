<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos=Departament::orderBy('nombre')->get();
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        Departament::create($request->all());
        return redirect()->route('departaments.index')->with('mensaje', 'Departamento Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departament $departament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departament $departament)
    {
        return view('departamentos.edit', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departament $departament)
    {
        $request->validate($this->rules($departament->id));
        $departament->update($request->all());
        return redirect()->route('departaments.index')->with('mensaje', 'Departamento Editado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departament $departament)
    {
        $departament->delete();
        return redirect()->route('departaments.index')->with('mensaje', 'Departamento Borrado');
    }
    private function rules(?int $id=null): array{
        return [
            'nombre'=>['required', 'string', 'min:3', 'max:25', 'unique:departaments,nombre,'.$id],
            'color'=>['required', 'color-hex'],
        ];
    }
}
