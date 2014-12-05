<?php namespace Phrest\Service\Validator;

use Phrest\Service\Configurable;

class Config implements Configurable
{
    /**
     * @var boolean
     */
    public $annotationMapping = true;

    /**
     * @param boolean $annotationMapping
     */
    public function __construct($annotationMapping = true)
    {
        $this->annotationMapping = $annotationMapping;
    }

    /**
     * @return string
     */
    static public function getServiceName()
    {
        return 'validator';
    }
}
