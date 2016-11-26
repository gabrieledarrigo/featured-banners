<?php
/**
 * Created by PhpStorm.
 * User: gabriele
 * Date: 26/11/2016
 * Time: 18:49
 */

namespace Tests\Darrigo\FeaturedBanners;

use Darrigo\FeaturedBanners\Model\Banner;
use Darrigo\WpPluginUtils\Model\Instance;
use PHPUnit\Framework\TestCase;

class BannerTest extends TestCase
{
    protected $uri = "http://www.google.com";
    
    protected $image = "http://www.mazzucchellis.com/img/img.png";
    
    public function testItIsABannerWithUriAndImage()
    {
        $banner = new Banner($this->uri, $this->image);

        $this->assertEquals($this->uri, $banner->getUri());
        $this->assertEquals($this->image, $banner->getImage());
    }

    public function testItCanReturnAnArrayRappresentation()
    {
       
        $banner = new Banner($this->uri, $this->image);

        $this->assertEquals([
            Banner::BANNER_URI => $this->uri,
            Banner::BANNER_IMAGE => $this->image,
        ], $banner->__toArray());
    }
    
    public function testItCanBeCreatedFromAnInstance()
    {
        $instance = new Instance([
            Banner::BANNER_URI => $this->uri,
            Banner::BANNER_IMAGE => $this->image,
        ]);
        $banner = Banner::fromInstance($instance);

        $this->assertInstanceOf(Banner::class, $banner);
        $this->assertEquals($instance->__toArray(), $banner->__toArray());
    }

    public function testItCanBeCreatedFromAnEmptyInstance()
    {
        $instance = new Instance([]);
        $banner = Banner::fromInstance($instance);
        $raw = $banner->__toArray();

        $this->assertInstanceOf(Banner::class, $banner);
        $this->assertArrayHasKey(Banner::BANNER_URI, $raw);
        $this->assertArrayHasKey(Banner::BANNER_IMAGE, $raw);
        $this->assertEquals('', $raw[Banner::BANNER_URI]);
        $this->assertEquals('', $raw[Banner::BANNER_IMAGE]);
    }
}