<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ShieldSeeder::class);
        DB::transaction(function () {
            $admin = User::query()->create([
                'name' => 'Superadmin',
                'email' => 'superadmin@example.com',
                'password' => bcrypt('password'), // Change this to a secure password
                'sector_id' => null,
            ]);
            $admin->assignRole('super_admin');
        });
    }
}
