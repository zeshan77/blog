<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreatePostRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|min:10|max:255',
            'title' => 'required|min:10|max:255',
            'summary' => 'required|min:20|max:255',
            'content' => 'required|min:50|max:5000',
            'has_published' => 'nullable|date',
            'expired_at' => 'nullable|date',
            'scheduled_at' => 'nullable|date',
        ];
    }
}
