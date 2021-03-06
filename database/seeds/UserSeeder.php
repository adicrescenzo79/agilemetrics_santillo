<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = config('users');

      foreach ($users as $user) {
        $newUser = new User();

        $user["password"] = Hash::make($user["password"]);
        $user["api_token"] = Str::random(60);
        $newUser->fill($user)->save();
      }
    }
}
