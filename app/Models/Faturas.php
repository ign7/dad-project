<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faturas extends Model
{
    protected $fillable = ['valor', 'user_id','data', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
