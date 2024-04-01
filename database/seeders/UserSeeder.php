<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin QR',
                'email' => 'admin@example.com',
                'phone'=>'254713218312',
                'password'=> bcrypt('password@123'),
                'created_at' => \Carbon\Carbon::now(),
                'unique_code' => 'XXSER543S'
            ],

        ];
        User::insert($users);
        //$users = (array) $users; // Convert Users Object to array using type casting
        //Assign the User Admin Role
        $user = User::findOrFail(1);
        $user->assignRole('Admin');
        $user->syncPermissions(Permission::all());
    }
}
