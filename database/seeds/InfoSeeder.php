<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'first_name'=>'yasser',
            'last_name'=>'lakhsadi',
            'sex'=>'homme',
            'address'=>'address',
            'house_nbr'=>'303',
            'city'=>'casa',
            'tel'=>'0657834561',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        for ($i = 2; $i < 10; $i++){
            DB::table('infos')->insert([
                'first_name'=>"yasser$i",
                'last_name'=>"lakhsadi$i",
                'sex'=>'homme',
                'address'=>"address$i",
                'house_nbr'=>"$i",
                'city'=>'casa',
                'tel'=>"065783456$i",
                'user_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
