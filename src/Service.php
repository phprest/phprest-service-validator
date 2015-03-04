<?php namespace Phprest\Service\Validator;

use Phprest\Service\Serviceable;
use Phprest\Service\Configurable;
use League\Container\Container;
use Symfony\Component\Validator\Validation;

class Service implements Serviceable
{
    /**
     * @param Container $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(Container $container, Configurable $config)
    {
        if ( ! $config instanceof Config) {
            throw new \InvalidArgumentException('Wrong Config object');
        }
        
        $validator = Validation::createValidatorBuilder();

        if ($config->annotationMapping) {
            $validator->enableAnnotationMapping();
        }

        $container->add($config->getServiceName(), $validator->getValidator());
    }
}
