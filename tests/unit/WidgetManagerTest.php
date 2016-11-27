<?php
namespace Tests\Darrigo\FeaturedBanners;

use Darrigo\FeaturedBanners\WidgetManager;
use Darrigo\WpPluginUtils\Model\Instance;
use PHPUnit\Framework\TestCase;

/**
 * Class WidgetManagerTest
 * @package Tests\Darrigo\FeaturedBanners
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
class WidgetManagerTest extends TestCase
{
    public function testItShouldReturnAnInstance()
    {
        $manager = new WidgetManager();
        $instance = $manager->update(['a' => 1], []);

        $this->assertArrayHasKey('a', $instance);
    }
}
