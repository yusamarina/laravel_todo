<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Myrule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'task')
        {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タスク名は必ず入力してください。',
            'title.max' => 'タスク名は50文字以内で入力してください。',
        ];
    }
}
