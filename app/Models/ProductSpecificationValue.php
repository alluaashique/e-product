<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSpecificationValue extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_spec_values';
    protected $fillable = [
        'parent_id',
        'category_id',
        'brand_id',
        'product_id',
        'product_spec_id',
        'value_id',
        'value',
        'price',
        'is_active'
    ];

}