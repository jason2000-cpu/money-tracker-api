<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Wallet;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $wallets = Wallet::all();

        foreach ($wallets as $wallets) {
            for ($i = 0; $i < 5; $i++) {
                Transaction::create([
                    'wallet_id' => $wallets->id,
                    'type' => ['income', 'expense'][rand(0,1)],
                    'amount' => random_int(100,50000),
                    'description' => 'Sample transaction #' . ($i+1)
                ]);
            }
        }
    }
}
