<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('validation.required'), [
                'attribute' => trans('user.name'),
            ],
            'name.string' => trans('validation.string'), [
                'attribute' => trans('user.name'),
            ],
            'name.max' => trans('validation.max'), [
                'attribute' => trans('user.name'),
            ],
            'email.required' => trans('validation.required'), [
                'attribute' => trans('user.email'),
            ],
            'email.string' => trans('validation.string'), [
                'attribute' => trans('user.email'),
            ],
            'email.email' => trans('validation.email'), [
                'attribute' => trans('user.email'),
            ],
            'email.max' => trans('validation.max'), [
                'attribute' => trans('user.email'),
            ],
            'email.unique' => trans('validation.unique'), [
                'attribute' => trans('user.email'),
            ],
            'password.required' => trans('validation.required'), [
                'attribute' => trans('user.password'),
            ],
            'password.string' => trans('validation.string'), [
                'attribute' => trans('user.password'),
            ],
            'password.min' => trans('validation.min'), [
                'attribute' => trans('user.password'),
            ],
            'password.confirmed' => trans('validation.confirmed'), [
                'attribute' => trans('user.password'),
            ],
        ];
    }
}
