<?php

namespace ColbyGatte\Rets\Sources\SimplyRets;

use ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface;
use ColbyGatte\Rets\Interfaces\RetsClientInterface;
use GuzzleHttp\Client as HttpClient;

class SimplyRetsRetsClient implements RetsClientInterface
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
     * @param int $mlsId
     *
     * @return bool
     */
    public function getListing($mlsId) {
        $requestUri = static::API_PROPERTIES.'/'. $mlsId;
        
        $httpClient = new HttpClient;
    
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
        
        $data = json_decode($response->getBody()->getContents(), true);
        
        if (! empty($data)) {
            $listing = new SimplyRetsListingInfo;
            $listing->setInfo($data);
        } else {
            $listing = false;
        }
        
        return $listing;
    }
    
    /**
     * @param \ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return \ColbyGatte\Rets\Sources\SimplyRets\SimplyRetsListingCollection
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters)
    {
        $requestUri = static::API_PROPERTIES.'?'.$searchParameters->makeQuery();
        
        $httpClient = new HttpClient;
    
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
    
        return SimplyRetsListingCollection::createFromJsonArray(
            $response->getBody()->getContents()
        )->setResponse($response);
    }
}