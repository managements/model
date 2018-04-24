<?php

namespace App\Http\Requests\Society;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'          => 'required|min:3|max:25|string|unique:societies,name,' . $this->society->id,
            'domaine'       => 'required|min:3|max:25|string',
            'licence'       => 'required|min:3|max:25|string',
            'address'       => 'required|min:10|max:50|string',
            'floor'         => 'required|max:35|string',
            'build'         => 'required|max:5|string',
            'aprt_nbr'      => 'required|max:5|string',
            'zip'           => 'required|min:3|max:25|string',
            'city'          => 'required|min:3|max:15|string',
            'email'         => 'required|string|email',
            'tel'           => 'required|string|min:10|max:10|unique:societies,tel,'  . $this->society->id,
            'speaker'       => 'required|min:3|max:25|string',
            'range'         => 'required|string',
            'turnover'      => 'required|min:3|max:25|string',
            'logo_beta'     => 'nullable|mimes:jpeg,bmp,png,jpg|unique:societies,logo',
            'cover_beta'    => 'nullable|mimes:jpeg,bmp,png,jpg|unique:societies,cover'
        ];
    }
}
