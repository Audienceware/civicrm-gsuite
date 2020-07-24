# civicrm-gsuite

This repository contains custom php code to synchronise contacts stored in CiviCRM with an organisation's G-Suite Account.

Assumptions for use case:
- an Organisation G-Suite Account
- a Project and API Credentials configured in Google Developer Console
- a contacts Group set up in CiviCRM to be shared with 1 G-Suite user, who may then delegate contacts to other users as required.


Instructions:
* Create a folder in the root directory of the CMS 'gsuite-user'
* Download the PHP Google Contacts v3 API repository into this folder, from https://github.com/rapidwebltd/php-google-contacts-v3-api
* Download the php files from this repository into folder .../gsuite-user/vendor/rapidwebltd/php-google-contacts-v3-api/
* In Google Developer Console, configure a Project, and create API credentials
* Configure vendor/rapidwebltd/php-google-contacts-v3-api/,config.json with the Google API credentials
* Following the instructions for PHP Google Contacts v3 API, authenticate the app loged in as the user with whom to share contacts
* Run the script civicrm-contacts-sync.php
* Check G-Suite to see that the contacts are now visible
* Delegate contact sharing to nominated users
