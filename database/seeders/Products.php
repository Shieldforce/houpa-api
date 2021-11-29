<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;

class Products extends Seeder
{
    public function run()
    {
        DB::table("products")->delete();

        // Calças
        for($i=1;$i<5;$i++){
            $product1 = Product::create([
                "name"             => "Calça Jeans {$i}",
                "description"      => "Descrição de Calça Jeans {$i}",
                "price"            => 75.00 * 1.00,
                "reference"        => rand(15066121,16066121),
            ]);
            $urlImage = "data:image/jpeg;base64,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";

            ProductImage::create(["url"=>"{$urlImage}", "main"=>1, "product_id"=>$product1->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product1->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product1->id]);

            ProductSize::create(["name"=>"P", "product_id"=>$product1->id]);
            ProductSize::create(["name"=>"M", "product_id"=>$product1->id]);
            ProductSize::create(["name"=>"G", "product_id"=>$product1->id]);

            ProductColor::create(["color"=>"red", "product_id"=>$product1->id]);
            ProductColor::create(["color"=>"blue", "product_id"=>$product1->id]);
            ProductColor::create(["color"=>"green", "product_id"=>$product1->id]);

            $product1->categories()->sync([1,4,5]);
        }

        // Vestidos
        for($i=1;$i<5;$i++){
            $product2 = Product::create([
                "name"             => "Vestido de Bolinha {$i}",
                "description"      => "Descrição do Vestido de Bolinha {$i}",
                "price"            => 115.00 * 1.00,
                "reference"        => rand(15066121,16066121),
            ]);
            $urlImage = "data:image/jpeg;base64,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";
            ProductImage::create(["url"=>"{$urlImage}", "main"=>1, "product_id"=>$product2->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product2->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product2->id]);

            ProductSize::create(["name"=>"P", "product_id"=>$product2->id]);
            ProductSize::create(["name"=>"M", "product_id"=>$product2->id]);
            ProductSize::create(["name"=>"G", "product_id"=>$product2->id]);

            ProductColor::create(["color"=>"red", "product_id"=>$product2->id]);
            ProductColor::create(["color"=>"blue", "product_id"=>$product2->id]);
            ProductColor::create(["color"=>"green", "product_id"=>$product2->id]);

            $product2->categories()->sync([1,2,6]);
        }

        // Camisas
        for($i=1;$i<5;$i++){
            $product3 = Product::create([
                "name"             => "Camisa Manga Curta {$i}",
                "description"      => "Descrição Camisa manga curta {$i}",
                "price"            => 65.00 * 1.00,
                "reference"        => rand(15066121,16066121),
            ]);
            $urlImage = "data:image/jpeg;base64,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";
            ProductImage::create(["url"=>"{$urlImage}", "main"=>1, "product_id"=>$product3->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product3->id]);
            ProductImage::create(["url"=>"{$urlImage}", "main"=>0, "product_id"=>$product3->id]);

            ProductSize::create(["name"=>"P", "product_id"=>$product3->id]);
            ProductSize::create(["name"=>"M", "product_id"=>$product3->id]);
            ProductSize::create(["name"=>"G", "product_id"=>$product3->id]);

            ProductColor::create(["color"=>"red", "product_id"=>$product3->id]);
            ProductColor::create(["color"=>"blue", "product_id"=>$product3->id]);
            ProductColor::create(["color"=>"green", "product_id"=>$product3->id]);

            $product3->categories()->sync([1,3,6]);
        }
    }
}
