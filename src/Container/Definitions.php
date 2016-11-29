<?php
namespace Darrigo\FeaturedBanners\Container;

use Darrigo\FeaturedBanners\Config\WidgetSettings;
use Darrigo\FeaturedBanners\Util\Sanitizer;
use Darrigo\FeaturedBanners\Validator\InstanceValidator;

/**
 * Class Definitions
 * @package Darrigo\FeaturedBanners\Container
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
final class Definitions
{
    /**
     * @return array
     */
    private static function values()
    {
        return [
            'widget.id' => WidgetSettings::ID,
            'widget.title' => WidgetSettings::TITLE,
            'widget.description' => WidgetSettings::DESCRIPTION,
            'view.banner' => realpath(dirname(dirname(__DIR__))) . '/resources/templates/_banner.php',
            'view.form' => realpath(dirname(dirname(__DIR__))) . '/resources/templates/_form.php',
        ];
    }

    /**
     * @return array
     */
    private static function services()
    {
        return [
            Sanitizer::class => function() {
                return new Sanitizer();
            },
            InstanceValidator::class => function(Sanitizer $sanitizer) {
                return new InstanceValidator($sanitizer);
            }
        ];
    }

    /**
     * @return array
     */
    public static function get()
    {
        return array_merge(self::values(), self::services());
    }
}