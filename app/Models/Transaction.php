<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'userId',
        'destinatarioId',
        'moneyQuantity',
    ];
}
