<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'name' => 'Página usuário',
            'slug' => 'page.user',
            'controller' => 'App\Http\Livewire\User',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
