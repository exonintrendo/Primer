<?php
/**
 * @author Alex Phillips <aphillips@cbcnewmedia.com>
 * Date: 12/1/14
 * Time: 12:35 PM
 */

namespace Primer\Utility;

use Exception;

class FluentArray
{
    private $_array;

    public function __construct($_array)
    {
        $this->_array = $_array;
    }

    public static function from($_array)
    {
        return new self($_array);
    }

    public function map($function)
    {
        $this->_array = Arrays::map($this->_array, $function);
        return $this;
    }

    public function mapKeys($function)
    {
        $this->_array = Arrays::mapKeys($this->_array, $function);
        return $this;
    }

    public function filter($function)
    {
        $this->_array = Arrays::filter($this->_array, $function);
        return $this;
    }

    public function filterNotBlank()
    {
        $this->_array = Arrays::filterNotBlank($this->_array);
        return $this;
    }

    public function filterByKeys($function)
    {
        $this->_array = Arrays::filterByKeys($this->_array, $function);
        return $this;
    }

    public function unique()
    {
        $this->_array = array_unique($this->_array);
        return $this;
    }

    public function keys()
    {
        $this->_array = array_keys($this->_array);
        return $this;
    }

    public function values()
    {
        $this->_array = array_values($this->_array);
        return $this;
    }

    public function flatten()
    {
        $this->_array = Arrays::flatten($this->_array);
        return $this;
    }

    public function intersect(array $array)
    {
        $this->_array = array_intersect($this->_array, $array);
        return $this;
    }

    public function reverse()
    {
        $this->_array = array_reverse($this->_array);
        return $this;
    }

    public function toMap($keyFunction, $valueFunction = null)
    {
        $this->_array = Arrays::toMap($this->_array, $keyFunction, $valueFunction);
        return $this;
    }

    public function toArray()
    {
        return $this->_array;
    }

    public function firstOr($default)
    {
        return Arrays::firstOrNull($this->_array) ? : $default;
    }

    public function toJson()
    {
        return json_encode($this->_array);
    }

    public function limit($number)
    {
        $this->_array = array_slice($this->_array, 0, $number);
        return $this;
    }

    public function skip($number)
    {
        $this->_array = array_slice($this->_array, $number);
        return $this;
    }
}