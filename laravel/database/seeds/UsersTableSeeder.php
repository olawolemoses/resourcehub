<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\User::class, 50)->states('customer')->create()->each(function ($u) {
            $u->customer()->save(factory(App\Models\Customer::class)->create(['user_id'=>$u->id, 'email_address'=>$u->username ]));
        });
    }
}
