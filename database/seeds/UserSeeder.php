<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for ($i = 0; $i < 25; $i++) {
//
//        }
        $users = factory(\App\User::class, 25)->create();
        $users->each(function ($user) use ($users){
            $user->invite_user_id = $users->random()['id'];
            $user->save();
        });
    }
}
