<?php

namespace App\Http\Requests\Attendances;

use Illuminate\Foundation\Http\FormRequest;

class AttendancePostRequest extends FormRequest
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
            'mobile'                    => 'digits:10',
            'country_code'              => 'numeric',
            'otp_code'                  => 'regex:/(^([a-zA-Z0-9]+)$)/u|max:4|min:4',
            'first_name'                => 'regex:/(^([a-zA-Z]+)$)/u',
            'last_name'                 => 'regex:/(^([a-zA-Z]+)$)/u',
            'dob'                       => 'before:today',
            'gender'                    => 'in:male,female',
            'birth_place'               => '',
            'country_of_residency'      => '',
            'passport_no'               => 'regex:/(^([a-zA-Z0-9]+)$)/u|min:6',
            'issue_date'                => 'before:today',
            'expiry_date'               => 'after:today',
            'place_of_issue'            => '',
            'arrival_date'              => 'after:today',
            'profession'                => '',
            'organization'              => '',
            'visa_duration'             => 'numeric|between:1,90',
            'visa_status'               => 'in:multiple,single',
            'check_in_date'             => 'after:now',
            'check_out_date'            => 'after:today',
            'room_type'                 => 'in:king,twin',
            'add_check_in_date'         => 'after:now',
            'add_check_out_date'        => 'after:today',
            'add_room_type'             => 'in:king,twin',
            'passport_image'            => 'image',
            'personal_image'            => 'image',
        ];
    }
}
