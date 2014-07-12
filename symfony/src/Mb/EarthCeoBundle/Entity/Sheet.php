<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 12.07.14
 * Time: 15:09
 */

namespace Mb\EarthCeoBundle\Entity;


use InvalidArgumentException;
use Symfony\Component\PropertyAccess\PropertyAccess;

class Sheet
{
    /**
     * @param array $values
     *
     * @return static
     */
    public static function createFromArray(array $values)
    {
        /** @var self $document */
        $document = new static();

        return $document->updateFromArray($values);
    }

    /**
     * @param array $values
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function updateFromArray(array $values)
    {
        foreach ($values as $key => $value) {
            static::getPropertyAccessor()->setValue($this, $key, $value);
        }

        return $this;
    }

    /**
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    private static function getPropertyAccessor()
    {
        static $propertyAccessor;

        if (null === $propertyAccessor) {
            $propertyAccessor = PropertyAccess::createPropertyAccessor();
        }

        return $propertyAccessor;
    }

} 