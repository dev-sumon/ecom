<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
        ]+
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(){
        return [
            'name' => 'required|unique:categories,name',
            'image'=>'required|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
        ];
    }
    protected function update(){
        return [
            'name' => 'required|unique:categories,name,'.$this->route('id'),
            'image'=>'nullable|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
        ];
    }
}
