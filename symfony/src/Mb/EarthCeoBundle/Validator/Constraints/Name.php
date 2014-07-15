<?php

namespace Mb\EarthCeoBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Name extends Constraint
{
    public $message = 'name.illegal_character';
}

