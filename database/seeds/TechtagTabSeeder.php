<?php

use Illuminate\Database\Seeder;
use App\Models\Techtag;

class TechtagTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $techtag = new Techtag();
        $techtag->name = 'php';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'JavaScript';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'html5';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'laravel';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'node';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'vue';
        $techtag->save();
        $techtag = new Techtag();
        $techtag->name = 'express';
        $techtag->save();
    }
}
