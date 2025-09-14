<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'Elektronik','description'=>'Perangkat elektronik','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Alat Tulis','description'=>'ATK','created_at'=>now(),'updated_at'=>now()],
        ]);

        DB::table('suppliers')->insert([
            ['name'=>'PT. Sumber','phone'=>'081234567','address'=>'Jakarta','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
