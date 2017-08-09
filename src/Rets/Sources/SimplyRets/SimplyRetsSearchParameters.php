<?php

namespace ColbyGatte\Rets\Sources\SimplyRets;

use ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface;
use function GuzzleHttp\Psr7\build_query;

class SimplyRetsSearchParameters implements ListingSearchParametersInterface
{
    protected $query = [];
    
    /**
     * @return mixed
     */
    public function makeQuery()
    {
        return build_query(array_filter($this->query));
    }
    
    public function bedrooms($minimum, $maximum)
    {
        return $this->set([
            'minbeds' => $minimum,
            'maxbeds' => $maximum
        ]);
    }
    
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $_key => $_value) {
                $this->set($_key, $_value);
            }
            
            return $this;
        }
        
        $this->query[$key] = $value;
        
        return $this;
    }
    
    public function bathrooms($minimum, $maximum)
    {
        return $this->set([
            'minbaths' => $minimum,
            'maxbaths' => $maximum
        ]);
    }
    
    public function area($minimum, $maximum)
    {
        return $this->set([
            'minarea' => $minimum,
            'maxarea' => $maximum
        ]);
    }
    
    /**
     * Maximum number of listings to return
     *
     * @param $limit
     *
     * @return mixed
     */
    public function limit($limit)
    {
        return $this->set('limit', $limit);
    }
    
    /**
     * @param string|array $propertyType
     */
    public function propertyType($propertyType) {
        $this->set('type', is_array($propertyType) ? $propertyType : [$propertyType]);
    }
    
    /**
     * Array of postal codes
     *
     * @param $postalCodes
     *
     * @return mixed
     */
    public function postalCodes($postalCodes)
    {
        return $this->set('postalCodes', $postalCodes);
    }
    
    /**
     * Array of cities
     *
     * @param $cities
     *
     * @return mixed
     */
    public function cities($cities)
    {
        return $this->set('cities', $cities);
    }
    
    /**
     * Filter the listings returned by an agent ID. Note, the Agent ID is provided by your MLS.
     * The co-listing agent is not included in this query parameter.
     *
     * @param string $agent
     *
     * @return mixed
     */
    public function agent($agent)
    {
        return $this->set('agent', $agent);
    }
    
    /**
     * Filter the listings returned by brokerage with a Broker ID. For some MLS areas, this is the ListOfficeId
     * (Listing Office ID). You can specific multiple broker parameters. Note, this query parameter is only available
     * if a Broker ID is provided by your MLS.
     *
     * @param array $brokers
     *
     * @return mixed
     */
    public function brokers($brokers)
    {
        return $this->set('brokers', $brokers);
    }
    
    /**
     * @param int $minimum
     * @param int $maximum
     *
     * @return mixed
     */
    public function price($minimum, $maximum)
    {
        return $this->set([
            'minprice' => $minimum,
            'maxprice' => $maximum
        ]);
    }
}