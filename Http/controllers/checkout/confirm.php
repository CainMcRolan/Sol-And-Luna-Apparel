<?php

use Http\models\Addresses;
use Http\Forms\AddressForm;

$form = AddressForm::validate($attributes = [
    'user_id' => $_POST['user_id'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'zip_code' => $_POST['zip_code'],
    'province' => $_POST['province'],
    'country' => $_POST['country'],
    'is_default' => intval($_POST['primary']),
]);

if (empty($_POST['shipping_address_id'])) {
    (new Addresses)->store($attributes);
}

$_SESSION['order'] = [
    'payment_method' => $_POST['payment-method'],
    'total' => $_POST['total'],
    'shipping_address_id' => intval($_POST['shipping_address_id']) == 0 ? (new Addresses())->get_shipping_id($attributes['user_id']) : intval($_POST['shipping_address_id']),
];

redirect('/payment');
