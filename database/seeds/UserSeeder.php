<?php

use Illuminate\Database\Seeder;
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
        factory(User::class, 1)->create([
            'name'=>'Player',
            'email'=>'player@quizit.com',
            'design_id'=>1,
            'password' => bcrypt('PlayerPasswordQuizit')])
            ->each(function (User $user) {
                $user->assignRole('player');
            });
        factory(User::class, 1)->create([
            'name'=>'Admin',
            'email'=>'admin@quizit.com',
            'design_id'=>1,
            'password'=>bcrypt('AdminPasswordQuizit')])
            ->each(function (User $user) {
                $user->assignRole('admin');
            });

//        factory(User::class, 50)->create();

    }
}
