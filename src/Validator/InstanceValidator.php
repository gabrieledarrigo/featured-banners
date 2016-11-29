<?php
namespace Darrigo\FeaturedBanners\Validator;

use Darrigo\FeaturedBanners\Util\Sanitizer;
use Darrigo\WpPluginUtils\Model\Instance;
use Darrigo\WpPluginUtils\Utils\ArrayCheck;
use Darrigo\WpPluginUtils\Utils\IsEmpty;

/**
 * Class InstanceValidator
 * @package Darrigo\FeaturedBanners\Validator
 * @author Gabriele D'Arrigo - darrigo.g@gmail.com
 */
class InstanceValidator
{
    use ArrayCheck, IsEmpty;

    /**
     * @var Sanitizer
     */
    protected $sanitizer;

    /**
     * InstanceValidator constructor.
     * @param Sanitizer $sanitizer
     */
    public function __construct(Sanitizer $sanitizer)
    {
        $this->sanitizer = $sanitizer;
    }

    /**
     * @param Instance $instance
     * @return Instance
     */
    public function validate(Instance $instance)
    {
        foreach ($instance->__toArray() as $key => $value) {
            $instance->offsetSet($key, $this->sanitizer->sanitize($value));
        }

        return $instance;
    }
}