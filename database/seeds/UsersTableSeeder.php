<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role_id' => '2',
         ]);
    }
    }
}
