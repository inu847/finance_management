<?php

function generateInvoiceNumber()
{
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $randomString = '';

    for ($i = 0; $i < 3; $i++) {
        $randomString .= $letters[rand(0, strlen($letters) - 1)];
    }

    for ($i = 0; $i < 4; $i++) {
        $randomString .= $digits[rand(0, strlen($digits) - 1)];
    }

    return $randomString;
}

?>