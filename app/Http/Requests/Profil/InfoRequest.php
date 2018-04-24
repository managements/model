<?php

namespace App\Http\Requests\Profil;

use App\Rules\DtnRule;
use App\Rules\SexRule;
use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'first_name'    => 'nullable|string|min:2|max:10',
            'last_name'     => 'nullable|string|min:2|max:20',
            'dtn'           => ['nullable',new DtnRule()],
            'sex'           => ['nullable','string','min:5','max:5', new SexRule()],
            'address'       => 'nullable|string|min:10|max:30',
            'house_nbr'     => 'nullable|string|min:1|max:6',
            'city'          => 'nullable|string|min:3|max:20',
            'tel'           => ['nullable','string','min:10','max:10',new TelRule()],
        ];
    }
}
