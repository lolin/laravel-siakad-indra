<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory(200)->create();

        User::factory()->create(
            ['name' => "Putu Indra",
            'email' => "putu.lolin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('hanoman44'), // password
            'roles'=>'admin',
            'phone' => '08123456789',
            'address' => 'Jalan Jalan Hoby Jalan Jalan',
            // 'remember_token' => Str::random(10),
            ]
        );

    }
}
