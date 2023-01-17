<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primarykey ='id';
    protected $fillable = [
        'name',
        'image',
        'description',
        'verified',
        'calories',
        'price',
        'tag_id',
        'category_id',
        'tax_id',
        'addons_id',
        'attributes_id',
        'indicator',
        'partner',
        'highlight',
        'allowedorderquantity',
        'minimumorderquantity',
        'producttype',
        'addionalprice',
        'addionalspecialprice',
        'cod',
        'cancelable',
        'createdby',
        'modifiedby',
        'user_id'
        
    ];
}
