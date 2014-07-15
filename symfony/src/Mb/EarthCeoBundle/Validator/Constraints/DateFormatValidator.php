<?php

namespace Mb\EarthCeoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class DateFormatValidator extends ConstraintValidator
{
    const DATE_FORMAT = 'd-m-Y';

    /**
     * @param mixed $value
     * @param Constraint $constraint
     * @throws \Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if ($value instanceof \DateTime) {
            $value = (string)$value->format(static::DATE_FORMAT);
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string)$value;

        if ($this->hasWrongFormat($value)) {
            $this->context->addViolation($constraint->message);
        }
    }

    /**
     * @param $date
     * @return bool
     */
    private function hasWrongFormat($date)
    {
        $dateArray = date_parse_from_format(static::DATE_FORMAT, $date);

        return $dateArray['warning_count'] !== 0
        || $dateArray['error_count'] !== 0;
    }
}
