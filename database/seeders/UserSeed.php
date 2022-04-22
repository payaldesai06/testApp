<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1,'middle_name' => 'User','user_name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$LyIImkT4Ey/YxzE4fdgfO.pgDxmKSh1dwvEqUnNXamcZ8yUwLe56W','role_id' => 1]
        ];

        foreach ($items as $item) {
            \App\Models\User::create($item);
        }
    }
}
