<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

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

    public function createAccount(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', Password::defaults()],
        ]);

        $user = User::create([
            'first_name'=> $validated['first_name'],
            'last_name'=> $validated['last_name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        return response()->json([
            'message'=> 'User Created Successfully',
            'user' => [
                'id' => $user->id,
                'first_name'=> $user->first_name,
                'last_name'=> $user->last_name,
                'email' => $user->email,
            ]
        ], 201);
    }
}



