<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a new admin when seeding
        $admin = new Admin();
        $admin->first_name = 'John';
        $admin->last_name = 'Doe';
        $admin->username = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password');
        $admin->picture = 'no_image.png';
        $admin->save();
    }
}
