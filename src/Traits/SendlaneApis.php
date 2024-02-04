<?php

namespace Arindam\SendlaneApis\Traits;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

trait SendlaneApis {

    public static function apiGetAllList()
    {
        $apiURL = "https://api.sendlane.com/v2/lists";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiCreateList($data)
    {
        if (!isset($data['sender_id'])) {
            $data['sender_id'] = !empty(config('sendlane.sendlane_api_sender_id')) ? config('sendlane.sendlane_api_sender_id') : 1;
        }
        $apiURL = "https://api.sendlane.com/v2/lists";
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiGetListById($listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiUpdateList($listId, $data)
    {
        if (!isset($data['sender_id'])) {
            $data['sender_id'] = !empty(config('sendlane.sendlane_api_sender_id')) ? config('sendlane.sendlane_api_sender_id') : 1;
        }
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId;
        return self::executeAPI($apiURL, 'PUT', $data);
    }
    public static function apiDeleteList($listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiGetAllTag()
    {
        $apiURL = "https://api.sendlane.com/v2/tags";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiCreateTag($data)
    {
        $apiURL = "https://api.sendlane.com/v2/tags";
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiUpdateTag($tagId, $data)
    {
        $apiURL = "https://api.sendlane.com/v2/tags/" . $tagId;
        return self::executeAPI($apiURL, 'PATCH', $data);
    }
    public static function apiDeleteTag($tagId)
    {
        $apiURL = "https://api.sendlane.com/v2/tags/" . $tagId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiGetAllCustomFields()
    {
        $apiURL = "https://api.sendlane.com/v2/custom-fields";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiCreateCustomField($data)
    {
        $apiURL = "https://api.sendlane.com/v2/custom-fields";
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiGetCustomFieldById($customFieldId)
    {
        $apiURL = "https://api.sendlane.com/v2/custom-fields/" . $customFieldId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiUpdateCustomField($customFieldId, $data)
    {
        $apiURL = "https://api.sendlane.com/v2/custom-fields/" . $customFieldId;
        return self::executeAPI($apiURL, 'PATCH', $data);
    }
    public static function apiAddContactInList($listId, $contactDetails, $emailConsent, $smsConsent, $customFields, $tagIds)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId . "/contacts";
        $data = array();
        if (!empty($tagIds) && is_array($tagIds)) {
            $contactDetails['tag_ids'] = $tagIds;
        }
        if (!empty($customFields) && is_array($customFields)) {
            $contactDetails['custom_fields'] = $customFields;
        }
        $contactDetails['email_consent'] = ($emailConsent) ? true : false;
        if ($smsConsent) {
            $contactDetails['sms_consent'] = array(
                'consent_type' => 'sms_keyword,web_form,integration',
                'ip_address' => $_SERVER["REMOTE_ADDR"],
                'optin_date' => date('Y-m-d H:i:s'),
                'sms_consent' => true,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'optin_url' => !empty(config('sendlane.sendlane_sms_optin_url')) ? config('sendlane.sendlane_sms_optin_url') : url('/'),
                'consent_language' => !empty(config('sendlane.sendlane_sms_consent_language')) ? config('sendlane.sendlane_sms_consent_language') : 'Welcome to Sendlane',
                'cookie_uuid' => md5(microtime(true)) . '-' . sha1(microtime(true))
            );
        }
        $data['contacts'] = array($contactDetails);
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiGetAllContacts()
    {
        $apiURL = "https://api.sendlane.com/v2/contacts";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetContactById($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiDeleteContactById($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiGetAllUnsubscribedContacts()
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/unsubscribed";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetAllCustomFieldsForContact($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/custom-fields";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetCustomFieldInfoByContact($contactId, $contactCustomFieldId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/custom-fields/" . $contactCustomFieldId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiAddCustomFieldsToContact($contactId, $customFields)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/custom-fields";
        $data = array();
        $data['custom_fields'] = $customFields;
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiDeleteCustomFieldFromContact($contactId, $contactCustomFieldId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/custom-fields/" . $contactCustomFieldId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiGetContactHistory($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/history";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetContactByEmail($email)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/search?email=" . $email;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetContactByPhone($phone)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/search?phone=" . $phone;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetContactByPhoneEmail($phone, $email)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/search?phone=" . $phone . "&email=" . $email;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetContactSegments($contactId) 
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/segments";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiGetSMSconsent($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/sms-consent";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiAddSMSconsent($contactId, $phone)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/sms-consent";
        $data = array();
        $data['phone'] = $phone;
        $data['consent_type'] = 'sms_keyword,web_form,integration';
        $data['ip_address'] = $_SERVER["REMOTE_ADDR"];
        $data['optin_date'] = date('Y-m-d H:i:s');
        $data['sms_consent'] = true;
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['optin_url'] = !empty(config('sendlane.sendlane_sms_optin_url')) ? config('sendlane.sendlane_sms_optin_url') : url('/');
        $data['consent_language'] = !empty(config('sendlane.sendlane_sms_consent_language')) ? config('sendlane.sendlane_sms_consent_language') : 'Welcome to Sendlane';
        $data['cookie_uuid'] = md5(microtime(true)) . '-' . sha1(microtime(true));
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiAddSMSconsentByEmailOrPhone($phone, $email)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/sms-consent";
        $data = array();
        if (!empty($email)) {
            $data['email'] = $email;
        }
        $data['phone'] = $phone;
        $data['consent_type'] = 'sms_keyword,web_form,integration';
        $data['ip_address'] = $_SERVER["REMOTE_ADDR"];
        $data['optin_date'] = date('Y-m-d H:i:s');
        $data['sms_consent'] = true;
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['optin_url'] = !empty(config('sendlane.sendlane_sms_optin_url')) ? config('sendlane.sendlane_sms_optin_url') : url('/');
        $data['consent_language'] = !empty(config('sendlane.sendlane_sms_consent_language')) ? config('sendlane.sendlane_sms_consent_language') : 'Welcome to Sendlane';
        $data['cookie_uuid'] = md5(microtime(true)) . '-' . sha1(microtime(true));
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiRemoveSMSconsent($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/sms-consent";
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiContactSubscription($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/subscriptions";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiFindSubscriptionByEmail($email)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/subscriptions?email=" . $email;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiFindSubscriptionByPhone($phone)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/subscriptions?phone=" . $phone;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiContactTags($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/tags";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiContactTagInfo($contactId, $tagId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/tags/" . $tagId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiAddTagToContact($contactId, $tagIds)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/tags";
        $data = array();
        $data['tag_ids'] = $tagIds;
        return self::executeAPI($apiURL, 'POST', $data);
    }
    public static function apiRemoveTagFromContact($contactId, $tagId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/tags/" . $tagId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiUnsubscribeContact($contactId)
    {
        $apiURL = "https://api.sendlane.com/v2/contacts/" . $contactId . "/unsubscribe";
        return self::executeAPI($apiURL, 'POST');
    }
    public static function apiContactInList($listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId . "/contacts";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiContactInfoInList($contactId, $listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId . "/contacts/" . $contactId;
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiDeleteContactFromList($contactId, $listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId . "/contacts/" . $contactId;
        return self::executeAPI($apiURL, 'DELETE');
    }
    public static function apiUnsubscribedContactsFromList($listId)
    {
        $apiURL = "https://api.sendlane.com/v2/lists/" . $listId . "/unsubscribed";
        return self::executeAPI($apiURL, 'GET');
    }
    public static function apiDeleteContactByEmail($email)
    {
        $findContact = self::apiGetContactByEmail($email);
        if (isset($findContact['data']['id']) && !empty($findContact['data']['id'])) {
            return self::apiDeleteContactById($findContact['data']['id']);
        }
        return $findContact;
    }
    public static function apiDeleteContactByPhone($phone)
    {
        $findContact = self::apiGetContactByPhone($phone);
        if (isset($findContact['data']['id']) && !empty($findContact['data']['id'])) {
            return self::apiDeleteContactById($findContact['data']['id']);
        }
        return $findContact;
    }

        
    /**
     * isApiTokenSet
     *
     * @return boolean
     */
    public static function isApiTokenSet()
    {
        return !empty(config('sendlane.sendlane_api_token')) ? true : false;
    }

    /**
     * setDefaultHeader
     *
     * @return array
     */
    public static function setDefaultHeader()
    {
        $apiToken = config('sendlane.sendlane_api_token');
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiToken
        ];
        return $headers;
    }
    /**
     * executeAPI
     * customized curl
     * @param  string $url
     * @param  string $method
     * @param  array $data
     * @param  array $header
     * @return json
     */
    public static function executeAPI($url, $method = 'GET', $data = array(), $header = array())
    {
        try {
            if (!self::isApiTokenSet()) {
                return 'Sendlane api token is not found. Please add the api token in the .env file.';
            }
            $headers = self::setDefaultHeader();
            if (!empty($header)) {
                array_push($headers, $header);
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if (strtoupper($method) == 'POST') {
                curl_setopt($ch, CURLOPT_POST, 1);
            }
            if (strtoupper($method) == 'PUT') {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            }
            if (strtoupper($method) == 'DELETE') {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            }
            if (strtoupper($method) == 'PATCH') {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if (!empty($data)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);
            if ($error) {
                \Log::info("cUrl Error" . $error);
            }
            return json_decode($result, true);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}