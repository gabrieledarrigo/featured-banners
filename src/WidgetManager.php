<?php
namespace Darrigo\FeaturedBanners;

use DI\ContainerBuilder;
use Darrigo\FeaturedBanners\Container\Definitions;
use Darrigo\WpPluginUtils\View\View;

class WidgetManager extends \WP_Widget
{
    /**
     * @var \DI\Container
     */
    private $container;

    /**
     * WidgetManager constructor.
     */
    public function __construct()
    {
        $this->container = (new ContainerBuilder())->addDefinitions(Definitions::get())->build();

        parent::__construct(
            $this->container->get('widget.id'),
            $this->container->get('widget.title'),
            ['description' => $this->container->get('widget.description')]
        );
    }

    public function widget($args, $instance)
    {

    }

    public function form($instance)
    {
        (new View($this->container->get('view.form'), [
            'fields' => [
                'banner_uri' => [
                    'id' => $this->get_field_id('banner_uri'),
                    'name' => $this->get_field_name('banner_uri'),
                ],
                'banner_image' => [
                    'id' => $this->get_field_id('banner_image'),
                    'name' => $this->get_field_name('banner_image'),
                ]
            ],
            'instance' => $instance
        ]))->render();
    }

    public function update($newInstance, $oldInstance)
    {
        $instance = [];
        $instance['banner_uri'] = isset($newInstance['banner_uri']) ? strip_tags($newInstance['banner_uri']) : '';
        $instance['banner_image'] = isset($newInstance['banner_image']) ? strip_tags($newInstance['banner_image']) : '';
        return $instance;
    }
}