<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm extends Form
{
    public function __construct($attributes)
    {
        if (!Validator::string($attributes['password'], 5, INF)) {
            $this->errors['body'] = 'Please enter a valid password';
        }

        if (!Validator::email($attributes['email'])) {
            $this->errors['body'] = 'Please enter a valid email address';
        }
    }
}