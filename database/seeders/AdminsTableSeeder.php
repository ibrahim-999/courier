<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id'=>1,
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>'$2y$10$V8xk6xVWdjskfGUCOOGgvuHJBwEJZ136/JFQOIdvSyHQR.Xr6B1sy',
                'image'=>'',
            ],

        ];
        DB::table('admins')->insert($adminRecords);
    }

}
