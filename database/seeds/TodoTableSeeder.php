<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'expiration_date' => '2022-12-20',
            'todo_item' => 'ダミーデータ',
        ];
        DB::table('todo_items')->insert($param);

        $param = [
            'expiration_date' => '2023-01-01',
            'todo_item' => 'ダミーデータ',
        ];
        DB::table('todo_items')->insert($param);
    }
}
