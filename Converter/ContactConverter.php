<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter;

use Ibrows\EasySysLibrary\Model\Contact;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ContactConverter
{

    protected $dataEasySys = array();

    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Contact';
    protected $mapping = array(
        'name_1' => 'firstName',
        'name_2' => 'firstName',
    );

    public function setArray($data)
    {
        $this->set($data);
    }

    public function setObject(Contact $contact)
    {
        $this->set($contact);
    }

    protected function set($objectOrArray)
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        foreach ($this->mapping as $mappingEasySys => $mappingLib) {
            $this->dataEasySys[$mappingEasySys] = $accessor->getValue($objectOrArray, $mappingLib);
        }
    }

    protected function get($objectOrArray)
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        foreach ($this->dataEasySys as $key => $value) {
            $accessor->setValue($objectOrArray, $this->mapping[$key], $value);
        }
        return $objectOrArray;
    }


    public function getArray()
    {
        return $this->get(array());
    }

    public function getObject()
    {
        $reflection = new \ReflectionClass($this->modelClass);
        $object = $reflection->newInstanceWithoutConstructor();
        return $this->get($object);
    }

    /**
     * @return array
     */
    public function getDataEasySys()
    {
        return $this->dataEasySys;
    }

    /**
     * @param array $dataEasySys
     */
    public function setDataEasySys($dataEasySys)
    {
        $this->dataEasySys = $dataEasySys;
    }


}