<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i < 100; $i++){
            $param = [
                'EmployeeCode' => 11451400 + $i,
                'name' => '田所浩二' . $i,
                'isDeleted' => false,
            ];
            DB::table('employees')->insert($param);
        }
    }
}
