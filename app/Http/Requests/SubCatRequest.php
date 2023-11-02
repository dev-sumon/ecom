<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCatRequest extends FormRequest
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
            'cat_id'=>'required',
            'status'=>'nullable|boolean',
        ]+
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(){
        return [
            'name' => 'required|unique:sub_categories,name',
        ];
    }
    protected function update(){
        return [
            'name' => 'required|unique:sub_categories,name,'.$this->route('id'),
        ];
    }
}
