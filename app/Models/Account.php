<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function transaction()
    {

        return $this->hasMany(Transaction::class);
    }
}
