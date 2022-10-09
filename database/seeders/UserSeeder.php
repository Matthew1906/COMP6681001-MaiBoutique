<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "username"=>"Admin",
                "email"=>"admin@maiboutique.com",
                "password"=>bcrypt("admin"),
                "phone"=>"082392199234",
                "address"=>"Admin room",
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ],
            [
                "username"=>"Matthew",
                "email"=>"matthew@maiboutique.com",
                "password"=>bcrypt("matthew"),
                "phone"=>"081262177289",
                "address"=>"Matthew's House",
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ],
            [
                "username"=>"Bennett",
                "email"=>"bennett@maiboutique.com",
                "password"=>bcrypt("bennett"),
                "phone"=>"089317164332",
                "address"=>"Bennett's House",
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
