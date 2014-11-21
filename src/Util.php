<?php namespace Phrest\Service\Validator;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

trait Util
{
    /**
     * @param mixed $value
     * @param \Symfony\Component\Validator\Constraint|\Symfony\Component\Validator\Constraint[] $constraints
     * @param array|null $groups
     *
     * @return ConstraintViolationListInterface
     */
    protected function getErrors($value, $constraints = null, $groups = null)
    {
        /** @var ValidatorInterface $validator */
        $validator = $this->getContainer()->get(Config::getServiceName());

        return $validator->validate($value, $constraints, $groups);
    }

    /**
     * @param ConstraintViolationListInterface $constraintViolations
     * @param callable $formatter
     *
     * @return array
     */
    protected function getFormattedErrors(ConstraintViolationListInterface $constraintViolations,
                                          callable $formatter = null)
    {
        $errors = [];

        if (is_null($formatter)) {
            $formatter = function(ConstraintViolationInterface $constraintViolation) {
                return $constraintViolation->getPropertyPath() . ' : ' . $constraintViolation->getMessage();
            };
        }

        /** @var ConstraintViolationInterface $constraintViolation */
        foreach ($constraintViolations as $constraintViolation) {
            $errors[] = $formatter($constraintViolation);
        }

        return $errors;
    }

    /**
     * @return \Orno\Di\Container
     */
    abstract protected function getContainer();
}
