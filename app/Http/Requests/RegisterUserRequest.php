<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess' => 'false',
            'status code' => 422,
            'error' => true,
            'errorList' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'name.required' => 'vous devez fournir un nom',
            'email.required' => 'email est requis',
            'email.unique' => 'cette email existe deja',
            'email.email' => 'vous devez founir une adresse email',
            'password.required' => 'vous devez founir un mot de passe',
            'password.min' => 'le mot de passe doit avoir au moins 8 caracteres'
        ];
    }
}
