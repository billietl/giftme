<?php

namespace App\Http\Requests;

use App\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $userCount = User::where([
                ['name', '=', $validator->attributes()['name']]
            ])->count();
            if ($userCount != 0) {
                $validator->errors()->add('existingName', 'This name is already used.');
            }
        });
    }
}
