<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'english' => [
            'required_without_all' => 'Language is mandatory',
        ],
        'spanish' => [
        'required_without_all' => 'Language is mandatory',
        ],
        'other' => [
         'required_without_all' => 'Language is mandatory',
         ],
        'empid' => [
            'required' => 'Employee ID is mandatory',
            'numeric' => 'Employee ID must be number',
            'unique' => 'Employee ID has already been taken'
        ],
        'empfname' => [
            'required' => 'Employee First Name is mandatory',
        ],
        'emplname' => [
            'required' => 'Employee Last Name is mandatory',
        ],
        'positiontype' => [
            'required' => 'Position is mandatory',
        ],
        'experience' => [
            'required' => 'Experience is mandatory',
        ],
        'rating' => [
            'required' => 'Rating- Labeler is mandatory',
        ],
        'srating' => [
            'required' => 'Stocker Rating is mandatory',
        ],

        'name' => [
            'required' => 'The Name field is required.',
        ],
        'email' => [
            'required' => 'The E-Mail Address field is required.',
        ],
        'password' => [
            'required' => 'The Password field is required.',
        ],
        'password_confirmation' => [
            'required' => 'The Confirm Password field is required.',
        ],
        'supid' => [
            'required' => 'The Supervisor ID is mandatory.',
            'numeric' => 'The Supervisor ID must be a Number.',
            'unique' => 'Supervisor ID has already been taken'
        ],
        'supfname' => [
            'required' => 'The Supervisor First Name is mandatory.',
        ],
        'suplname' => [
            'required' => 'The Supervisor Last Name is mandatory.',
        ],
        'position' => [
            'required' => 'The Position field is mandatory.',
        ],
        'security_question1' => [
            'required' => 'Please select the security question.',
        ],
        'security_question2' => [
            'required' => 'Please select the security question.',
        ],
        'security_answer1' => [
            'required' => 'Answer field cannot be blank.',
        ],
        'security_answer2' => [
            'required' => 'Answer field cannot be blank.',
        ],
        'conveyor_line' => [
            'required' => 'Conveyor Lines field cannot be blank',
            'numeric' => 'Conveyor Lines must be a number',
        ],
        'support_line' => [
            'required' => 'Support Lines field cannot be blank',
            'numeric' => 'Support Lines must be a number',
        ],
        'schedule_date' => [
            'required' => 'Schedule Date cannot be blank',
        ],
        'schedule_time' => [
            'required' => 'Schedule Time cannot be blank',
        ],
        'avatar' => [
        'required' => 'No picture is selected',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
