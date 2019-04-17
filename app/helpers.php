<?php

use NewsBird\Lib\Lib;


// get asset
if (!function_exists('asset')) {
    /**
     * @param $url
     * @return string
     */
    function asset($url)
    {
        $lib = new Lib();
        return $lib->asset($url);
    }
}