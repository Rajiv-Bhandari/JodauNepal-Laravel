<?php

// app/Traits/RequestValidator.php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

trait RequestValidator
{
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        // Handle validation errors as needed
        throw new HttpResponseException(
            response()->json(['error' => $errors], 422)
        );

        // Alternatively, you can redirect back with errors in a web context
        // throw new HttpResponseException(
        //     redirect()->back()->withErrors($errors)->withInput()
        // );
    }
}

