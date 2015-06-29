<?php namespace Phprest\Service\Validator;

use Phprest\Service\Serviceable;
use Phprest\Service\Configurable;
use League\Container\ContainerInterface;
use Symfony\Component\Validator\Validation;

class Service implements Serviceable
{
    /**
     * @param ContainerInterface $container
     * @param Configurable $config
     *
     * @return void
     */
    public function register(ContainerInterface $container, Configurable $config)
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
