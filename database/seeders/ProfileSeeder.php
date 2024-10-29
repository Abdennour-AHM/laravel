<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Profile::factory(50)->create();

        /*  DB::table('profiles')->insert([
            'name'=>Str::random(50),
            'email'=>Str::random(15)."@gmail.com",
            'password'=>Hash::make("p@ssword"),
            'bio'=>Str::random(255),
        ]);  */
    }
}
