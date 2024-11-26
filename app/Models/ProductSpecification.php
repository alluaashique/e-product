<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSpecification extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_specs';
    protected $fillable = [
        'parent_id',
        'product_value_id',
        'category_id',
        'brand_id',
        'product_id',
        'specification_id',
        'specification',
        'is_quantity',
        'is_active'
    ];
   
    public function values()
    {
        return $this->hasMany(ProductSpecificationValue::class, 'product_spec_id');
    }
}