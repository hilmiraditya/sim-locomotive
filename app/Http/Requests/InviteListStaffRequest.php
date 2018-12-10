<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteListStaffRequest extends FormRequest
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
            'id_staff'  => 'required'
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id_staff.required' => 'Staff tidak bisa diinvite karena staff tidak dipilih'
        ];
    }
}
