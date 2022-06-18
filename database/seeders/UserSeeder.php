<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        [
            [
                $user = new User(),
                $user->fullname = "Intan Permatasari",
                $user->email = "intancious98@gmail.com",
                $user->username = "intancious98",
                $user->phone = "081226499987",
                $user->roles = "ADMIN",
                $user->email_verified_at = now(),
                $user->password = Hash::make('12345678'),
                $user->save()
            ],
            [
                $user = new User(),
                $user->fullname = "Daeng Kucingku",
                $user->email = "daeng@gmail.com",
                $user->username = "daeng",
                $user->phone = "098765",
                $user->roles = "USER",
                $user->email_verified_at = now(),
                $user->password = Hash::make('12345678'),
                $user->save()
            ],
            [
                $user = new User(),
                $user->fullname = "Selyana Puspitasari",
                $user->email = "sel@gmail.com",
                $user->username = "sel",
                $user->phone = "09876598989",
                $user->roles = "USER",
                $user->email_verified_at = now(),
                $user->password = Hash::make('12345678'),
                $user->save()
            ]
        ];
    }
}
