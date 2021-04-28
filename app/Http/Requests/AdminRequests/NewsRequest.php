<?php

namespace App\Http\Requests\AdminRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $post = $this->route('post');

        return [
            'category_id' => 'required|integer|exists:categories,id',
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('posts')->ignore($post->id ?? null)],
            'post' => 'required|string|min:30|max:20000',
            'news_pic' => 'nullable|file',
        ];

    }
}
