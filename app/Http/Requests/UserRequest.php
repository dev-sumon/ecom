<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'status'=>'boolean|nullable',
            'role' => 'required|in:user,admin',
            'billing_address' => 'nullable',
            'shipping_address' => 'nullable',
        ]+
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store(){
        return [
            'image'=>'required|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
            'cover_image'=>'required|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }
    protected function update(){
        return [
            'image'=>'nullable|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
            'cover_image'=>'nullable|image|mimes:jpeg,png,gif,jpg,webp|max:2048',
            'email' => 'required|email|unique:users,email,'.$this->route('id'),
            'password' => 'nullable',
        ];
    }
}
