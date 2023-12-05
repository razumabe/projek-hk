<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Pengajar'],
            ['name' => 'Mahasantri'],
            ['name' => 'Santri'],
        ];

        Role::insert($roles);
    }
}
