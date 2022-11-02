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
    // public function test(Request $request)
    // {
    //     return view('todo.test');
    // }

    public function index(Request $request)
    {
        // DBから条件に合致するレコードを取得する
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

    public function create(TodoRequest $request)
    {
        $param = [
            'expiration_date' => $request->expiration_date,
            'todo_item' => $request->todo_item,
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
        ];

        DB::table('todo_items')->insert($param);

        return redirect('/todo');
    }

    public function edit(Request $request)
    {
        // DBから条件に合致するレコード取得する
        $item = DB::table('todo_items')
            ->where('id', $request->id)
            ->first(); // 1件だけ取得

        $data = [
            'item' => $item,
        ];

        return view('/todo.edit', $data);
    }

    public function update(TodoRequest $request)
    {
        // アップデートに必要なパラメータをまとめる
        $param = [
            'expiration_date' => $request->expiration_date,
            'todo_item' => $request->todo_item,
            'is_completed' => isset($request->is_completed) ? 1 : 0,
            'is_deleted' => isset($request->is_deleted) ? 1 : 0,
            'updated_at' => date('Y/m/d H:i:s'),
        ];

        // アップデート処理
        DB::table('todo_items')->where('id', $request->id)->update($param);

        return redirect('/todo');
    }
}
