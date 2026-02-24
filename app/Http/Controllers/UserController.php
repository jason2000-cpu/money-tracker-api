<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function userProfile(string $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $totalBalance = $user->wallets()->sum('balance');

        $response = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'wallets' => $user->wallets->map(function ($wallet) {
                return  [
                    'id' => $wallet->id,
                    'name' => $wallet->name,
                    'balance' => $wallet->balance,
                ];
            }),
            'total_balance' => $totalBalance
        ];

        return response()->json($response);
    }
}



