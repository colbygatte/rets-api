<?php

namespace DevDept\Flavin\Interfaces;

interface ListingSearchParametersInterface
{
    /**
     * @return mixed
     */
    public function makeQuery();
    
    public function bedrooms($minimum, $maximum);
    
    public function bathrooms($minimum, $maximum);
    
    public function area($minimum, $maximum);
    
    /**
     * Maximum number of listings to return
     *
     * @param $limit
     *
     * @return mixed
     */
    public function limit($limit);
    
    /**
     * Array of postal codes
     *
     * @param $postalCodes
     *
     * @return mixed
     */
    public function postalCodes($postalCodes);
    
    /**
     * Array of cities
     *
     * @param $cities
     *
     * @return mixed
     */
    public function cities($cities);
    
    /**
     * @param string $agent
     *
     * @return mixed
     */
    public function agent($agent);
    
    /**
     * @param array $brokers
     *
     * @return mixed
     */
    public function brokers($brokers);
}