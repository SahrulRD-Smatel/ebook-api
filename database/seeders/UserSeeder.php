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
        \DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('12345678'),
            'created_at' => new \DateTime,
            'updated_at' => null,
        ]);
    }
}
