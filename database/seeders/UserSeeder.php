<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = DB::table('users')->insertGetId([
            'username' => 'admin',
            'email'    => 'admin@admin',
            'password' => Hash::make('admin')
        ]);

        $this->callWith(RoleUserSeeder::class, ['userId' => $userId]);
    }
}
