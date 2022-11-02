@extends('layouts.todoapp')

@section('title', 'TODOリスト | 更新')

@section('form')
    <form action="/todo/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="row">
            <div class="col-3">
                <label for="">期限日</label>
                <input type="date" class="form-control" name="expiration_date" value="{{ $item->expiration_date }}">
            </div>
            <div class="col-12">
                <label for="">TODO項目</label>
                <input type="text" class="form-control" name="todo_item" value="{{ $item->todo_item }}">
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" value="1" {{$item->is_completed == 1 ? 'checked' : ''}}>
                    <label class="form-check-label" for="is_completed">完了する</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_deleted" id="is_deleted" value="1">
                    <label class="form-check-label" for="is_deleted">削除する</label>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-start">
                <input type="submit" class="form-control btn btn-primary" value="更新">
                <input type="button" class="form-control btn btn-secondary" onclick="location.href='/todo';"
                    value="もどる">
            </div>
        </div>
    </form>
@endsection
