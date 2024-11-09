<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogComment extends Model
{   
    use HasFactory, SoftDeletes;
    protected $table = 'blog_comments';
    protected $fillable = [
        'blog_id',
        'user_id',
        'blog_comment_id',
        'name',
        'email',
        'comment',
        'is_active'
    ];   
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $model->slug = Str::slug($model->name);
    //     });

    //     static::updating(function ($model) {
    //         $model->slug = Str::slug($model->name);
    //     });
    // }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}