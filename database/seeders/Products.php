<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->delete();

        for($i=1;$i<15;$i++){
            DB::table("products")->insert([
                "name"             => "Vestido de Bolinha {$i}",
                "description"      => "Vestido de Bolinha {$i}",
                "image"            => "/products/{$i}.jpg",
                "price"            => 15.00 * 1.00,
                "created_at"       => now(),
                "updated_at"       => now(),
            ]);
        }
    }
}
