<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'ice-cream',
            'description' => 'Diwali Offer Promocode',
            'image' => 'icecream.jpg',
            'verified' => 'inactive',
            'calories' => '21',
            'price' => '230 ',
            'tag_id' => '1',
            'category_id' => '1',
            'tax_id' => '2',
            'attributes_id' => '1',
            'indicator' => 'veg',
            'partner'=>'kfc',
            'producttype'=>'simpleproduct',
            'addionalprice'=>'223',
            'addionalspecialprice'=>'100',
            'highlight' => 'this is a demo highlight',
            'allowedorderquantity' => '120',
            'minimumorderquantity' => '15',
            'cod' => 'on',
            'cancelable' => 'on',
            'user_id' => '1',
            'createdby' => 1,
            'modifiedby' => 0,
            'addons_id' => '1',
            'created_at' => now(),
        ]);
    }
}
