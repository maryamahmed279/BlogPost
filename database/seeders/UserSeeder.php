<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //the initial users 
        $users=[
            ['name'=>'user1 ',
            'password'=>'1234',
            'email'=>'user1@gmail.com'
        ],
            ['name'=>'user2 ',
            'password'=>'1234',
            'email'=>'user2@gmail.com'
        ],
            ['name'=>'user3 ',
            'password'=>'1234',
            'email'=>'user3@gmail.com'
        ]
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
