<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'username' => 'admin', 'password' => bcrypt('admin'), 'image'=> 'user.jpg', 'isActive' => true, 'isAdmin' => true]);
    }
}
