<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 'first_name',
        // 'last_name',
        // 'email',
        // 'password',
        // 'role', 
        // 'is_approved',
        //
        $pwd = 'P@$$w0rd';
        // Seed user 1
        $email = 'a@a.a';
        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            $user = User::create([
                'first_name' => 'a',
                'last_name' => 'a',
                'email' => $email,
                'password' => Hash::make($pwd),
                'role' => 'Admin',
                'is_approved' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed user 2
        $email = 'b@b.b';
        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            $user = User::create([
                'first_name' => 'b',
                'last_name' => 'b',
                'email' => $email,
                'password' => Hash::make($pwd),
                'role' => 'Contributor',
                'is_approved' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
