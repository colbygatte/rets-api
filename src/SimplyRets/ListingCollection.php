<?php

namespace ColbyGatte\SimplyRets;

use ArrayAccess;
use Iterator;

class ListingCollection implements ArrayAccess, Iterator
{
    /**
     * @var \ColbyGatte\SimplyRets\Listing[]
     */
    protected $listings;
    
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;
    
    /**
     * ListingCollection constructor.
     *
     * @param \ColbyGatte\SimplyRets\Listing[] $listings
     */
    public function __construct($listings = [])
    {
        $this->listings = $listings;
    }
    
    /**
     * @param $jsonArray
     *
     * @return static
     */
    static function createFromJsonArray($jsonArray)
    {
        $listings = new static;
        
        foreach (json_decode($jsonArray, true) as $json) {
            $listing = new Listing();
            
            if ($listing->setInfo($json)) {
                $listings[] = $listing;
            } else {
                // TODO: error handling. this returns a bool on success & false on failure.
            }
        }
        
        return $listings;
    }
    
    /**
     * @return \ColbyGatte\SimplyRets\Listing
     */
    public function last()
    {
        return end($this->listings);
    }
    
    public function all()
    {
        return $this->listings;
    }
    
    /**
     * @return \ColbyGatte\SimplyRets\Listing
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
        return key($this->listings);
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
        } else {
            $this->listings[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->listings[$offset]);
    }
    
    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;
        
        return $this;
    }
    
    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}