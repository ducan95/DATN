<?php

namespace Extention;

class ApiRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * check if the authenticated user actually has the authority to update a given resource
     * @return bool either user is authorized or not
     */
    public function authorize()
    {
        // implement authorization here

        return true;
    }

    /**
     * rules for validation
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /*public function response(array $errors)
    {
        return new ApiResponse([
            'errors' => $errors,
            'msgCode' => 1,
            'msgDesc' => 'Input error'
        ]);
    }*/
}
