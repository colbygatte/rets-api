<?php

if (! function_exists('simply_rets_listing_type')) {
    /**
     * Takes a listing type in full or abbreviated form (case insensitive) and returns the upper cased abbreviated form.
     *
     * @param $type
     *
     * @return bool|string
     */
    function simply_rets_listing_type($type)
    {
        switch (strtolower($type)) {
        case 'condominium':
        case 'cnd':
            return 'CND';
        
        case 'residential':
        case 'res':
            return 'RES';
        
        case 'commercial':
        case 'cre':
            return 'CRE';
        
        case 'land':
        case 'lnd':
            return 'LND';
        
        case 'farm':
        case 'frm':
            return 'FRM';
        
        case 'rental':
        case 'rnt':
            return 'RNT';
        
        case 'multifamily':
        case 'mlf':
            return 'MLF';
        
        default:
            return false;
        }
    }
}