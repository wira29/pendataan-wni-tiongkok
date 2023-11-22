<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::all()->each(function (Role $role) {
            $user = User::factory()->count(1)->create([
                'email' => $role->name . '@gmail.com',
            ])->first();

            $user->assignRole($role->name);
        });
    }
}
