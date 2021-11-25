<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->delete();

        DB::table("users")->insert([
            "name"             => "Usuário de Teste",
            "email"            => "teste@teste",
            "password"         => bcrypt("teste"),
            "created_at"       => now(),
            "updated_at"       => now(),
        ]);
    }
}
