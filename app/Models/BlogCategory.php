<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->name = ucwords($model->name);
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            $model->name = ucwords($model->name);
            $model->slug = Str::slug($model->name);
        });
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'blog_category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
