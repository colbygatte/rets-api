<?php

namespace DevDept\Rets\Interfaces;

interface RetsClientInterface
{
    /**
     * @param \DevDept\Rets\Interfaces\ListingSearchParametersInterface $searchParameters
     *
     * @return mixed
     */
    public function doSearch(ListingSearchParametersInterface $searchParameters);
}