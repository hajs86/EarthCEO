<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 13.07.14
 * Time: 18:07
 */

namespace Mb\EarthCeoBundle\Entity;

use ArrayAccess;
use InvalidArgumentException;
use Iterator;
use IteratorAggregate;

class TaxCollection implements IteratorAggregate, ArrayAccess
{

    /** @var  integer */
    private $offset = 0;

    /** @var \Mb\EarthCeoBundle\Entity\Tax[] */
    private $data = [];

    public function __construct()
    {
        $this->offset = 0;
        $this->data = [];
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * @param mixed $offset
     *
     * @return \Mb\EarthCeoBundle\Entity\Tax
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @throws InvalidArgumentException
     */
    public function offsetSet($offset, $value)
    {
        if ($value instanceof Tax) {
            $this->data[$offset] = $value;
        } else {
            throw new InvalidArgumentException('Value must be instance of %s, %s given', Tax::class, gettype($value));
        }

    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @return \Generator|\Traversable
     */
    public function getIterator()
    {
        foreach ($this->data as $tax) {
            yield $tax;
        }
    }
}