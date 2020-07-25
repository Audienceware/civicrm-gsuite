<?php

require_once '../../../vendor/autoload.php';

use rapidweb\googlecontacts\factories\ContactFactory;

$contacts = ContactFactory::getAll();

if (count($contacts)) {
    print "<pre>";print_r($contacts);
    echo 'Test retrieved '.count($contacts).' contacts.';
} else {
    echo 'No contacts retrieved!';
}
