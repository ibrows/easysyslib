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

    protected $typeIdPrivate = 2;
    protected $typeIdCompany = 1;
    protected $groupId = array(
        151
    );
    protected $countryId = 1;
    protected $description = 'Kontaktperson';

    const IDENTIFY_PRECISION_NONE = 0;
    const IDENTIFY_PRECISION_MINIMUM = 1;
    const IDENTIFY_PRECISION_ALL = 31;

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
     * @param string $firstname
     * @param string $name
     * @param string $zip
     * @param string $city
     * @return array
     */
    public function searchForExistingPerson($mail, $firstname = null, $name = null, $postcode = null, $city = null)
    {
        $arr = compact(array_keys(get_defined_vars()));
        return $this->searchArrays($arr);
    }

    /**
     * @param string $plz
     * @param string $city
     * @param string $name
     * @return array
     */
    public function searchForExistingCompany($postcode, $city, $name)
    {
        $arr = compact(array_keys(get_defined_vars()));
        return $this->searchArrays($arr);

    }


    public function createCompany($name, $address, $postcode, $city)
    {

        return $this->createContact($name, null, null, null, $address, $postcode, $city, $this->typeIdCompany);
    }

    public function createPerson($name, $firstname, $mail, $phone_fixed, $address, $postcode, $city)
    {
        return $this->createContact($name, $firstname, $mail, $phone_fixed, $address, $postcode, $city, $this->typeIdPrivate);
    }

    protected function createContact($name_1, $name_2, $mail, $phone_fixed, $address, $postcode, $city, $contact_type_id)
    {
        //Save Person

        $myAry = compact(array_keys(get_defined_vars()));
        $myAry['user_id'] = $this->connection->getUserId();
        $myAry['owner_id'] = $this->connection->getUserId();
        $myAry['country_id'] = $this->countryId;
        $myAry['contact_group_ids'] = $this->groupId;
        return $this->connection->call('contact', array(), $myAry, "POST");
    }

    protected function searchForRelation($contact_id, $contact_sub_id)
    {
        $simplecrits = compact(array_keys(get_defined_vars()));
        return $this->connection->call('contact_relation/search', array(), $this->convertSimpleCriterias($simplecrits), "POST");
    }

    protected function createContactRelation($contact_id, $contact_sub_id, $description = null)
    {
        if ($description) {
            $description = $this->description;
        }
        $data = compact(array_keys(get_defined_vars()));
        return $this->connection->call('contact_relation', array(), $data, 'POST');
    }

    protected function addContactWithCompany($name, $firstname, $mail, $zip, $city, $address, $phone, $company, $identify_precision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->output->writeln("try to add company <comment>$company</comment>");
        $contactcompany = array();
        if ($identify_precision == self::IDENTIFY_PRECISION_MINIMUM) {
            $contactcompany = $this->searchForExistingCompany(null, null, $company);
        } elseif ($identify_precision == self::IDENTIFY_PRECISION_ALL) {
            $contactcompany = $this->searchForExistingCompany($zip, $city, $company);
        }
        if (sizeof($contactcompany) > 0 && isset($contactcompany[0]['id'])) {
            $this->output->writeln("found company <comment>$zip, $city, $company</comment>");
            $contactcompany = $contactcompany[0];
        } else {
            $this->output->writeln("create new company <comment>$zip, $city, $company</comment>");
            $contactcompany = $this->createCompany($company, $address, $zip, $city);
        }
        $companyid = $contactcompany['id'];
        $this->output->writeln("try to add person <comment>$mail</comment>");
        $person = array();
        if ($identify_precision == self::IDENTIFY_PRECISION_MINIMUM) {
            $person = $this->searchForExistingPerson($mail);
        } elseif ($identify_precision == self::IDENTIFY_PRECISION_ALL) {
            $person = $this->searchForExistingPerson($mail, $firstname, $name, $zip, $city);
        }
        if (sizeof($person) > 0 && isset($person[0]['id'])) {
            $this->output->writeln("found person <comment>$mail</comment>  <info>" . $person[0]['id'] . "</info>");
            $person = $person[0];

        } else {
            $this->output->writeln("create new person <comment>$mail, $name, $firstname</comment>");
            $person = $this->createPerson($name, $firstname, $mail, $phone, $address, $zip, $city);
        }
        $personid = $person['id'];
        //Check if there is already a relation between the two contacts
        $relation = $this->searchForRelation($companyid, $personid);
        if (!count($relation)) {
            $this->output->writeln("save new relation <comment>$companyid, $personid</comment>");
            $this->createContactRelation($companyid, $personid);
        } else {
            $this->output->writeln("relation allerady exists<comment>$companyid, $personid</comment>");
        }
        $person['company'] = $companyid;
        return $person;
    }

    protected function addContactWithoutCompany($name, $firstname, $mail, $zip, $city, $address, $phone, $identify_precision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->output->writeln("try to add person <comment>$name, $firstname</comment>");
        $person = array();
        if ($identify_precision == self::IDENTIFY_PRECISION_MINIMUM) {
            $person = $this->searchForExistingPerson($mail);
        } elseif ($identify_precision == self::IDENTIFY_PRECISION_ALL) {
            $person = $this->searchForExistingPerson($mail, $firstname, $name, $zip, $city);
        }
        if (sizeof($person) > 0 && isset($person[0]['id'])) {
            $this->output->writeln("found person <comment>$name, $firstname</comment>");
            $person = $person[0];

        } else {
            $this->output->writeln("create new person <comment>$name, $firstname</comment>");
            $person = $this->createPerson($name, $firstname, $mail, $phone, $address, $zip, $city);
        }
        return $person;
    }

    public function addContact($name, $firstname, $mail, $zip, $city, $address, $phone = null, $company = null, $identify_precision = self::IDENTIFY_PRECISION_MINIMUM)
    {
        $this->output->writeln("try to add contact <comment>$name</comment>");
        $id = null;
        if ($company != null) {
            return $this->addContactWithCompany($name, $firstname, $mail, $zip, $city, $address, $phone, $company, $identify_precision);
        } else {
            return $this->addContactWithoutCompany($name, $firstname, $mail, $zip, $city, $address, $phone, $identify_precision);
        }
    }

    /**
     * @param array $data
     * @param null  $type
     * @param bool  $includeUserId
     * @return array
     */
    public function create(array $data, $type = null, $includeUserId = true)
    {
        if (!array_key_exists('owner_id', $data)) {
            $data['owner_id'] = $this->connection->getUserId();
        }
        if (!array_key_exists('contact_type_id', $data)) {
            $data['contact_type_id'] = $this->getTypeIdPrivate();
        }

        return parent::create($data, $type, $includeUserId);
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
}
