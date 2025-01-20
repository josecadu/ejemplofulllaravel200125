<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valores=[
            'normal'=>'#E57373',
            'root'=>'#F06292',
            'superroot'=>'#BA68C8',
            'guest'=>'#9575CD',
            'becario'=>'#64B5F6'
        ];
        ksort($valores);
        foreach($valores as $nombre=>$color){
            Role::create(compact('nombre', 'color'));
        }
    }
}
