<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->truncate();

        Role::create([
        'name' => "Owner",
        ]);

        Role::create([
            'name' => "User",
        ]);
    }
}
