<?php

namespace ColbyGatte\Rets\Interfaces;

interface RetsClientInterface
{
    /**
     * @param \ColbyGatte\Rets\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return mixed
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters);
}