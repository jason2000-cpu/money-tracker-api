<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = [
        'type',
        'wallet_id',
        'amount',
        'description'
    ];
    public function wallet() {
        return $this->belongsTo(Wallet::class);
    }
}
