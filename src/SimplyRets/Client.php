<?php

namespace ColbyGatte\SimplyRets;

use GuzzleHttp\Client as HttpClient;
use function GuzzleHttp\Psr7\build_query;

class Client
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
    public function getListing($mlsId)
    {
        $requestUri = static::API_PROPERTIES.'/'.$mlsId;
        
        $httpClient = new HttpClient;
        
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
        
        $data = json_decode($response->getBody()->getContents(), true);
        
        if (! empty($data)) {
            $listing = new Listing;
            $listing->setInfo($data);
        } else {
            $listing = false;
        }
        
        return $listing;
    }
    
    /**
     * @param ListingSearchQuery|array|string
     *
     * @return \ColbyGatte\Rets\Sources\SimplyRets\ListingCollection
     */
    public function doSearch($searchParameters)
    {
        if ($searchParameters instanceof ListingSearchQuery) {
            $queryString = $searchParameters->getQueryString();
        } else {
            $queryString = is_array($searchParameters) ? build_query($searchParameters) : (string) $searchParameters;
        }
        
        $requestUri = static::API_PROPERTIES.'?'.$queryString;
        
        $httpClient = new HttpClient;
        
        $response = $httpClient->get(
            $requestUri,
            ['auth' => [$this->user, $this->pass]]
        );
        
        return ListingCollection::createFromJsonArray(
            $response->getBody()->getContents()
        )->setResponse($response);
    }
}