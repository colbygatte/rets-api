<?php

namespace DevDept\Rets\Sources\SimplyRets;

use DevDept\Rets\Interfaces\ListingInfoInterface;

/**
 * Responsibility of the ListingInfo class is to pull data from the ListingSource
 *
 * @package DevDept\Flavin
 */
class SimplyRetsListingInfo extends ListingInfoInterface
{
    /**
     * @var object
     */
    protected $info;
    
    /**
     * @return float
     */
    public function getListPrice()
    {
        return $this->get('listPrice');
    }
    
    /**
     * @return int
     */
    public function getBedrooms()
    {
        return $this->get('property.bedrooms');
    }
    
    /**
     * Should return a float, with a decimal of either .0 or .5
     *
     * @return float
     */
    public function getTotalBathrooms()
    {
        return $this->get('property.bathrooms');
    }
    
    /**
     * @return int
     */
    public function getSquareFeet()
    {
        return $this->get('property.area');
    }
    
    /**
     * @return string
     */
    public function getPropertyType()
    {
        return $this->get('property.type');
    }
    
    /**
     * @return int
     */
    public function getMlsId()
    {
        return $this->get('mlsId');
    }
    
    /**
     * @return int
     */
    public function getFireplaces()
    {
        return $this->get('property.fireplaces');
    }
    
    /**
     * @return string
     */
    public function getRoofType()
    {
        return $this->get('property.roof');
    }
    
    /**
     * @return string
     */
    public function getLeaseType()
    {
        return $this->get('leaseType');
    }
    
    /**
     * @return string
     */
    public function getCrossStreet()
    {
        return $this->get('address.crossStreet');
    }
    
    /**
     * @return string
     */
    public function getState()
    {
        return $this->get('address.state');
    }
    
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->get('address.city');
    }
    
    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->get('address.country');
    }
    
    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->get('address.postalCode');
    }
    
    /**
     * @return string
     */
    public function getFullAddress()
    {
        return $this->get('address.full');
    }
    
    /**
     * @return string
     */
    public function getAgentFullName()
    {
        return $this->get('sales.agent.firstName').' '.$this->get('sales.agent.lastName');
    }
    
    /**
     * @return string
     */
    public function getAgentLastName()
    {
        return $this->get('sales.agent.lastName');
    }
    
    /**
     * @return string
     */
    public function getAgentFirstName()
    {
        return $this->get('sales.agent.firstName');
    }
    
    /**
     * @return string
     */
    public function getHighSchool()
    {
        return $this->get('school.highSchool');
    }
    
    /**
     * @return string
     */
    public function getMiddleSchool()
    {
        return $this->get('school.middleSchool');
    }
    
    /**
     * @return string
     */
    public function getSchoolDistrict()
    {
        return $this->get('school.district');
    }
    
    /**
     * @return string
     */
    public function getElementarySchool()
    {
        return $this->get('school.elementarySchool');
    }
    
    /**
     * @return string[]
     */
    public function getPhotos()
    {
        return $this->get('photos');
    }
    
    /**
     * @return string
     */
    public function getPrivateRemarks()
    {
        return $this->get('privateRemarks');
    }
    
    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->get('remarks');
    }
    
    /**
     * Get data using dot notation.
     *
     * @param $data
     *
     * @return mixed|bool
     */
    public function get($data)
    {
        if (isset($this->info[$data])) {
            return $this->info[$data];
        }
        
        return false;
    }
    
    /**
     * @param mixed $info
     *
     * @return bool True if $info is valid, false if invalid
     */
    public function setInfo($info)
    {
        $this->info = \DevDept\Rets\Arr::dot($info, ['photos']);
        
        return true;
    }
    
    /**
     * Set info that has already been dotted
     *
     * @param $info
     *
     * @return bool
     */
    public function setDottedInfo($info)
    {
        $this->info = $info;
        
        return true;
    }
    
    public function getInfo()
    {
        return $this->info;
    }
}