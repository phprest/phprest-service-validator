<?php namespace Phprest\Service\Validator\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("result")
 */
class Error
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $field;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $message;

    /**
     * @param string $field
     * @param string $message
     */
    public function __construct($field, $message)
    {
        $this->field = $field;
        $this->message = $message;
    }
}
