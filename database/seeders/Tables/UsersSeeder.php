<?php
namespace Database\Seeders\Tables;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Command :
         * artisan seed:generate --mode=table --all-tables
         *
         */

        $dataTables = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$eAUyA.xLTUNj23.cqtkUnurZmxK5vmAKp3fE.FHzIiz27mT2BNiVG',
                'remember_token' => NULL,
                'created_at' => '2024-12-04 12:05:12',
                'updated_at' => '2024-12-04 12:05:12',
            ]
        ];
        
        DB::table("users")->insert($dataTables);
    }
}