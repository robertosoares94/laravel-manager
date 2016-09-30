<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
class UsuariosRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $id = $this->route('id');
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'nome' => ['required', 'max:128', 'string'],
                    'email' => ['required', 'max:128', 'email', 'unique:usuarios,email'],
                    'password' => ['required', 'max:60','min:3', 'string','confirmed'],
                    'password_confirmation' => ['required','min:3'],
                    'remeber_token' => ['string'],
                    'foto' => 'mimes:jpeg,bmp,png,jpg,gif|max:600',
                    'roles' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'nome' => 'required|max:128|string',
                    'email' => ['required', 'max:128', 'email','unique:usuarios,id,' . $id . '|max:255'],
                    'password' => ['max:60','min:3', 'string','confirmed'],
                    'password_confirmation' => ['min:3'],
                    'remeber_token' => ['string'],
                    'foto' => 'mimes:jpeg,bmp,png,jpg,gif|max:600',
                    'roles' => 'required'
                ];
            }
            default:break;
        }
    }
    public function messages()
    {
        return [
            'password.required' => 'O campo senha é obrigatório.'
        ];
    }
}
