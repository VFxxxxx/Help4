<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Review::class, 10)->create();
        factory(App\NeedCategory::class, 10)->create();
        factory(App\Need::class, 10)->create();
        factory(App\Message::class, 10)->create();
        factory(App\Comment::class, 10)->create();
    }
}
