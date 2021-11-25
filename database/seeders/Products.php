<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;

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
            $product = Product::create([
                "name"             => "Vestido de Bolinha {$i}",
                "description"      => "Vestido de Bolinha {$i}",
                "price"            => 15.00 * 1.00,
            ]);
            ProductImage::create(["url"=>"products/{$product->id}a.jpg", "main"=>1, "product_id"=>$product->id]);
            ProductImage::create(["url"=>"products/{$product->id}b.jpg", "main"=>0, "product_id"=>$product->id]);
            ProductImage::create(["url"=>"products/{$product->id}c.jpg", "main"=>0, "product_id"=>$product->id]);
        }
    }
}
