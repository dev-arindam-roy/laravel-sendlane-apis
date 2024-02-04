<?php
  
namespace Arindam\SendlaneApis\Sendlane;
use Illuminate\Support\Facades\Config;
use Arindam\SendlaneApis\Http\Controllers\SendlaneApisController;
  
class SendlaneClass 
{
    protected $sendlaneApisController;

    public function __construct()
    {
        $this->sendlaneApisController = new SendlaneApisController();
    }

    public function hey()
    {
        return 'Hello Arindam, Sendlane APIs has been ready for you !!';
    }

    /** LIST APIs  */

    public function allLists()
    {
        return $this->sendlaneApisController->getAllList();
    }
    public function createList($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->addList($data);
    }
    public function listById($listId = '')
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->getListById($listId);
    }
    public function updateList($listId = '', $data = array())
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->editList($listId, $data);
    }
    public function deleteList($listId = '')
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->removeList($listId);
    }

    /** TAG APIs  */

    public function allTags()
    {
        return $this->sendlaneApisController->getAllTag();
    }
    public function createTag($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->addTag($data);
    }
    public function updateTag($tagId = '', $data = array())
    {
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->editTag($tagId, $data);
    }
    public function deleteTag($tagId = '')
    {
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return $this->sendlaneApisController->removeTag($tagId);
    }

    /** Custom Fields APIs  */

    public function allCustomFields()
    {
        return $this->sendlaneApisController->getAllCustomFields();
    }
    public function createCustomField($data = array())
    {
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->addCustomField($data);
    }
    public function customFieldById($customFieldId = '')
    {
        if (empty($customFieldId)) {
            return 'Custom Field id is required';
        }
        return $this->sendlaneApisController->getCustomFieldIdById($customFieldId);
    }
    public function updateCustomField($customFieldId = '', $data = array())
    {
        if (empty($customFieldId)) {
            return 'Custom Field id is required';
        }
        if (empty($data) || !is_array($data)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->editCustomField($customFieldId, $data);
    }

    /** Contact APIs  */

    public function addContactToList($listId = '', $contactDetails = array(), $emailConsent = true, $smsConsent = false, $customFields = array(), $tagIds = array())
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        if (empty($contactDetails) || !is_array($contactDetails)) {
            return 'Required payload array parameters are missing';
        }
        return $this->sendlaneApisController->saveContactToList($listId, $contactDetails, $emailConsent, $smsConsent, $customFields, $tagIds);
    }

    public function allContacts()
    {
        return $this->sendlaneApisController->getAllContacts();
    }

    public function contactById($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->getContactById($contactId);
    }

    public function deleteContactById($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->deleteContactById($contactId);
    }

    public function allUnsubscribedContacts()
    {
        return $this->sendlaneApisController->getAllUnsubscribedContacts();
    }

    public function allCustomFieldsForContact($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->getAllCustomFieldsForContact($contactId);
    }

    public function customFieldInfoByContact($contactId = null, $contactCustomFieldId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($contactCustomFieldId)) {
            return 'Custom field id is required';
        }
        return $this->sendlaneApisController->getCustomFieldInfoByContact($contactId, $contactCustomFieldId);
    }

    public function addCustomFieldsToContact($contactId = null, $customFields = array())
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($customFields) || !is_array($customFields)) {
            return 'Custom fields array is required';
        }
        return $this->sendlaneApisController->saveCustomFieldsToContact($contactId, $customFields);
    }

    public function removeCustomFieldFromContact($contactId = null, $contactCustomFieldId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($contactCustomFieldId)) {
            return 'Custom field id is required';
        }
        return $this->sendlaneApisController->deleteCustomFieldFromContact($contactId, $contactCustomFieldId);
    }

    public function contactHistory($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->getContactHistory($contactId);
    }

    public function contactByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return $this->sendlaneApisController->getContactByEmail($email);
    }

    public function contactByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return $this->sendlaneApisController->getContactByPhone($phone);
    }

    public function contactByPhoneEmail($phone = null, $email = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        if (empty($email)) {
            return 'Email id is required';
        }
        return $this->sendlaneApisController->getContactByPhoneEmail($phone, $email);
    }

    public function contactSegments($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->getContactSegments($contactId);
    }

    public function contactSubscription($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->contactSubscription($contactId);
    }

    public function findSubscriptionByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return $this->sendlaneApisController->findSubscriptionByEmail($email);
    }

    public function findSubscriptionByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return $this->sendlaneApisController->findSubscriptionByPhone($phone);
    }

    public function contactTags($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->contactTags($contactId);
    }

    public function contactTagInfo($contactId = null, $tagId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return $this->sendlaneApisController->contactTagInfo($contactId, $tagId);
    }

    public function addTagToContact($contactId = null, $tagIds = array())
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagIds) || !is_array($tagIds)) {
            return 'Tag ids array is required';
        }
        return $this->sendlaneApisController->addTagToContact($contactId, $tagIds);
    }

    public function removeTagFromContact($contactId = null, $tagId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($tagId)) {
            return 'Tag id is required';
        }
        return $this->sendlaneApisController->removeTagFromContact($contactId, $tagId);
    }

    public function unsubscribeContact($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->unsubscribeContact($contactId);
    }

    public function contactInList($listId = null)
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->contactInList($listId);
    }

    public function contactInfoInList($contactId = null, $listId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->contactInfoInList($contactId, $listId);
    }

    public function deleteContactFromList($contactId = null, $listId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->deleteContactFromList($contactId, $listId);
    }

    public function unsubscribedContactsFromList($listId = null)
    {
        if (empty($listId)) {
            return 'List id is required';
        }
        return $this->sendlaneApisController->unsubscribedContactsFromList($listId);
    }

    /** Custom */
    public function deleteContactByEmail($email = null)
    {
        if (empty($email)) {
            return 'Email id is required';
        }
        return $this->sendlaneApisController->deleteContactByEmail($email);
    }

    public function deleteContactByPhone($phone = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return $this->sendlaneApisController->deleteContactByPhone($phone);
    }

    /** SMS Consent */

    public function checkSMSconsent($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->getSMSconsent($contactId);
    }

    public function addSMSconsent($contactId = null, $phone = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return $this->sendlaneApisController->addSMSconsent($contactId, $phone);
    }

    public function addSMSconsentByEmailOrPhone($phone = null, $email = null)
    {
        if (empty($phone)) {
            return 'Phone number is required';
        }
        return $this->sendlaneApisController->addSMSconsentByEmailOrPhone($phone, $email);
    }

    public function removeSMSconsent($contactId = null)
    {
        if (empty($contactId)) {
            return 'Contact id is required';
        }
        return $this->sendlaneApisController->removeSMSconsent($contactId);
    }
    

}