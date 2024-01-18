<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'url' => ['required', 'string', 'regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/']
        ];
    }

    public function messages(): array
    {
        return [
            'url.required' => 'The url is required',
            'url.string' => 'The url must be a string',
            'url.regex' => 'The url provided must be a valid url'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // You can customize the response format here
        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
