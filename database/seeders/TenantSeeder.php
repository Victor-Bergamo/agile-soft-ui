<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            'name' => 'pittol',
        ]);

        DB::table('tenants')->insert([
            'name' => 'ctbdia',
        ]);

        DB::table('tenants')->insert([
            'name' => 'ganbytte',
        ]);
    }
}
