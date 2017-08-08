<?php

namespace DevDept\Rets\Sources\SimplyRets;

use DevDept\Rets\Interfaces\ListingSearchParametersInterface;
use GuzzleHttp\Client;

class SimplyRetsRetsClient
{
    const API_PROPERTIES = 'https://api.simplyrets.com/properties';
    
    protected $user;
    
    protected $pass;
    
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }
    
    /**
     * @param \DevDept\Rets\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return \DevDept\Rets\Sources\SimplyRets\SimplyRetsListingCollection
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters)
    {
        $httpClient = new Client;
    
        $requestUri = static::API_PROPERTIES.'?'.$searchParameters->makeQuery();
    
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
    
        return SimplyRetsListingCollection::createFromJsonArray(
            $response->getBody()->getContents()
        );
    }
}