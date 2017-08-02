<?php

namespace DevDept\Flavin\Interfaces;

/**
 * Responsibility of the ListingInfo class is to pull data from the ListingSource
 *
 * @package DevDept\Flavin\Interfaces
 */
abstract class ListingInfoInterface
{
    /**
     * @param mixed $info
     *
     * @return bool True if $info is valid, false if invalid
     */
    abstract public function setInfo($info);
    
    /**
     * @return float
     */
    abstract public function getListPrice();
    
    /**
     * @return int
     */
    abstract public function getBedrooms();
    
    /**
     * Should return a float, with a decimal of either .0 or .5
     *
     * @return float
     */
    abstract public function getTotalBathrooms();
    
    /**
     * @return int
     */
    abstract public function getSquareFeet();
    
    /**
     * @return string
     */
    abstract public function getPropertyType();
    
    /**
     * @return int
     */
    abstract public function getMlsId();
    
    /**
     * @return int
     */
    abstract public function getFireplaces();
    
    /**
     * @return string
     */
    abstract public function getRoofType();
    
    /**
     * @return string
     */
    abstract public function getLeaseType();
    
    /**
     * @return string
     */
    abstract public function getCrossStreet();
    
    /**
     * @return string
     */
    abstract public function getState();
    
    /**
     * @return string
     */
    abstract public function getCity();
    
    /**
     * @return string
     */
    abstract public function getCountry();
    
    /**
     * @return string
     */
    abstract public function getPostalCode();
    
    /**
     * @return string
     */
    abstract public function getFullAddress();
    
    /**
     * @return string
     */
    abstract public function getAgentFullName();
    
    /**
     * @return string
     */
    abstract public function getAgentLastName();
    
    /**
     * @return string
     */
    abstract public function getAgentFirstName();
    
    /**
     * @return string
     */
    abstract public function getHighSchool();
    
    /**
     * @return string
     */
    abstract public function getMiddleSchool();
    
    /**
     * @return string
     */
    abstract public function getSchoolDistrict();
    
    /**
     * @return string
     */
    abstract public function getElementarySchool();
    
    /**
     * @return string[]
     */
    abstract public function getPhotos();
    
    /**
     * @return string
     */
    abstract public function getPrivateRemarks();
    
    /**
     * @return string
     */
    abstract public function getRemarks();
    
    /**
     * Will search for a getter function on $this
     *
     * @param $name
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get($name)
    {
        $method = 'get'.ucfirst($name);
     
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        
        throw new \Exception("Invalid property $name");
    }
}