<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'name'       => 'required|string|max:255',
            'mail'       => 'nullable|email',
            'message'    => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xsl,xlsx,txt,jpg,jpeg,png|max:10240',
            'techinfo'   => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'mail' => $this->mail == null ? '' : $this->mail,
            'techinfo' => $this->techinfo == null ? '' : $this->techinfo,
        ]);
    }
}