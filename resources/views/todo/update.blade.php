@extends('layouts.todoapp')

@section('title', 'TODOリスト | 更新')

@section('form')
    <form>
        @csrf
        <div class="row">
            <div class="col-3">
                <input type="date" class="form-control" value="{{ $today }}">
            </div>
            <div class="col-12">
                <input type="text" class="form-control" placeholder="Last name">
            </div>

            <input type="checkbox" name="completed" id="completed">
            <label for="completed">完了する</label>
            <input type="checkbox" name="is_deleted" id="is_deleted">
            <label for="is_deleted">削除する</label>

            <div class="col-2">
                <input type="submit" class="form-control btn btn-primary" value="更新">
                <input type="button" class="form-control btn btn-secondary" value="もどる">
            </div>
        </div>
    </form>
@endsection
