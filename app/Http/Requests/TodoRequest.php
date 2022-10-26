<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'todo') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'expiration_date' => 'required',
            'expiration_date' => 'date',
            'todo_item' => 'required',
            'todo_item' => 'max:50',
        ];
    }

    public function messages()
    {
        return [
            'expiration_date.required' => '期限日を入力してください',
            'expiration_date.date' => '期限日の形式が正しくありません',
            'todo_item.required' => 'TODO項目を入力してください',
            'todo_item.max:50' => 'TODO項目は50文字以内で入力してください',
        ];
    }
}
