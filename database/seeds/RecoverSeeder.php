<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10;$i++)
        DB::table('recovers')->insert([
            'email' => 1,
            'token' => 0,
            'response' => "00:00",
            'question_secrete_id' => 1,
            'user_id' => $i,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
