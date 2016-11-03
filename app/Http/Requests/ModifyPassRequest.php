<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModifyPassRequest extends Request
{
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
           /* "old_pass"=>"required",
            "new_pass"=>"required",
            "confirm_new_pass"=>"required"*/
        ];
    }
}
