<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'sub_cat_name',
        'sub_cat_description',
        'sub_cat_image',
    ];
}
