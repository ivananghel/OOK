<?php

use App\Models\Role;
use App\Models\User;
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
        // Admin
        $admin_user = User::where('email', '=', 'admin@admin.com')->first();
		
        if ($admin_user == null) {
            $admin_user = User::create([
                'email' => 'admin@admin.com',
                'first_name' => 'Admin',
                'last_name' => 'Test',
                'password' => Hash::make('admin'),
                'status' => User::USER_STATUS_ACTIVE
            ]);

			$admin_user->roles()->attach(Role::where('name', '=', 'admin')->firstOrFail());
        } else {
            $admin_user->roles()->detach();
            $admin_user->roles()->attach(Role::where('name', '=', 'admin')->firstOrFail());
        }

    }
}
