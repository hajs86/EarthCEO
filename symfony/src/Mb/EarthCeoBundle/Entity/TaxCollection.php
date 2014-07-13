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

class TaxCollection implements Iterator, ArrayAccess
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
     * @return \Mb\EarthCeoBundle\Entity\Tax
     */
    public function current()
    {
        return $this->data[$this->offset];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        ++$this->offset;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->offset;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->data[$this->offset]);
    }

    /**
     * rewinds collection to start
     */
    public function rewind()
    {
        $this->offset = 0;
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
        if ($value instanceof Tax::class) {
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
}