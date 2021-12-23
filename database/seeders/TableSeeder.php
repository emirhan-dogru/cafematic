<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
                'table_name' => 'Masa 1',
                'table_slug' => 'masa-1',
                'table_status' => '1',
                'table_must' => '1'
            ],
            [
                'table_name' => 'Masa 2',
                'table_slug' => 'masa-2',
                'table_status' => '1',
                'table_must' => '2'
            ],
            [
                'table_name' => 'Masa 3',
                'table_slug' => 'masa-3',
                'table_status' => '1',
                'table_must' => '3'
            ]
        ]);
    }
}
