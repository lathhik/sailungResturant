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
        DB::table('employees')->insert([
            'first_name' => 'john',
            'last_name'=>'snow',
            'email'=>'john@gmail.com',
            'address'=>'kathmandu',
            'contact'=>98563256,
            'nationality'=> 'Nepali',
            'salary'=>20000,
            'image'=>'john.png',
            'role_id'=>1
        ]);
    }
}

