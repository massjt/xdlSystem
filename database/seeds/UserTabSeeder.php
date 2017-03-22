<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'massjt@qq.com';
        $user->name = 'massjt';
        $user->password = bcrypt('massjt');
        $user->class = 'S60';
        $user->introduction = 'you are you are look like oh oh oh';
        $user->save();
    }
}
