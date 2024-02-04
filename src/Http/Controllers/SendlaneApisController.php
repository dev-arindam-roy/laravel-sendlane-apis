<?php

namespace Arindam\SendlaneApis\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Arindam\SendlaneApis\Traits\SendlaneApis;

class SendlaneApisController extends Controller
{
    use SendlaneApis;

    public function __construct()
    {
        
    }

    public function getAllList()
    {
        return self::apiGetAllList();
    }
    public function addList($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiCreateList($data);
    }
    public function getListById($listId = '')
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiGetListById($listId);
    }
    public function editList($listId = '', $data = array())
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiUpdateList($listId, $data);
    }
    public function removeList($listId = '')
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiDeleteList($listId);
    }
    public function getAllTag()
    {
        return self::apiGetAllTag();
    }
    public function addTag($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiCreateTag($data);
    }
    public function editTag($tagId = '', $data = array())
    {
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiUpdateTag($tagId, $data);
    }
    public function removeTag($tagId = '')
    {
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return self::apiDeleteTag($tagId);
    }
    public function getAllCustomFields()
    {
        return self::apiGetAllCustomFields();
    }
    public function addCustomField($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiCreateCustomField($data);
    }
    public function getCustomFieldIdById($customFieldId = '')
    {
        if (empty($customFieldId)) {
            return 'Custom Field id is required';
        }
        return self::apiGetCustomFieldById($customFieldId);
    }
    public function editCustomField($customFieldId = '', $data = array())
    {
        if (empty($customFieldId)) {
            return 'Custom Field id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiUpdateCustomField($customFieldId, $data);
    }
    public function saveContactToList($listId = '', $contactDetails = array(), $emailConsent = true, $smsConsent = false, $customFields = array(), $tagIds = array())
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        if (empty($contactDetails) || !is_array($contactDetails)) {
            return 'Required payload array parameters are missing';
        }
        return self::apiAddContactInList($listId, $contactDetails, $emailConsent, $smsConsent, $customFields, $tagIds);
    }
    public function getAllContacts()
    {
        return self::apiGetAllContacts();
    }
    public function getContactById($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiGetContactById($contactId);
    }
    public function deleteContactById($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiDeleteContactById($contactId);
    }
    public function getAllUnsubscribedContacts()
    {
        return self::apiGetAllUnsubscribedContacts();
    }
    public function getAllCustomFieldsForContact($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiGetAllCustomFieldsForContact($contactId);
    }
    public function getCustomFieldInfoByContact($contactId = null, $contactCustomFieldId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($contactCustomFieldId)) {
            return 'Custom field id is required';
        }
        return self::apiGetCustomFieldInfoByContact($contactId, $contactCustomFieldId);
    }
    public function saveCustomFieldsToContact($contactId = null, $customFields = array())
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($customFields) || !is_array($customFields)) {
            return 'Custom fields array is required';
        }
        return self::apiAddCustomFieldsToContact($contactId, $customFields);
    }
    public function deleteCustomFieldFromContact($contactId = null, $contactCustomFieldId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($contactCustomFieldId)) {
            return 'Custom field id is required';
        }
        return self::apiDeleteCustomFieldFromContact($contactId, $contactCustomFieldId);
    }
    public function getContactHistory($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiGetContactHistory($contactId);
    }
    public function getContactByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return self::apiGetContactByEmail($email);
    }
    public function getContactByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return self::apiGetContactByPhone($phone);
    }
    public function getContactByPhoneEmail($phone = null, $email = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        if (empty($email)) {
            return 'Email id is required';
        }
        return self::apiGetContactByPhoneEmail($phone, $email);
    }
    public function getContactSegments($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiGetContactSegments($contactId);
    }
    public function getSMSconsent($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiGetSMSconsent($contactId);
    }
    public function addSMSconsent($contactId = null, $phone = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return self::apiAddSMSconsent($contactId, $phone);
    }
    public function addSMSconsentByEmailOrPhone($phone = null, $email = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return self::apiAddSMSconsentByEmailOrPhone($phone, $email);
    }
    public function removeSMSconsent($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiRemoveSMSconsent($contactId);
    }
    public function contactSubscription($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiContactSubscription($contactId);
    }
    public function findSubscriptionByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return self::apiFindSubscriptionByEmail($email);
    }
    public function findSubscriptionByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return self::apiFindSubscriptionByPhone($phone);
    }
    public function contactTags($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiContactTags($contactId);
    }
    public function contactTagInfo($contactId = null, $tagId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return self::apiContactTagInfo($contactId, $tagId);
    }
    public function addTagToContact($contactId = null, $tagIds = array())
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagIds) || !is_array($tagIds)) {
            return 'Tag ids array is required';
        }
        return self::apiAddTagToContact($contactId, $tagIds);
    }
    public function removeTagFromContact($contactId = null, $tagId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return self::apiRemoveTagFromContact($contactId, $tagId);
    }
    public function unsubscribeContact($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return self::apiUnsubscribeContact($contactId);
    }
    public function contactInList($listId = null)
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiContactInList($listId);
    }
    public function contactInfoInList($contactId = null, $listId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiContactInfoInList($contactId, $listId);
    }
    public function deleteContactFromList($contactId = null, $listId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiDeleteContactFromList($contactId, $listId);
    }
    public function unsubscribedContactsFromList($listId = null)
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return self::apiUnsubscribedContactsFromList($listId);
    }
    public function deleteContactByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return self::apiDeleteContactByEmail($email);
    }
    public function deleteContactByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return self::apiDeleteContactByPhone($phone);
    }
}
