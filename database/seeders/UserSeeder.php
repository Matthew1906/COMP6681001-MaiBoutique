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
                "role_id"=>1,
                "email"=>"admin@maiboutique.com",
                "password"=>bcrypt("admin"),
                "phone"=>"082392199234",
                "address"=>"Admin room",
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ],
            [
                "username"=>"Matthew",
                "role_id"=>2,
                "email"=>"matthew@maiboutique.com",
                "password"=>bcrypt("matthew"),
                "phone"=>"081262177289",
                "address"=>"Matthew's House",
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ],
            [
                "username"=>"Bennett",
                "role_id"=>2,
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
