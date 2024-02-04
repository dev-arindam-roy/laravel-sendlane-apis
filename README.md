# LARAVEL SENDLANE APIS

### A laravel package to integrate all Sendlane apis (v2)

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
3. SendlaneApis::updateCustomField($customFieldId, $data);

```

## Please have a look on the Sendlane API documentations
[Sendlane API documentations](https://sendlane.stoplight.io/docs/api-documentation/4da9355124251-list-contact-add)

## license:
The MIT License (MIT). Please see [License File](https://github.com/dev-arindam-roy/laravel-sendlane-apis/blob/master/README.md) for more information.

## Post Issues: if found any
If have any issue please [write me](https://github.com/dev-arindam-roy/laravel-sendlane-apis/issues).
