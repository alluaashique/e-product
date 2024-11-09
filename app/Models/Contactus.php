<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class Contactus extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'contactus';
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'reply',
        'status',
        'is_active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
