<?php
namespace Tests\Darrigo\WeeklyOffers\Service;

use PHPUnit\Framework\TestCase;
use Darrigo\WpPluginUtils\Model\Instance;
use Darrigo\FeaturedBanners\Validator\InstanceValidator;
use Darrigo\FeaturedBanners\Util\Sanitizer;

class InstanceValidatorTest extends TestCase
{
    /**
     * @param $instance
     * @dataProvider instanceProvider
     */
    public function testItShouldReturnASanitizedInstance($instance)
    {
        $sanitizer = $this->getMockBuilder(Sanitizer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $sanitizer->expects($this->exactly($instance->count()))
            ->method('sanitize');

        $validator = new InstanceValidator($sanitizer);
        $validator->validate($instance);
    }

    /**
     * @return array
     */
    public function instanceProvider()
    {
        return [
            [new Instance(['value' => '<p>Ciao</p>'])],
            [new Instance(['id' => 0, 'value' => '<p>Ciao</p>']),],
            [new Instance(['name' => 'xyz', 'value' => '<p>Ciao</p>']),],
        ];
    }
}
