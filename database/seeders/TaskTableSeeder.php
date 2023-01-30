<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'title' => '掃除',
            'memo' => '玄関の掃除をする。',
            'status' => 0,
        ];
        DB::table('tasks')->insert($param);

        $param = [
            'user_id' => 1,
            'title' => '片付け',
            'memo' => '着ていない服をまとめる。',
            'status' => 0,
        ];
        DB::table('tasks')->insert($param);

        $param = [
            'user_id' => 2,
            'title' => '買い物',
            'memo' => '今週の食材の買い出しに行く。',
            'status' => 0,
        ];
        DB::table('tasks')->insert($param);

        $param = [
            'user_id' => 2,
            'title' => '旅行の準備',
            'memo' => '旅行に必要なものリストを作成する。',
            'status' => 1,
        ];
        DB::table('tasks')->insert($param);
    }
}
