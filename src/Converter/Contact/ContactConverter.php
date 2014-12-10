<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter\Contact;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;
use Ibrows\EasySysLibrary\Converter\Type\DateTime;

class ContactConverter extends AbstractConverter
{
    /**
     * @see https://docs.easysys.ch/ressources/contact/#show-contact
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Contact\Contact';

    /**
     * @var array
     */
    protected $mapping = array(
        'name_1'             => 'name',//string
        'name_2'             => 'firstName',//string
        'id'                 => 'id', //int
        'nr'                 => 'nr', //string
        'contact_type_id'    => 'contactTypeId', //int
        'salutation_id'      => 'salutationId', //int
        'title_id'           => 'titleId', //int
        'birthday'           => 'birthday', //DateTime
        'address'            => 'address', //string
        'postcode'           => 'postcode', // string
        'city'               => 'city', // string
        'country_id'         => 'countryId', // integer
        'mail'               => 'mail', // string
        'phone_fixed'        => 'phoneFixed', // string
        'phone_fixed_second' => 'phoneFixedSecond', // string
        'phone_mobile'       => 'phoneMobile', // string
        'fax'                => 'fax', // string
        'url'                => 'url', // string
        'skype_name'         => 'skypeName', // string
        'remarks'            => 'remarks', // string
        'language_id'        => 'languageId', // integer
        'is_lead'            => 'lead', // boolean
        'contact_group_ids'  => 'contactGroupIds', // string
        'contact_branch_ids' => 'contactBranchIds', // string
        'user_id'            => 'userId', // integer
        'owner_id'           => 'ownerId', // integer
        'profile_image'      => 'profileImage', // string
        'updated_at'         => 'updatedAt', // DateTime
    );

    /**
     * @return array|null
     */
    protected function setupConvertTypes()
    {
        return array(
            'birthday'   => new DateTime($this->getDefaultTimeFormat(), $this->getDefaultTimeZone()),
            'updated_at' => new DateTime($this->getDefaultDateTimeFormat(), $this->getDefaultTimeZone()),
        );
    }
}