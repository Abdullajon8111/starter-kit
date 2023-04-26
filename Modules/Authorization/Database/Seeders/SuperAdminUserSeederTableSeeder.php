<?php

namespace Modules\Authorization\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SuperAdminUserSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        User::firstOrCreate([
            'username' => 'admin',
        ], [
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}
