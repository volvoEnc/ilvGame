<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends ApiRequest
{
    public function rules()
    {
        return [
            "nickname" => ['required', 'unique:users', 'min:3', 'max:15', 'string'],
            "email" => ['required', 'email', 'unique:users'],
            "password" => ['required', 'min:4', 'string'],
            "invite_user_id" => ["exists:users,id"]
        ];
    }
}
