<?php namespace Phrest\Service\Validator;

trait Getter
{
    /**
     * @return \Symfony\Component\Validator\ValidatorInterface
     */
    public function serviceValidator()
    {
        return $this->getContainer()->get(Config::getServiceName());
    }

    /**
     * Returns the DI container
     *
     * @return \Orno\Di\Container
     */
    abstract protected function getContainer();
}
