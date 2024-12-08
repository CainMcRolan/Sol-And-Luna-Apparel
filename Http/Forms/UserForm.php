<?php

namespace Http\Forms;

use Core\Validator;

class UserForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['first_name'], 3, 50)) {
            $this->errors['name'] = "first name";
        }

        if (!Validator::string($this->attributes['last_name'], 3, 50)) {
            $this->errors['name'] = "first name";
        }


        if (!Validator::phone($this->attributes['phone'])) {
            $this->errors['phone'] = "phone";
        }


        if (!$this->attributes['is_social']) {
            if (!Validator::email($this->attributes['email'])) {
                $this->errors['email'] = "email";
            }
        }

        if ($this->attributes['current_password'] && $this->attributes['new_password'] && $this->attributes['confirm_password']) {
            if ($this->attributes['new_password'] !== $this->attributes['confirm_password']) {
                $this->errors['new_password'] = "password";
                $this->errors['confirm_password'] = "password";
            }

            if (!Validator::string($this->attributes['new_password'], 3, 20)) {
                $this->errors['current_password'] = "password";
            }
        }
    }
}