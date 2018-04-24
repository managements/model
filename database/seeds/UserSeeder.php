<?php

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
        for ($i = 1; $i < 10; $i++){
            DB::table('users')->insert([
                'name'=> ($i === 1) ? 'yasser' : "yasser$i",
                'email'=> ($i === 1) ? 'yasslakh@gmail.com' : "$i@$i.$i",
                'password' =>  bcrypt('123456mM'),
                'recover_id' => $i,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
