<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf'        =>'1112225555',
            'name'       =>'João',
            'phone'      =>'359999999',
            'birth'      =>'1980-10-01',
            'gender'     =>'M',
            'email'      =>'joao3@sistema.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('123456'): '123456',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
