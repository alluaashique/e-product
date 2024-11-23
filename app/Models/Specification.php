<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Specification extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'specifications';
    protected $fillable = [
        'parent_id',
        'value_id',
        'specification',
        'is_active'
    ];

    public function values()
    {
        return $this->hasMany(Value::class);
    }
   
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