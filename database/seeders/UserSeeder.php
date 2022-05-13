<?php

namespace Database\Seeders;

use Faker\Provider\pt_BR\Internet;
use Faker\Provider\pt_BR\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakeName = Person::firstNameMale();
        $fakeUsername = mb_strtolower($fakeName);
        $email = $fakeUsername . '@' . Internet::freeEmailDomain();

        DB::table('users')->insert([
            'tenant_id' => rand(1, 3),
            'username' => $fakeUsername,
            'password' => Hash::make('password'),
            'name' => $fakeName,
            'email' => $email,
        ]);
    }
}
