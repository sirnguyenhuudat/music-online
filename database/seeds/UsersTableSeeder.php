<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nguyen Huu Dat',
            'email' => 'sr.nguyenhuudat@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'avatar' => null,
        ]);
        factory(User::class, 150)->create();
    }
}
