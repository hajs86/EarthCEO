<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 12.07.14
 * Time: 15:09
 */

namespace Mb\EarthCeoBundle\Entity;


use InvalidArgumentException;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;

class Sheet
{
    const CHARS_TO_BE_TRIMMED = '" \0x20 \0x09 \0x0A \0x0D \0x00 \0x0B';

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
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function updateFromArray(array $values)
    {
        foreach ($values as $key => $value) {
            $this->cleanValue($value);

            static::getPropertyAccessor()->setValue($this, $key, $value);
        }

        return $this;
    }

    /**
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    public static function getPropertyAccessor()
    {
        static $propertyAccessor;

        if (null === $propertyAccessor) {
            $propertyAccessor = PropertyAccess::createPropertyAccessor();
        }

        return $propertyAccessor;
    }

    /**
     * @param $value
     *
     * @return void
     */
    private function cleanValue(&$value)
    {
        $value =
            utf8_decode(
                strip_tags(
                    trim(
                        preg_replace('/[^(\x20-\x7F)]*/', '', $value),
                        '"'
                    )
                )
            );
    }

} 