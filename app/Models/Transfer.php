<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfer()
    {
        return $this->hasMany(Transaction::class, 'sender');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function senderAccount()
    {
        return $this->belongsTo(Account::class, 'sender_account_id');

    }

    public function recipient(){
        return $this->belongsTo(User::class, 'recipient_id');
    }
    public function recipientAccount()
    {
        return $this->belongsTo(Account::class, 'recipient_account_id');
        }
}