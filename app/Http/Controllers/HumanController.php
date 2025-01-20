<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Human;
use App\Models\Role;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados=Human::with('departament', 'roles')->orderBy('id')->paginate(5);
        return view('humans.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos=Departament::select('id', 'nombre')->orderBy('nombre')->get();
        $roles=Role::select('id', 'nombre')->orderBy('nombre')->get();
        return view('humans.create', compact('departamentos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Human $human)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        //
    }
    private function rules(?int $id=null):array{
        return [
            'username'=>['required', 'string', 'min:3', 'max:32', 'unique:humans,username,'.$id],
            'email'=>['required', 'email', 'unique:humans,email,'.$id],
            'logo'=>['image', 'max:2048'],
            'activo'=>['required', 'string', 'in:SI,NO'],
            'departament_id'=>['required', 'exists:departaments,id'],
            'role_id'=>['required', 'array', 'exists:roles,id']
        ];
    }
}
