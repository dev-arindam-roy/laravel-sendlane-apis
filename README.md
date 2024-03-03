# LARAVEL SENDLANE APIS

### A laravel package to integrate all Sendlane apis (v2)
## 50+ APIs for you. Make your development easy!!

## Installation

> **No dependency on PHP version and LARAVEL version**

### STEP 1: Run the composer command:

```shell
composer require arindam/sendlane-apis
```

### STEP 2: Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Arindam\SendlaneApis\SendlaneApiServiceProvider::class,
```

You need to use the below facade, add this to aliases section in config/app.php:

```php
'SendlaneApis' => Arindam\SendlaneApis\Sendlane\SendlaneClassFacade::class,
```

### STEP 3: (Optional) Publish the package config:

If you need to customize the api configuration

```php
php artisan vendor:publish --provider="Arindam\SendlaneApis\SendlaneApiServiceProvider" --force

- OR -

php artisan vendor:publish --tag="sendlaneapis:config"
```

## How to use?:

First, you need to create Sendlane (https://www.sendlane.com/) account and generate a api token.
Then, you need to just add below information in your .env file  
LIKE: 
```php
SENDLANE_API_TOKEN=YOUR_API_TOKEN

```

## Now enjoy with the below methods:

> **LIST APIs**

```php

//Get all lists
1. SendlaneApis::allLists();

//Create a list
$data = array('name' => 'your list name', 'description' => 'your list description');
2. SendlaneApis::createList($data);

//Get a list details by list id
3. SendlaneApis::listById($listId);

//Update a list by list id
$data = array('name' => 'your edited list name', 'description' => 'your edited list description');
4. SendlaneApis::updateList($listId, $data);

//Delete a list by list id
5. SendlaneApis::deleteList($listId);

```

> **TAG APIs**

```php

//Get all tags
1. SendlaneApis::allTags();

//Create a tag
$data = array('name' => 'your tag name');
2. SendlaneApis::createTag($data);

//Update a tag by tag id
$data = array('name' => 'your edited tag name');
3. SendlaneApis::updateTag($tagId, $data);

//Delete a tag by tag id
4. SendlaneApis::deleteTag($tagId);

```

> **Custom Fields APIs**

```php

//Get all custom fields
1. SendlaneApis::allCustomFields();

//Create a custom field
$data = array('name' => 'your custom field name');
2. SendlaneApis::createCustomField($data);

//Get a custom field details by custom field id
3. SendlaneApis::customFieldById($customFieldId);

//Update a custom field by custom field id
$data = array('name' => 'your edited custom field name');
4. SendlaneApis::updateCustomField($customFieldId, $data);

```

> **Contact Profile APIs**

```php

//Add a contact to a list
$listId = 6; // your list id
$contactDetails['first_name'] = "Arindam";
$contactDetails['last_name'] = "Roy";
$contactDetails['email'] = "arindam.roy.developer@gmail.com";
$contactDetails['phone'] = "4844731832"; //phone number should be valid
$emailConsent = true or false
$smsConsent = true or false
$customFields = array(
    array('id' => [YOUR_CUSTOM_FIELD_ID], 'value' => [YOUR_CUSTOM_FIELD_VALUE]), 
    array('id' => [YOUR_CUSTOM_FIELD_ID], 'value' => [YOUR_CUSTOM_FIELD_VALUE]).
    ......
    ......
);
$tagIds = array('YOUR_TAG_ID1', 'YOUR_TAG_ID2', ....);
// $listId and $contactDetails - parameters are required else are optional
1. SendlaneApis::addContactToList($listId, $contactDetails, $emailConsent, $smsConsent, $customFields, $tagIds);

//Get all contacts
2. SendlaneApis::allContacts();

//Get a contact by the contact id
3. SendlaneApis::contactById($contactId);

//Delete a contact by the contact id
4. SendlaneApis::deleteContactById($contactId);

//Get a list of Un-Subscribed contacts
5. SendlaneApis::allUnsubscribedContacts();

//Get all custom fields for a specific contact using the contact id
6. SendlaneApis::allCustomFieldsForContact($contactId);

