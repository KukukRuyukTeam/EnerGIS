<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SPKLURequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'lokasi' => ['string', 'nullable'],
            'gambar' => ['string', 'nullable'],

            'ports' => ['required', 'array', 'min:1'],
            'ports.*.id' => ['string'],
            'ports.*.tipe' => ['required', 'string'],
            'ports.*.jumlah' => ['required', 'integer'],
            'ports.*.daya' => ['integer', 'nullable']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "code" => 400,
            "errors" => $validator->getMessageBag(),
        ], 400));
    }
}
