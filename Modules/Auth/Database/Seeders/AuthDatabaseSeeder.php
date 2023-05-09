<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::whereUsername('admin')->firstOrCreate([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}
