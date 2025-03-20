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
        //
        $pwd = 'P@$$w0rd';
        // Seed user 1
        $email = 'aa@aa.aa';
        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            $user = User::create([
                'name' => 'aa',
                'email' => $email,
                'password' => Hash::make($pwd),
            ]);
        }

        // Seed user 2
        $email = 'bb@bb.bb';
        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            $user = User::create([
                'name' => 'bb',
                'email' => $email,
                'password' => Hash::make($pwd),
            ]);
        }
    }
}
