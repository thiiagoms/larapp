<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'seriesName' => 'required|min:3',
            'seriesDescription' => 'required|min:10'
        ];
    }

    /**
     * Message rules
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'You must fill the field :attribute',
            'seriesName.min' => 'Series name must be have more 3 characters'
        ];
    }
}
