<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['domain'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
