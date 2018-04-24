<?php

namespace App\Http\Requests\Profil;

use App\Rules\EmailChangeRule;
use App\Rules\NameChangeRule;
use App\Rules\PasswordChangeRule;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'          => ['nullable','string','max:255',new NameChangeRule()],
            'email'         => ['nullable','string','email','max:255',new EmailChangeRule()],
            'old_password'  => ['nullable','required_with:password','min:6', new PasswordChangeRule()],
            'password'      => ['nullable','required_with:old_password','min:6',new PasswordRule(),'confirmed'],
            'question'      => ['required','exists:secret_questions,id'],
            'response'      => 'required|min:4',
        ];
    }
}
