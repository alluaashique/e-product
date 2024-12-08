<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductReview extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'email',
        'product_reviews',
        'is_active'
    ];
}