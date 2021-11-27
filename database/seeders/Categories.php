<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    public function run()
    {
        DB::table("categories")->delete();
        Category::create(["name"=>"Vestidos", "description"=> "Categorias de vestidos"]);
        Category::create(["name"=>"Camisas", "description"=> "Categorias de camisas"]);
        Category::create(["name"=>"Calças", "description"=> "Categorias de calças"]);
        Category::create(["name"=>"Inverno", "description"=> "Categorias de Inverno"]);
        Category::create(["name"=>"Verão", "description"=> "Categorias de Verão"]);
    }
}
