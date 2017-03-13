<?php

use Illuminate\Database\Seeder;
use App\Models\Operating;

class OpreatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $op = new Operating();
        $op->user_id = 1;
        $op->question_id = 1;
        $op->voteup = true;
        $op->votedown = false;
        $op->save();
        $op = new Operating();
        $op->user_id = 1;
        $op->question_id = 2;
        $op->voteup = true;
        $op->votedown = true;
        $op->save();
        $op = new Operating();
        $op->user_id = 1;
        $op->question_id = 3;
        $op->voteup = false;
        $op->votedown = true;
        $op->save();
    }
}
