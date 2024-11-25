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
        });

        static::updating(function ($model) {
            $model->name = ucwords($model->name);
        });
    }
}