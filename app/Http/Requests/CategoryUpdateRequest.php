<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestValidator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CategoryUpdateRequest extends FormRequest
{
    use RequestValidator;
    /**
     * Determine if the user is authorized to make this request.stairway to heaven
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
            "name" => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Name',
        ];
       
    }

    public function failedValidation(Validator $validator)
    {
    // if ($this->expectsJson()) {
    //     throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    // }

    $errors = $validator->errors();
    // Adding email verification
    
    
    // Ends email verfication
    throw new HttpResponseException(
        redirect()->back()
            ->withErrors($errors)
            ->withInput()
            ->with('message', 'Please enter required fields!')
    );
  }
    
}
