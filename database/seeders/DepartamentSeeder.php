<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valores=[
            'Administración'=>'#E57373',
            'Suministros'=>'#F06292',
            'Deportes'=>'#BA68C8',
            'RRHH'=>'#9575CD',
            'I+D'=>'#64B5F6'
        ];
        ksort($valores);
        foreach($valores as $nombre=>$color){
            Departament::create(compact('nombre', 'color'));
        }
    }
}
