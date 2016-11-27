<?php
namespace Darrigo\FeaturedBanners\Model;

use Darrigo\WpPluginUtils\Model\Instance;
use Darrigo\WpPluginUtils\Model\ViewModel;

final class Banner extends ViewModel
{
    const BANNER_URI = 'banner_uri';

    const BANNER_IMAGE = 'banner_image';

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $image;

    /**
     * Banner constructor.
     *
     * @param $uri
     * @param $image
     */
    public function __construct($uri, $image)
    {
        $this->uri = $uri;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            self::BANNER_URI => $this->getUri(),
            self::BANNER_IMAGE => $this->getImage(),
        ];
    }

    /**
     * @param Instance $instance
     * @return Banner
     */
    public static function fromInstance(Instance $instance)
    {
        return new self(
            $instance->offsetExists(self::BANNER_URI)
                ? $instance->offsetGet(self::BANNER_URI)
                : '',
            $instance->offsetExists(self::BANNER_IMAGE)
                ? $instance->offsetGet(self::BANNER_IMAGE)
                : ''
        );
    }
}