<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../vendor/autoload.php';

use rapidweb\googlecontacts\factories\ContactFactory;
require_once '../../../../wp-content/uploads/civicrm/civicrm.settings.php';
require_once '../../../../wp-content/plugins/civicrm/civicrm/CRM/Core/Config.php';
require_once '../../../../wp-content/plugins/civicrm/civicrm/api/api.php';

if(isset($_GET['submit'])){

  $data = civicrm_api3('Contact', 'get', [
    'sequential' => 1,
    'group' => "All_Individuals_2",
    'options' => ['limit' => 1000],
  ]);

$contacts = array();
$already_check = array();
$emailExists = FALSE;
$existing_contacts = rapidweb\googlecontacts\factories\ContactFactory::getAll();

foreach($existing_contacts as $existing_contact){
    $already_check[] = $existing_contact->email[0]['email'];
}

foreach($data['values'] as $key=>$value){
    $contacts[$key]["display_name"] = $value['display_name'];
    $contacts[$key]["phone"] = $value['phone'];
    $contacts[$key]["email"] = $value['email'];

}

if($contacts){
    foreach($contacts as $contact){
        if($contact['email']){
        if (!in_array($contact['email'], $already_check)) {
            $newContact = rapidweb\googlecontacts\factories\ContactFactory::create($contact['display_name'], $contact['phone'], $contact['email'], $note="");
            echo "contact created ".$contact['email']."";echo "<br>";echo "\n";
        }else{
            echo "contact already exists ".$contact['email']."";echo "<br>";echo "\n";
        }
    }
    }
}
}else{
?>

<form action="#" method="GET">
    <input type="submit" name="submit" value="CIVICRM Sync Contacts" />
</form>

<?php } ?>