<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new user();
        $user->name ='Admin';
        $user->email ='admin@gmail.com';
        $user->password = bcrypt('admin@123');
        $user->is_admin = 1;
        $user->save();
    }
}
