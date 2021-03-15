<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \DB::table('users')->insert([
            'id' => 1,
            'name' => "محمد عبدالله",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'role_id' => 1
        ]);


        \DB::table('users')->insert([
            'id' => 2,
            'name' => "أحمد محمد",
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'role_id' => 1
        ]);

        \DB::table('users')->insert([
            'id' => 3,
            'name' => "فاطمة عمر",
            'email' => "user2@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'role_id' => 2
        ]);

    }
}