//Get a custom field information for a specific contact using the contact id and the custom field id
7. SendlaneApis::customFieldInfoByContact($contactId, $contactCustomFieldId);

//Add custom fields for a specific contact using the contact id and the custom fields array
$contactId = 1233 // your contact id
$customFields = array(
    array('id' => [YOUR_CUSTOM_FIELD_ID], 'value' => [YOUR_CUSTOM_FIELD_VALUE]), 
    array('id' => [YOUR_CUSTOM_FIELD_ID], 'value' => [YOUR_CUSTOM_FIELD_VALUE]).
    ......
    ......
);
8. SendlaneApis::addCustomFieldsToContact($contactId, $customFields);

//Delete a custom field for a specific contact using the contact id and the custom field id
9. SendlaneApis::removeCustomFieldFromContact($contactId, $contactCustomFieldId);

//Get all detail information for a specific contact using the contact id
10. SendlaneApis::contactHistory($contactId);

//Find a contact by email id
11. SendlaneApis::contactByEmail($email);

//Find a contact by phone number
12. SendlaneApis::contactByPhone($phone);

//Find a contact by email id or phone number
13. SendlaneApis::contactByPhoneEmail($phone, $email);

//Get all segments for a contact using the contact id
14. SendlaneApis::contactSegments($contactId);

//Get all subscription list for a contact using the contact id
15. SendlaneApis::contactSubscription($contactId);

//Get all subscription list for a contact using the contact email id
16. SendlaneApis::findSubscriptionByEmail($email);

//Get all subscription list for a contact using the contact phone number
17. SendlaneApis::findSubscriptionByPhone($phone);

//Get all tags for a contact using the contact id
18. SendlaneApis::contactTags($contactId);

//Get a tag information for a specific contact using the contact id and the tag id
19. SendlaneApis::contactTagInfo($contactId, $tagId);

//Add tags for a contact by using contact id and tags array
$contactId = 1233 // your contact id
$tagIds = array('YOUR_TAG_ID1', 'YOUR_TAG_ID2', ....);
20. SendlaneApis::addTagToContact($contactId, $tagIds);

//Delete a tag for a specific contact using the contact id and the tag id
21. SendlaneApis::removeTagFromContact($contactId, $tagId);

//Un-subscribe from all list for a contact using contact id
22. SendlaneApis::unsubscribeContact($contactId);

//Get all contacts in a list by list id
23. SendlaneApis::contactInList($listId);

//Get contact information in details for contact in a list by list id and contact id
24. SendlaneApis::contactInfoInList($contactId, $listId);

//Delete a contact for a list by list id and contact id
25. SendlaneApis::deleteContactFromList($contactId, $listId);

//Get all contacts who are unsubscribed for a list by list id
26. SendlaneApis::unsubscribedContactsFromList($listId);

//Delete a contact by email id
27. SendlaneApis::deleteContactByEmail($email);

//Delete a contact by phone number
28. SendlaneApis::deleteContactByPhone($phone);
```

> **SMS Consent APIs**

```php
//Check SMS consent enable or disable for a contact using contact id
1. SendlaneApis::checkSMSconsent($contactId);

//Add SMS consent for a contact using contact id and valid phone number
2. SendlaneApis::addSMSconsent($contactId, $phone);

//Add SMS consent for a contact using email id or phone number
3. SendlaneApis::addSMSconsentByEmailOrPhone($phone, $email);

//Remove SMS consent for a contact using contact id
4. SendlaneApis::removeSMSconsent($contactId);
```

## Please have a look on the Sendlane API documentations
[Sendlane API documentations](https://sendlane.stoplight.io/docs/api-documentation/4da9355124251-list-contact-add)
[Place Order API](https://sendlane.stoplight.io/docs/api-documentation/61630a2087494-order-placed)

## license:
The MIT License (MIT). Please see [License File](https://github.com/dev-arindam-roy/laravel-sendlane-apis/blob/master/README.md) for more information.

## Post Issues: if found any
If have any issue please [write me](https://github.com/dev-arindam-roy/laravel-sendlane-apis/issues).

## Thankyou!
