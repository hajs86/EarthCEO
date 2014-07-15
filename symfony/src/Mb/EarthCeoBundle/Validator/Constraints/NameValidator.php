<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 15/7/14
 * Time: 1:23 PM
 */

namespace Mb\EarthCeoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class NameValidator extends ConstraintValidator
{
    const NAME_PATTERN = "/^[[:alpha:] (),.'-\/]*$/u";

    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if ($this->isNameInvalid($value)) {
            $this->context->addViolation(
                $constraint->message
            );
        }
    }

    /**
     * @param $name
     * @return bool
     */
    private function isNameInvalid($name)
    {
        return !preg_match(static::NAME_PATTERN, $name);
    }

}
