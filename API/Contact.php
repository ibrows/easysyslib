<?php
namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\ContactConverter;

/**
 * @author marcsteiner
 *
 */
class Contact extends AbstractType
{
    const IDENTIFY_PRECISION_NONE = 0;
    const IDENTIFY_PRECISION_MINIMUM = 1;
    const IDENTIFY_PRECISION_ALL = 31;

    /**
     * @var int
     */
    protected $typeIdPrivate = 2;

    /**
     * @var int
     */
    protected $typeIdCompany = 1;

    /**
     * @var array
     */
    protected $groupId = array();

    /**
     * @var int
     */
    protected $countryId = 1;

    /**
     * @var string
     */
    protected $description = 'Kontaktperson';

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        $this->type = 'contact';
        $this->converter = new ContactConverter();
    }

    /**
     * @param string $mail
     * @param string $firstName
     * @param string $name
     * @param string $postcode
     * @param string $city
     * @return array
     */
    public function searchForExistingPerson($mail, $firstName = null, $name = null, $postcode = null, $city = null)
    {
        $arr = compact(array_keys(get_defined_vars()));
        return $this->searchArrays($arr);
    }

    /**
     * @param string $postcode
     * @param string $city
     * @param string $name
     * @return array
     */
    public function searchForExistingCompany($postcode, $city, $name)
    {
        $arr = compact(array_keys(get_defined_vars()));
        return $this->searchArrays($arr);

    }

    /**
     * @param string $name
     * @param string $address
     * @param string $postcode
     * @param string $city
     * @return array
     */
    public function createCompany($name, $address, $postcode, $city)
    {
        return $this->createContact($name, null, null, null, $address, $postcode, $city, $this->typeIdCompany);
    }

    /**
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param string $phoneFixed
     * @param string $address
     * @param string $postcode
     * @param string $city
     * @return array
     */
    public function createPerson($name, $firstName, $mail, $phoneFixed, $address, $postcode, $city)
    {
        return $this->createContact($name, $firstName, $mail, $phoneFixed, $address, $postcode, $city, $this->typeIdPrivate);
    }

    /**
     * @param int $contactId
     * @param int $contactSubId
     * @return array
     */
    public function searchForRelation($contactId, $contactSubId)
    {
        $simpleCriteria = array(
            'contact_id'     => $contactId,
            'contact_sub_id' => $contactSubId
        );
        return $this->connection->call('contact_relation/search', array(), $this->convertSimpleCriteria($simpleCriteria), "POST");
    }

    /**
     * @param int $contactId
     * @param int $contactSubId
     * @param string $description
     * @return array
     */
    public function createContactRelation($contactId, $contactSubId, $description = null)
    {
        $data = array(
            'contact_id'     => $contactId,
            'contact_sub_id' => $contactSubId,
            'description'    => $description ?: $this->description
        );
        return $this->connection->call('contact_relation', array(), $data, 'POST');
    }

    /**
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param string $postcode
     * @param string $city
     * @param string $address
     * @param string $phone
     * @param string $company
     * @param int $identifyPrecision
     * @return array
     */
    public function addContact($name, $firstName, $mail, $postcode, $city, $address, $phone = null, $company = null, $identifyPrecision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->logger->info("try to add contact <comment>$name</comment>");

        if ($company != null) {
            return $this->addContactWithCompany($name, $firstName, $mail, $postcode, $city, $address, $phone, $company, $identifyPrecision);
        }

        return $this->addContactWithoutCompany($name, $firstName, $mail, $postcode, $city, $address, $phone, $identifyPrecision);
    }

    /**
     * @param int $id
     * @param array $data
     * @param string $type
     * @return array
     */
    public function update($id, array $data, $type = null)
    {
        unset($data['is_lead']);
        unset($data['profile_image']);
        unset($data['updated_at']);
        return parent::update($id, $data, $type);
    }

    /**
     * @param array $data
     * @param string $type
     * @param bool $includeUserId
     * @return array
     */
    public function create(array $data, $type = null, $includeUserId = true)
    {
        $data = $this->addDefaults($data);
        return parent::create($data, $type, $includeUserId);
    }

    /**
     * @param string $name
     * @return object
     */
    public function getModelInstance($name)
    {
        $this->converter->setDataEasySys($this->addDefaults());
        $contact = $this->converter->getObject();
        $contact->setName($name);
        return $contact;
    }

// <editor-fold desc="Simple Getter Setter" defaultstate="collapsed" >

    /**
     * @return array
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param array $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param int $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTypeIdCompany()
    {
        return $this->typeIdCompany;
    }

    /**
     * @param int $typeIdCompany
     */
    public function setTypeIdCompany($typeIdCompany)
    {
        $this->typeIdCompany = $typeIdCompany;
    }

    /**
     * @return int
     */
    public function getTypeIdPrivate()
    {
        return $this->typeIdPrivate;
    }

    /**
     * @param int $typeIdPrivate
     */
    public function setTypeIdPrivate($typeIdPrivate)
    {
        $this->typeIdPrivate = $typeIdPrivate;
    }

