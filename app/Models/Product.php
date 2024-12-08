<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'uuid',
        'image',
        'short_description',
        'description',
        'unit',
        'quantity',
        'packaging',
        'price',
        'stock',
        'is_active'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->name = ucwords($model->name);
            do {
                $uuid = Str::uuid()->toString();
            } while ($model->where('uuid', $uuid)->exists());        
            $model->uuid = $uuid;
            $model->short_description = $model->generateShortDescription($model->description);
        });

        static::updating(function ($model) {
            $model->name = ucwords($model->name);
            $model->short_description = $model->generateShortDescription($model->description);
        });
    }

    public function specification()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id');
    }
    public function values()
    {
        return $this->belongsTo(ProductSpecificationValue::class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    function generateShortDescription($text, $max_length = 300) {
        $text = strip_tags($text);
        if (strlen($text) <= $max_length) {
            return trim($text);
        }
        $trimmed = substr($text, 0, $max_length);
        $last_space = strrpos($trimmed, ' ');
        if ($last_space !== false) {
            $trimmed = substr($trimmed, 0, $last_space);
        }
        return trim($trimmed . '...');
    }
}