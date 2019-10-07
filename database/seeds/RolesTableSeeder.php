<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::create(['role_name'=>'superadmin']);
        role::create(['role_name'=>'admin']);
        role::create(['role_name'=>'inventory manager']);
        role::create(['role_name'=>'order manager']);
		role::create(['role_name'=>'customer']);
    }
}