// </editor-fold>

    /**
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param string $phoneFixed
     * @param string $address
     * @param string $postcode
     * @param string $city
     * @param int $contactTypeId
     * @return array
     */
    protected function createContact($name, $firstName, $mail, $phoneFixed, $address, $postcode, $city, $contactTypeId)
    {
        $myAry = compact(array_keys(get_defined_vars()));
        return $this->createFromArray($myAry);
    }

    /**
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param string $postcode
     * @param string $city
     * @param string $address
     * @param string $phone
     * @param string $company
     * @param int $identifyPrecision
     * @return array
     */
    protected function addContactWithCompany($name, $firstName, $mail, $postcode, $city, $address, $phone, $company, $identifyPrecision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->logger->info("try to add company <comment>$company</comment>");
        $contactCompany = array();
        if ($identifyPrecision == self::IDENTIFY_PRECISION_MINIMUM) {
            $contactCompany = $this->searchForExistingCompany(null, null, $company);
        } elseif ($identifyPrecision == self::IDENTIFY_PRECISION_ALL) {
            $contactCompany = $this->searchForExistingCompany($postcode, $city, $company);
        }
        if (sizeof($contactCompany) > 0 && isset($contactCompany[0]['id'])) {
            $this->logger->info("found company <comment>$postcode, $city, $company</comment>");
            $contactCompany = $contactCompany[0];
        } else {
            $this->logger->info("create new company <comment>$postcode, $city, $company</comment>");
            $contactCompany = $this->createCompany($company, $address, $postcode, $city);
        }
        $companyId = $contactCompany['id'];
        $this->logger->info("try to add person <comment>$mail</comment>");
        $person = array();
        if ($identifyPrecision == self::IDENTIFY_PRECISION_MINIMUM) {
            $person = $this->searchForExistingPerson($mail);
        } elseif ($identifyPrecision == self::IDENTIFY_PRECISION_ALL) {
            $person = $this->searchForExistingPerson($mail, $firstName, $name, $postcode, $city);
        }
        if (sizeof($person) > 0 && isset($person[0]['id'])) {
            $this->logger->info("found person <comment>$mail</comment>  <info>" . $person[0]['id'] . "</info>");
            $person = $person[0];

        } else {
            $this->logger->info("create new person <comment>$mail, $name, $firstName</comment>");
            $person = $this->createPerson($name, $firstName, $mail, $phone, $address, $postcode, $city);
        }
        $personId = $person['id'];
        //Check if there is already a relation between the two contacts
        $relation = $this->searchForRelation($companyId, $personId);
        if (!count($relation)) {
            $this->logger->info("save new relation <comment>$companyId, $personId</comment>");
            $this->createContactRelation($companyId, $personId);
        } else {
            $this->logger->info("relation allerady exists<comment>$companyId, $personId</comment>");
        }
        $person['company'] = $companyId;
        return $person;
    }

    /**
     * @param string $name
     * @param string $firstName
     * @param string $mail
     * @param string $postcode
     * @param string $city
     * @param string $address
     * @param string $phone
     * @param int $identifyPrecision
     * @return array
     */
    protected function addContactWithoutCompany($name, $firstName, $mail, $postcode, $city, $address, $phone, $identifyPrecision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->logger->info("try to add person <comment>$name, $firstName</comment>");
        $person = array();
        if ($identifyPrecision == self::IDENTIFY_PRECISION_MINIMUM) {
            $person = $this->searchForExistingPerson($mail);
        } elseif ($identifyPrecision == self::IDENTIFY_PRECISION_ALL) {
            $person = $this->searchForExistingPerson($mail, $firstName, $name, $postcode, $city);
        }
        if (sizeof($person) > 0 && isset($person[0]['id'])) {
            $this->logger->info("found person <comment>$name, $firstName</comment>");
            $person = $person[0];

        } else {
            $this->logger->info("create new person <comment>$name, $firstName</comment>");
            $person = $this->createPerson($name, $firstName, $mail, $phone, $address, $postcode, $city);
        }
        return $person;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function addDefaults(array $data = array())
    {
        unset($data['title_id']);
        unset($data['is_lead']);
        unset($data['profile_image']);
        unset($data['updated_at']);

        if (!array_key_exists('owner_id', $data)) {
            $data['owner_id'] = $this->connection->getUserId();
        }

        if (!array_key_exists('contact_type_id', $data)) {
            $data['contact_type_id'] = $this->getTypeIdPrivate();
        }

        if (!array_key_exists('country_id', $data)) {
            $data['country_id'] = $this->getCountryId();
        }

        if (!array_key_exists('contact_group_ids', $data)) {
            $data['contact_group_ids'] = $this->getGroupId();
        }

        return $data;
    }
}
