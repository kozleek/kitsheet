<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KitRequest extends FormRequest
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
            'title'                           => 'string|max:255',
            'description'                     => 'string',
            'countSheets'                     => 'required|numeric|min:1|max:50',
            'countExamples'                   => 'required|numeric|min:1|max:50',
            'countNumbers'                    => 'required|numeric|min:2|max:5',
            'rangeMin'                        => 'required|numeric|min:-1000000|max:1000000',
            'rangeMax'                        => 'required|numeric|gte:rangeMin|min:-1000000|max:1000000',
            'rangeDecimals'                   => 'required|numeric|min:0|max:3',
            'operationAdd'                    => 'boolean',
            'operationSubtract'               => 'boolean',
            'operationMultiply'               => 'boolean',
            'operationDivide'                 => 'boolean',
            'settingsExamplesOnlyPositive'    => 'boolean',
            'settingsExamplesWithParentheses' => 'boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => $this->title == null ? '' : $this->title,
            'description' => $this->description == null ? '' : $this->description,
            'operationAdd' => $this->has('operationAdd'),
            'operationSubtract' => $this->has('operationSubtract'),
            'operationMultiply' => $this->has('operationMultiply'),
            'operationDivide' => $this->has('operationDivide'),
            'settingsExamplesOnlyPositive' => $this->has('settingsExamplesOnlyPositive'),
            'settingsExamplesWithParentheses' => $this->has('settingsExamplesWithParentheses'),
        ]);
    }
}
