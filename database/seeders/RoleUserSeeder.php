<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(int $userId = 1)
    {
        DB::table('role_user')->insert([
            'user_id' => $userId,
            'role_id' => 1
        ]);
    }
}
