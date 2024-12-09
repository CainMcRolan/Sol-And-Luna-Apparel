<?php

use Http\models\Addresses;

(new Addresses())->delete($_POST['address_id']);

redirect('/addresses');