<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'username' => 'JohnDoe',
        ]);

        Account::create([
            'username' => 'JaneSmith',
        ]);
    }
}
