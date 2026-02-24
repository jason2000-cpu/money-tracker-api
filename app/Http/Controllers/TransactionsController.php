<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    //
    public function createTransaction(Request $request){
        $validated = $request->validate([
            'wallet_id' => 'required|exists:wallets,id',
            'amount' => 'required|numeric|min:1',
            'type' => 'required|in:income,expense',
            'description' => 'nullable|string'
        ]);

        return DB::transaction(function () use ($validated) {

            $wallet = Wallet::findOrFail($validated['wallet_id']);

            if ($validated['type'] === 'expense') {

                if ($wallet->balance < $validated['amount']) {
                    return response()->json([
                        'message' => 'Insufficient wallet balance'
                    ], 400);
                }

                $wallet->balance -= $validated['amount'];

            } else {

                $wallet->balance += $validated['amount'];

            }

            $wallet->save();

            $transaction = Transaction::create([
                'wallet_id' => $wallet->id,
                'amount'=> $validated['amount'],
                'type'=> $validated['type'],
                'description'=> $validated['description'],
            ]);

            return response()->json([
                'message' => 'Transaction successful',
                'transaction'=> $transaction,
                'balance' => $wallet->balance
            ]);
        });
    }
}
