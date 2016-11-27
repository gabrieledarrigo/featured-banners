<?php
namespace Tests\Darrigo\FeaturedBanners;

use Darrigo\FeaturedBanners\Model\Field;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{
    public function testItRepresentAFieldWithIdAndName()
    {
        $raw = [
            Field::ID => 'widget-12-xyz',
            Field::NAME => 'widget-23[id][name]'
        ];

        $field = new Field($raw[Field::ID], $raw[Field::NAME]);
        $this->assertEquals($raw[Field::ID], $field->getId());
        $this->assertEquals($raw[Field::NAME], $field->getName());
        $this->assertEquals($raw, $field->__toArray());
    }
}