<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RecoverSeeder::class);
        $this->call(SecretQuestionSeeder::class);
        $this->call(InfoSeeder::class);
    }
}
