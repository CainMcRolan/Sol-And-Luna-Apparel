<?php

namespace Http\Forms;

use Core\Validator;

class ReviewForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::number($this->attributes['rating'], 1, 5)) {
            $this->errors['rating'] = "rating";
        }

        if (!Validator::string($this->attributes['comment'], 3, 500)) {
            $this->errors['comment'] = "comment";
        }
    }
}