<?php

namespace App\Services;

use App\Exceptions\ForbiddenException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class UserService
{

    static function create($form)
    {
        $usuarioEmail = User::where("email", $form["email"])->first();
        $usuarioCpf = User::where("cpf", $form["cpf"])->first();
        if ($usuarioEmail || $usuarioCpf) {
            throw new ConflictHttpException("Usuário já existente");
        }
        $usuario = User::create([
            'name' => $form['name'],
            'email' => $form['email'],
            'cpf' => $form['cpf'],
            'password' => $form['password'],
            'money' => 0,
            'userType' => 'USER'
        ]);
        return json_decode(json_encode($usuario));
    }

    static function depositar($moneyQuantity, $userId)
    {
        $usuario = User::find($userId);
        $usuario->update(['money' => $usuario->money + $moneyQuantity]);
        return "Deposito realizado com sucesso";
    }

    static function transferir($usuarioId, $destinatarioId, $moneyQuantity)
    {
        if ($usuarioId === $destinatarioId) throw new BadRequestException("Usuário destinatário não pode ser igual ao usuário origem");
        DB::beginTransaction();
        $usuario = User::find($usuarioId);
        if ($usuario->userType === 'WORKER') {
            throw new ForbiddenException("Usuário lojista não pode fazer transferências.");
        }
        if ($usuario->money < $moneyQuantity) {
            return "Não foi possível realizar o transferência, confira seu saldo";
        }
        $destinatario = User::find($destinatarioId);
        try {
            $usuario->update(['money' => $usuario->money - $moneyQuantity]);
            $destinatario->update(['money' => $destinatario->money + $moneyQuantity]);
            TransactionService::createLog(['userId' => $usuarioId, 'destinatarioId' => $destinatarioId, 'moneyQuantity' => $moneyQuantity]);
            DB::commit();
            return "Transferência realizada com sucesso";
        } catch (Exception $err) {
            DB::rollBack();
            return "Erro ao realizar a transferência";
        }
    }
}
