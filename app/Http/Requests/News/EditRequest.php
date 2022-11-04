<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3','max:100'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['required', 'string', 'min:3','max:500'],
            'author' => ['required', 'string', 'min:2','max:30'],
            'image' => ['nullable', 'image', 'mimes:jpg,png'],
            'released_at' => ['required', 'date']
        ];
    }
    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'category_id' => 'Категория',
            'released_at' => 'Дата релиза'
        ];

    }

    public function messages()
    {
        return [
            'min' => 'Значение в поле :attribute должно быть не меньше чем :min символа'
        ];
    }
}
