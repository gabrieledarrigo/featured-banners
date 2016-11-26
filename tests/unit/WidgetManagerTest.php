<?php
namespace Tests\Darrigo\FeaturedBanners;

use PHPUnit\Framework\TestCase;

/**
 * Class WidgetManagerTest
 * @package Tests\Darrigo\FeaturedBanners
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
class WidgetManagerTest extends TestCase
{

    public function testEq()
    {
        $this->assertEquals(1, 1);
    }

//    public function testItShouldReturnAnInstanceWithProductIdAndProductPrice()
//    {
//        $manager = new WidgetManager();
//        $instance = $manager->update([], []);
//
//        $this->assertArrayHasKey(Instance::PRODUCT_ID, $instance);
//        $this->assertEquals('', $instance[Instance::PRODUCT_ID]);
//
//        $instance = $manager->update([Instance::PRODUCT_ID => 122], []);
//        $this->assertArrayHasKey(Instance::PRODUCT_ID, $instance);
//        $this->assertEquals(122, $instance[Instance::PRODUCT_ID]);
//    }
}
