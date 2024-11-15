<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Brand extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'is_active'
    ];
   
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
            $model->short_description = $model->generateShortDescription($model->description);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
            $model->short_description = $model->generateShortDescription($model->description);
        });
    }

    function generateShortDescription($text, $max_length = 500) {
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
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}