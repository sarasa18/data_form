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
        DB::table('users')->insert([
            [
                'name' => 'あああ',
                'email' => 'test@test.com',
                'password' => 'tttttttt'
            ], [
                'name' => 'いいい',
                'email' => 'test2@test.com',
                'password' => 'tttttttt'
            ], [
                'name' => 'ううう',
                'email' => 'test3@test.com',
                'password' => 'tttttttt'
            ], [
                'name' => 'えええ',
                'email' => 'test4@test.com',
                'password' => 'tttttttt'
            ],
        ]);
    }
}
