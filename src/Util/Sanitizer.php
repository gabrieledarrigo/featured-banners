<?php
namespace Darrigo\FeaturedBanners\Util;

/**
 * Class Sanitize
 * @package Darrigo\FeaturedBanners\Util
 */
class Sanitizer
{
    /**
     * @param $input
     * @return string
     */
    public function sanitize($input)
    {
        return trim(strip_tags($input));
    }
}