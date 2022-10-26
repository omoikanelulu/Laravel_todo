<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\VIEW;
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
            ->get(); // 引数を省略した場合はすべてのカラムを取得

        $data = [
            'today' => date('Y-m-d'),
            'items' => $items,
        ];

        return view('todo.index', $data);
    }

    public function post(TodoRequest $request)
    {
        return view('todo.index');
    }


    public function edit(Request $request)
    {
        $items = DB::table('todo_items')
            ->where('id', $request->id)
            ->get();

        $data = [
            'items' => $items,
        ];

        return view('todo.edit', $data);
    }
}
