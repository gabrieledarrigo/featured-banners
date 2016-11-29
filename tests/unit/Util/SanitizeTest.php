<?php
namespace Tests\Darrigo\FeaturedBanners;

use PHPUnit\Framework\TestCase;
use Darrigo\FeaturedBanners\Util\Sanitizer;

/**
 * Class SanitizerTest
 * @package Tests\Darrigo\FeaturedBanners
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
class SanitizerTest extends TestCase
{
    /**
     * @param $toSanitize
     * @dataProvider valueProvider
     */
    public function testItShouldSanitizeUserInput($toSanitize)
    {
        $sanitizer = new Sanitizer();
        $this->assertEquals(trim(strip_tags($toSanitize)), $sanitizer->sanitize($toSanitize));
    }

    /**
     * @return array
     */
    public function valueProvider()
    {
        return [
            ['<p><ciao>Come va?</ciao>'],
            ['<script>   <?php die(); ?>'],
            [' XYZ   \\\\ come va? <p> /p'],
        ];
    }
}