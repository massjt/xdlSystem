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
        // $this->call(OpreatingSeeder::class);
        // $this->call(QuestionTabSeeder::class);
        // $this->call(TechtagTabSeeder::class);
        $this->call(UserTabSeeder::class);
    }
}
