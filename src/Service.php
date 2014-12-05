<?php namespace Phrest\Service\Validator;

use Phrest\Service\Serviceable;
use Phrest\Service\Configurable;
use Orno\Di\Container;
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

        $container->singleton($config->getServiceName(), $validator->getValidator());
    }
}
