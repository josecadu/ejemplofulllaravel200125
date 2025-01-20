<?php

namespace Database\Seeders;

use App\Models\Human;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $humanos=Human::factory(30)->create();
        $rolesId=Role::pluck('id')->toArray();
       
        foreach($humanos as $humano){
            shuffle($rolesId);
            $humano->roles()->attach($this->getIdRandomRoles($rolesId));
        }
    }
    private function getIdRandomRoles(array $rolesId):array{
        return array_splice($rolesId, 0, random_int(1, count($rolesId)-1));
    }
}
