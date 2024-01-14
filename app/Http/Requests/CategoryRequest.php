<?php

namespace App\Http\Requests;

use App\Traits\RequestValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CategoryRequest extends FormRequest
{

    use RequestValidator;
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
            "name" => "required|unique:categories,name",
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
        redirect()->intended(route('category.create'))
            ->withErrors($errors)
            ->withInput()
            ->with('message', 'Please enter required fields!')
    );
  }
}