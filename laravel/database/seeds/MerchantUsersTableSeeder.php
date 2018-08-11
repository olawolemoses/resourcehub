<?php

use Illuminate\Database\Seeder;

class MerchantUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->states('merchant')->create()->each(function ($u) {
            $u->merchant()
                ->save(factory(App\Models\Merchant::class)
                ->create(['user_id' => $u->id, 
                          'email_address' => $u->username]
                        ));
        });
    }
}
