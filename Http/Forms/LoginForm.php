<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = "Please enter a valid password";
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = "Please enter a valid email address.";
        }
    }
}