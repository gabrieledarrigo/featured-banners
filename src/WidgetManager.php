<?php
namespace Darrigo\FeaturedBanners;

use Darrigo\FeaturedBanners\Model\Banner;
use Darrigo\FeaturedBanners\Model\Field;
use Darrigo\WpPluginUtils\Model\Collection;
use DI\ContainerBuilder;;
use Darrigo\WpPluginUtils\View\View;
use Darrigo\WpPluginUtils\Model\Instance;
use Darrigo\FeaturedBanners\Container\Definitions;
use Darrigo\FeaturedBanners\Validator\InstanceValidator;

/**
 * Class WidgetManager
 * @package Darrigo\FeaturedBanners
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
class WidgetManager extends \WP_Widget
{
    /**
     * @var \DI\Container
     */
    private $container;

    /**
     * @var InstanceValidator
     */
    private $instanceValidator;

    /**
     * WidgetManager constructor.
     */
    public function __construct()
    {
        $this->container = (new ContainerBuilder())->addDefinitions(Definitions::get())->build();
        $this->instanceValidator = $this->container->get(InstanceValidator::class);

        parent::__construct(
            $this->container->get('widget.id'),
            $this->container->get('widget.title'),
            ['description' => $this->container->get('widget.description')]
        );
    }

    public function widget($args, $instance)
    {
        (new View($this->container->get('view.banner'), new Collection([
            'banner' => Banner::fromInstance(new Instance($instance))
        ])))->render();
    }

    /**
     * @param $instance
     * @throws \DI\NotFoundException
     */
    public function form($instance)
    {
        (new View($this->container->get('view.form'), new Collection([
            'fields' => new Collection([
                'banner_uri' => new Field($this->getFieldId('banner_uri'), $this->getFieldName('banner_uri')),
                'banner_image' => new Field($this->getFieldId('banner_image'), $this->getFieldName('banner_image')),
            ]),
            'banner' => Banner::fromInstance(new Instance($instance))
        ])))->render();
    }

    /**
     * @param $newInstance
     * @param $oldInstance
     * @return Instance
     */
    public function update($newInstance, $oldInstance)
    {
        return $this->instanceValidator->validate(new Instance($newInstance))->__toArray();
    }

    /**
     * Wrap infamous WordPress snake case syntax.
     * @param $id
     * @return mixed
     */
    private function getFieldId($id)
    {
        return $this->get_field_id($id);
    }

    /**
     * Wrap infamous WordPress snake case syntax.
     * @param $name
     * @return mixed
     */
    private function getFieldName($name)
    {
        return $this->get_field_name($name);
    }
}