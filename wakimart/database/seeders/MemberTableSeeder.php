<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
        	'name' => 'Wakimart Marketing Pusat',
        	'email' => 'wakimart_pusat@wakimart.com',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
