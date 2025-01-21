<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Human;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(?int $departament_id=null)
    {
        $empleados= is_null($departament_id) ? 
        Human::with('departament', 'roles')->orderBy('id', 'desc')->paginate(5) :
        Human::with('departament', 'roles')->where('departament_id', $departament_id)->orderBy('id', 'desc')->paginate(5);
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
        dd($request->all());
        $request->validate($this->rules());
        $empleado=Human::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'departament_id'=>$request->departament_id,
            'activo'=>$request->activo,
            'logo'=>($request->logo) ? $request->logo->store('images/logos') :'images/imagen1.jpg'
        ]);
        //guardamos sus roles en la tabla de la relacion nm 'human_role'
        $empleado->roles()->attach($request->role_id);
        return redirect()->route('humans.index')->with('mensaje', 'Empleado guardado');
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
        $departamentos=Departament::select('id', 'nombre')->orderBy('nombre')->get();
        $roles=Role::select('id', 'nombre')->orderBy('nombre')->get();
        $rolesUsuario=$human->getArrayHumanRolesId();

        return view('humans.edit', compact('human', 'departamentos', 'roles', 'rolesUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Human $human)
    {
        $request->validate($this->rules($human->id));
        //1.- actualizamos el usuario
        $imagen=$human->logo;
        $human->update([
            'username'=>$request->username,
            'email'=>$request->email,
            'departament_id'=>$request->departament_id,
            'activo'=>$request->activo,
            'logo'=>($request->logo) ? $request->logo->store('images/logos') : $imagen
        ]);
        //decido si borro o no la imagen
        if($request->logo && basename($imagen)!='imagen1.jpg'){
            Storage::delete($imagen);
        }
        //2.- Actualizamos sus roles
        $human->roles()->sync($request->role_id);
        return redirect()->route('humans.index')->with('mensaje', 'Empleado modificado');
    }

    public function updateActivo(Human $human){
        $activo=($human->activo=='SI') ? "NO" : "SI";
        $human->update(['activo'=>$activo]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        if(basename($human->logo)!='imagen1.jpg') Storage::delete($human->logo);
        $human->delete();
        return redirect()->route('humans.index')->with('mensaje', 'Empleado eliminado');

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
