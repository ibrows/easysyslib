<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter;

class ContactConverter extends AbstractConverter
{

    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Contact';
    protected $mapping = array(
        'name_1' => 'firstName',
        'name_2' => 'lastName',
    );


}