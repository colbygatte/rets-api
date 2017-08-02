<?php

namespace DevDept\Flavin\Interfaces;

use ArrayAccess;
use Iterator;

abstract class ListingCollectionInterface implements ArrayAccess, Iterator
{
    /**
     * @var \DevDept\Flavin\Sources\SimplyRets\SimplyRetsListingInfo
     */
    protected $listings;
    
    /**
     * ListingCollection constructor.
     *
     * @param \DevDept\Flavin\Listing[] $listings
     */
    public function __construct($listings = [])
    {
        $this->listings = $listings;
    }
    
    /**
     * @return \DevDept\Flavin\Interfaces\ListingInfoInterface
     */
    public function current()
    {
        return current($this->listings);
    }
    
    public function next()
    {
        next($this->listings);
    }
    
    public function key()
    {
        key($this->listings);
    }
    
    public function valid()
    {
        return key($this->listings) !== null;
    }
    
    public function rewind()
    {
        reset($this->listings);
    }

    public function offsetExists($offset)
    {
        return isset($this->listings[$offset]);
    }
    
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->listings[$offset];
        }
        
        throw new \Exception("$offset does not exist");
    }
    
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->listings[] = $value;
        }
        
        $this->listings[$offset] = $value;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->listings[$offset]);
    }
}