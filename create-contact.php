<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../vendor/autoload.php';

use rapidweb\googlecontacts\factories\ContactFactory;
if($_GET){

    $name = $_GET['name'];
    $phoneNumber = $_GET['ph'];
    $emailAddress = $_GET['email'];
    $note = $_GET['note'];
    $emailExists = FALSE;

    $contacts = rapidweb\googlecontacts\factories\ContactFactory::getAll();

    foreach($contacts as $contact){
        $get_email = $contact->email[0]['email'];
        if($emailAddress == $get_email){
            $emailExists = TRUE;
            break;
        }
    }
    
    if(!$emailExists){
        $newContact = rapidweb\googlecontacts\factories\ContactFactory::create($name, $phoneNumber, $emailAddress, $note);
        echo "<h3 style='color:green'>contact created ".$emailAddress."</h3>";exit;
    }else{
        echo "<h3 style='color:red'>contact already exists ".$emailAddress."</h3>";exit;
    }

}
?>

<form action="#" method="GET">
    <input type="text" name="name" id="name" placeholder="Name" required/>
    <input type="text" name="ph" id="ph" placeholder="Phone Number" required/>
    <input type="email" name="email" id="email" placeholder="Email" required/>
    <input type="text" name="note" id="note" placeholder="Remarks" />
    <input type="submit" value="create contact" />
</form>