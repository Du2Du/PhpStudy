<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form\DepositoRequest;
use App\Http\Requests\Form\RegisterUserRequest;
use App\Http\Requests\Form\TransferirRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\Form\RegisterUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {
        $form = $request->all();
        return UserService::create($form);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deposito(DepositoRequest $depositoRequest)
    {
        $form = $depositoRequest->all();
        $moneyQuantity = $form['moneyQuantity'];
        $userId = $form['userId'];
        // $userId = Auth::id();
        return UserService::depositar($moneyQuantity, $userId);
    }

    public function transferir(TransferirRequest $transferirRequest)
    {
        $form = $transferirRequest->all();
        $moneyQuantity = $form['moneyQuantity'];
        $userId = $form['userId'];
        $destinatarioId = $form['destinatarioId'];
        // $userId = Auth::id();
        return UserService::transferir($userId, $destinatarioId, $moneyQuantity);
    }
}
