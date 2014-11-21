<?php namespace Phrest\Service\Validator;

use Phrest\Service\Contract\Serviceable;
use Phrest\Service\Contract\Configurable;
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
        $validator = Validation::createValidatorBuilder();

        /** @var Config $config */

        if ($config->annotationMapping) {
            $validator->enableAnnotationMapping();
        }

        $container->add($config->getServiceName(), $validator->getValidator());
    }
}
