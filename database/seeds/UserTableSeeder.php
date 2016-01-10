<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'  => 'Mahin',
            'email' => 'admin@creativecoaching.com.bd',
            'role'  => 'admin',
            'password' => bcrypt('creative')
        ]);
    }
}
