<?php

namespace App\Http\Requests;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Formatos válidos para anexo com seus respectivos MIME Types
     */
    private $mimes = [
        'pdf' => 'application/pdf',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'txt' => 'text/plain',
    ];

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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string', new PhoneRule],
            'message' => ['required', 'string'],
            'file' => ['required', 'file', 'max:500', 'mimes:' . $this->getMimes(), 'mimetypes:' . $this->getMimesTypes()],
        ];
    }

    /**
     * Retorna lista de MIME Types mais simples, apenas com a extensão do arquivo
     */
    private function getMimes()
    {
        $mimesKeys = array_keys($this->mimes);
        return implode(',', $mimesKeys);
    }

    /**
     * Retorna lista de MIME Types mais avançada, de acordo com o tipo do arquivo
     */
    private function getMimesTypes()
    {
        $mimesValues = array_values($this->mimes);
        return implode(',', $mimesValues);
    }
}
