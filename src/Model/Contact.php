<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Model;

class Contact
{
    /**
     * @var string (80)
     */
    protected $firstName;

    /**
     * @var string (80)
     */
    protected $name;

    /**
     * @var string (255)
     */
    protected $address;

    /**
     * @var \DateTime
     */
    protected $birthday;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var string (50)
     */
    protected $city;

    /**
     * @var string Collection (Resource contact_branch)
     */
    protected $contactBranchIds;

    /**
     * @var string Collection (Resource contact_group)
     */
    protected $contactGroupIds;

    /**
     * @var int Resource country
     */
    protected $countryId;

    /**
     * @var string (20)
     */
    protected $fax;

    /**
     * @var string (50)
     */
    protected $mail;

    /**
     * @var string (50)
     */
    protected $mailSecond;

    /**
     * @var string (40)
     */
    protected $phoneFixed;

    /**
     * @var string (40)
     */
    protected $phoneMobile;

    /**
     * @var string (40)
     */
    protected $phoneFixedSecond;

    /**
     * @var string (30)
     */
    protected $postcode;

    /**
     * @var string
     */
    protected $remarks;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $titleId;

    /**
     * @var int Resource contact_type
     */
    protected $contactTypeId;

    /**
     * @var int Resource language
     */
    protected $languageId;

    /**
     * @var int Resource user
     */
    protected $ownerId;

    /**
     * @var int Resource user
     */
    protected $userId;

    /**
     * @var int
     */
    protected $nr;

    /**
     * @var int Resource salutation
     */
    protected $salutationId;

    /**
     * @var int Resource send_type
     */
    protected $sendTypeId;

    /**
     * @var string (50)
     */
    protected $skypeName;

    /**
     * @var string (40)
     */
    protected $taxNr;

    /**
     * @var int
     */
    protected $tradeNumber;

    /**
     * @var boolean
     */
    protected $lead;

    /**
     * @var string
     */
    protected $profileImage;

    /**
     * @var array
     */
    protected $additionalData;

    /**
     * @param int $contactTypeId
     * @param string $name
     * @param int $ownerId
     * @param int $userId
     */
    public function __construct($contactTypeId, $name, $ownerId, $userId)
    {
        $this->contactTypeId = $contactTypeId;
        $this->name = $name;
        $this->ownerId = $ownerId;
        $this->userId = $userId;
    }

    // <editor-fold desc="Simple Getter Setter" defaultstate="collapsed" >

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday = null)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getTitleId()
    {
        return $this->titleId;
    }

    /**
     * @param int $titleId
     */
    public function setTitleId($titleId)
    {
        $this->titleId = $titleId;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getContactBranchIds()
    {
        return $this->contactBranchIds;
    }

    /**
     * @param string $contactBranchIds
     */
    public function setContactBranchIds($contactBranchIds)
    {
        $this->contactBranchIds = $contactBranchIds;
    }

    /**
     * @return string
     */
    public function getContactGroupIds()
    {
        return $this->contactGroupIds;
    }

    /**
     * @param string $contactGroupIds
     */
    public function setContactGroupIds($contactGroupIds)
    {
        $this->contactGroupIds = $contactGroupIds;
    }

    /**
     * @return int
     */
    public function getContactTypeId()
    {
        return $this->contactTypeId;
    }

    /**
     * @param int $contactTypeId
     */
    public function setContactTypeId($contactTypeId)
    {
        $this->contactTypeId = $contactTypeId;
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
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param int $languageId
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMailSecond()
    {
        return $this->mailSecond;
    }

    /**
     * @param string $mailSecond
     */
    public function setMailSecond($mailSecond)
    {
        $this->mailSecond = $mailSecond;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getNr()
    {
        return $this->nr;
    }

    /**
     * @param int $nr
     */
    public function setNr($nr)
    {
        $this->nr = $nr;
    }

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return string
     */
    public function getPhoneFixed()
    {
        return $this->phoneFixed;
    }

    /**
     * @param string $phoneFixed
     */
    public function setPhoneFixed($phoneFixed)
    {
        $this->phoneFixed = $phoneFixed;
    }

    /**
     * @return string
     */
    public function getPhoneFixedSecond()
    {
        return $this->phoneFixedSecond;
    }

    /**
     * @param string $phoneFixedSecond
     */
    public function setPhoneFixedSecond($phoneFixedSecond)
    {
        $this->phoneFixedSecond = $phoneFixedSecond;
    }

    /**
     * @return string
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phoneMobile
     */
    public function setPhoneMobile($phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * @return int
     */
    public function getSalutationId()
    {
        return $this->salutationId;
    }

    /**
     * @param int $salutationId
     */
    public function setSalutationId($salutationId)
    {
        $this->salutationId = $salutationId;
    }

    /**
     * @return int
     */
    public function getSendTypeId()
    {
        return $this->sendTypeId;
    }

    /**
     * @param int $sendTypeId
     */
    public function setSendTypeId($sendTypeId)
    {
        $this->sendTypeId = $sendTypeId;
    }

    /**
     * @return string
     */
    public function getSkypeName()
    {
        return $this->skypeName;
    }

    /**
     * @param string $skypeName
     */
    public function setSkypeName($skypeName)
    {
        $this->skypeName = $skypeName;
    }

    /**
     * @return string
     */
    public function getTaxNr()
    {
        return $this->taxNr;
    }

    /**
     * @param string $taxNr
     */
    public function setTaxNr($taxNr)
    {
        $this->taxNr = $taxNr;
    }

    /**
     * @return int
     */
    public function getTradeNumber()
    {
        return $this->tradeNumber;
    }

    /**
     * @param int $tradeNumber
     */
    public function setTradeNumber($tradeNumber)
    {
        $this->tradeNumber = $tradeNumber;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return boolean
     */
    public function isLead()
    {
        return $this->lead;
    }

    /**
     * @param boolean $lead
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
    }

    /**
     * @return string
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * @param string $profileImage
     */
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;
    }

    /**
     * @return array
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    /**
     * @param array $additionalData
     */
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }

    // </editor-fold>

    /**
     * @param string $name
     */
    public function setLastName($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getName();
    }

    /**
     * @param string $name
     */
    public function setCompanyName($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->getName();
    }

    /**
     * @param string $name
     */
    public function setCompanyAdditional($name)
    {
        $this->setFirstName($name);
    }

    /**
     * @return string
     */
    public function getCompanyAddition()
    {
        return $this->getFirstName();
    }
}