<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $roleSuperadmin = User::create([
            'name' => 'Syafei Karim',
            'email' => 'syfei.karim@' . env('APP_DOMAIN', 'gmail.com'),
            'password' => Hash::make('gipcul45'),
        ]);
        $roleSuperadmin->syncRoles([$superadmin]);
    }
}
