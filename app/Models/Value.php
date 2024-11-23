<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Value extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'values';
    protected $fillable = [
        'parent_id',
        'specification_id',
        'value',
        'is_active'
    ];
  
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $model->slug = Str::slug($model->name);
    //         $model->short_description = $model->generateShortDescription($model->description);
    //     });

    //     static::updating(function ($model) {
    //         $model->slug = Str::slug($model->name);
    //         $model->short_description = $model->generateShortDescription($model->description);
    //     });
    // }
}