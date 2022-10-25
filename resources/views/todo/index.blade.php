@extends('layouts.todoapp')

@section('title', 'TODOリスト')

@section('form')
    <form>
        @csrf
        <div class="row">
            <div class="col-3">
                <input type="date" class="form-control" value="{{ $today }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
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
            <tr>
                <td>{{ $item->expiration_date }}</td>
                <td>{{ $item->todo_item }}</td>
                <form action="/update" method="GET">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <td><input type="submit" value="更新" class="btn btn-outline-primary btn-sm"></td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection
