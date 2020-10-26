<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'guard_name' => 'admin',
        ]);

        $user = Admin::find(1);
        $user->assignRole('Super Admin');
    }
}
