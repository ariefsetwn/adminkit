<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:50', 'unique:users,name,' . $this->id],
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Username harus diisi',
            'name.unique' => 'Username sudah ada',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password tidak boleh kosong',
            'password.min:8' => 'Password Kurang dari 8 karakter',
        ];
        return $messages;
    }
}
