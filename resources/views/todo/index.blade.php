@extends('layouts.todoapp')

@section('title', 'TODOリスト')

@section('style')
    <style>
        /* 完了したTODOのスタイル */
        .complete {
            text-decoration: double line-through;
        }
    </style>
@endsection

@section('form')
    <form action="/todo" method="POST">
        @csrf
        <div class="row">
            <div class="col-3">
                <input type="date" class="form-control" name="expiration_date"
                    value="{{ $errors->has('expiration_date') ? old('expiration_date') : $today }}">
                @error('expiration_date')
                    {{ $message }}
                @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control" name="todo_item" value="{{ old('todo_item') }}"
                    placeholder="TODOを入力">
                @error('todo_item')
                    {{ $message }}
                @enderror
            </div>
            <div class="col-1">
                <input type="submit" class="form-control btn btn-primary" value="登録">
            </div>
        </div>
    </form>
@endsection

@section('list')
    <table class="table">
        <tr>
            <th>期限日</th>
            <th>TODO項目</th>
            <th></th>
        </tr>
        @foreach ($items as $item)
            <tr
                class="
            @if ($item->is_completed == 1) {{ 'complete' }}
            @elseif ($item->expiration_date < $today)
                {{ 'text-danger' }} @endif
            ">
                <td>{{ $item->expiration_date }}</td>
                <td>{{ $item->todo_item }}</td>
                <form action="/todo/edit" method="GET">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <td><input type="submit" value="更新" class="btn btn-outline-primary btn-sm"></td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection
