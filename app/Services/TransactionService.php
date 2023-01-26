<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService
{
    static function createLog($form)
    {
        Transaction::create(['userId' => $form['userId'], 'destinatarioId' => $form['destinatarioId'], 'moneyQuantity' => $form['moneyQuantity']]);
    }
}
