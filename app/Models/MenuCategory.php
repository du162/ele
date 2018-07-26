<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    //
    public $fillable=[
        'name',
        'type_accumulation',
        'shop_id',
        'description',
        'is_selected',
    ];
}
