<?php

use Illuminate\Database\Seeder;
use App\Models\QuestionsTechtag;

class QuestionsTechtagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 1;
        $qtt->techtag_id = 1;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 1;
        $qtt->techtag_id = 2;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 1;
        $qtt->techtag_id = 3;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 2;
        $qtt->techtag_id = 4;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 2;
        $qtt->techtag_id = 5;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 2;
        $qtt->techtag_id = 6;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 2;
        $qtt->techtag_id = 7;
        $qtt->save();
        */
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 3;
        $qtt->techtag_id = 5;
        $qtt->save();
        $qtt = new QuestionsTechtag();
        $qtt->question_id = 3;
        $qtt->techtag_id = 6;
        $qtt->save();
    }
}
