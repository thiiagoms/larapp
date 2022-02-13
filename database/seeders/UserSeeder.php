<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'First User - Thiago',
                'email' => 'thiagofirsttest@gmail.com',
                'password' => 'studylaravel#2123'
            ],
            [
                'name' => 'Second user - Thiago',
                'email' => 'thiagosecondtest@gmail.com',
                'password' => 'tudylaravel#2123'
            ],
            [
                'name' => 'Third user - Thiago',
                'email' => 'thiagothirdtest@gmail.com',
                'password' => 'tudylaravel#2123'
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password'])
            ]);
        }
    }
}
