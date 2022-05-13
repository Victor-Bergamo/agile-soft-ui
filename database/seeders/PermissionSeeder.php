<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ###############################
         * ####     ALL PERMISSION    ####
         * ###############################
         */
        DB::table('permissions')->insert([
            'name' => 'All permissions',
            'slug' => '*',
            'http_method' => 'GET,POST,PUT,DELETE',
            'http_path' => '*',
        ]);
    }
}
