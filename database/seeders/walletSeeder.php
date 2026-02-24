<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;
use App\Models\User;

class walletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Wallet::create([
                'user_id' => $user->id,
                'name' => 'Cash Wallet',
                'balance' => 10000.
            ]);

            Wallet::create([
                'user_id' => $user->id,
                'name' => 'Bank Wallet',
                'balance' => 50000
            ]);
        }
    }
}
