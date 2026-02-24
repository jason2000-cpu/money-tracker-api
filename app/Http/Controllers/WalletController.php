<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function createWallet(Request $request) {
        $validated = $request->validate([
            "user_id"=> "required|integer|exists:users,id",
            "name"=> "required|string",
            "balance" => "required|integer",
        ]);



        $wallet = Wallet::create([
            "user_id"=> $validated["user_id"],
            "name"=> $validated["name"],
            "balance"=> $validated["balance"],
        ]);


        return response()->json([
            "message"=> "Wallet Created Successfully",
            "wallet"=> [
                "id"=> $wallet->id,
                "name"=> $wallet->name,
                "user_Id" => $wallet->user_id,
                "balance"=> $wallet->balance
            ]
        ]);
    }

    public function viewWallet(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'wallet_id' => 'required|integer|exists:wallets,id'
        ]);

        $wallet = Wallet::with('transactions')
                ->where('user_id', $validated['user_id'])
                ->where('id', $validated['wallet_id'])
                ->first();


        if (!$wallet) {
            return response()->json([
                'message'=> 'Wallet not found for this user'
            ], 404);
        }

        $response = [
            'id' => $wallet->id,
            'name'=> $wallet->name,
            'balance'=> $wallet->balance,
            'transactions' => $wallet->transactions->map(function ($transaction) {
                return [
                    'id'=> $transaction->id,
                    'description'=> $transaction->description,
                    'amount'=> $transaction->amount,
                    'created_at'=> $transaction->created_at,
                ];
            })
        ];


        return response()->json($response);
    }
}
