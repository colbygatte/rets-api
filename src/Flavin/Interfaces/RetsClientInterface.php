<?php

namespace DevDept\Flavin\Interfaces;

interface RetsClientInterface
{
    /**
     * @param \DevDept\Flavin\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return mixed
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters);
}