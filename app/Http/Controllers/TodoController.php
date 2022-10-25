<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        // DBから条件に合致するレコード取得する
        $items = DB::table('todo_items')
            ->where('is_deleted', 0)
            ->orderBy('expiration_date')
            ->orderBy('id')
            ->get(); // 省略した場合はすべてのカラムを取得

        $data = [
            'today' => date('Y-m-d'),
            'items' => $items,
        ];

        return view('todo.index', $data);
    }

    public function update(Request $request){
        // $data =

        return view('todo.update');
    }
}
