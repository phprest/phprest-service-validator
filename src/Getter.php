<?php namespace Phprest\Service\Validator;

trait Getter
{
    /**
     * @return \Symfony\Component\Validator\ValidatorInterface
     */
    protected function serviceValidator()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }

    /**
     * Returns the DI container
     *
     * @return \League\Container\Container
     */
    abstract protected function getContainer();
}
