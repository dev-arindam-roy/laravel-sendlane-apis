<?php

return [

    /**
     * Get the Api token from the .env file
     * 
     * Or you add directly here!
     */

    'sendlane_api_token' => env('SENDLANE_API_TOKEN', null),


    /**
     * Get the Sender id from the .env file
     * 
     * default: 1
     */
    'sendlane_api_sender_id' => env('SENDLANE_SENDER_ID', 1),


    /**
     * Set the SMS opt-in url
     * 
     * default: is the root url
     * Example:http://example.com/optin-url
     * 
     * you can configure it by .env also
     */
    'sendlane_sms_optin_url' => url('/'),


    /**
     * Set the SMS consent_language
     * 
     * default: welcome message
     * Example:http://example.com/terms-of-service
     * 
     * you can configure it by .env also
     */
    'sendlane_sms_consent_language' => 'Welcome to ' . env('APP_NAME', 'Sendlane')

];