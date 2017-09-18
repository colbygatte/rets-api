<?php

namespace ColbyGatte\SimplyRets;

use function GuzzleHttp\Psr7\build_query;

/**
 * Class ListingSearchQuery
 *
 * @package ColbyGatte\ListingSimplyRets
 * @method ListingSearchQuery minbed(int)
 * @method ListingSearchQuery maxbed(int)
 * @method ListingSearchQuery minbath(int)
 * @method ListingSearchQuery maxbath(int)
 * @method ListingSearchQuery minarea(int)
 * @method ListingSearchQuery maxarea(int)
 * @method ListingSearchQuery minprice(int)
 * @method ListingSearchQuery maxprice(int)
 * @method ListingSearchQuery q(string) Keywords
 * @method ListingSearchQuery lastId(int)
 * @method ListingSearchQuery limit(int)
 * @method ListingSearchQuery postalCodes(array)
 * @method ListingSearchQuery type(string) Property type
 * @method ListingSearchQuery cities(array)
 * @method ListingSearchQuery agent(string)
 * @method ListingSearchQuery brokers(array) Filter the listings returned by brokerage with a Broker ID. For some MLS areas, this is the ListOfficeId  (Listing Office ID). You can specific multiple broker parameters. Note, this query parameter is only available if a Broker ID is provided by your MLS.
 */
class ListingSearchQuery
{
    protected $query = [];
    
    /**
     * @return mixed
     */
    public function getQueryString()
    {
        return build_query($this->getQuery());
    }
    
    public function getQuery()
    {
        return array_filter($this->query, function ($value) {
            return ! is_null($value);
        });
    }
    
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $_key => $_value) {
                $this->set($_key, $_value);
            }
        } else {    
            $this->query[$key] = $value;
        }
        
        return $this;
    }
    
    public function __call($name, $arguments)
    {
        $this->set($name, ...$arguments);
        
        return $this;
    }
}

