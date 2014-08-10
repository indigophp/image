<?php

/*
 * This file is part of the Indigo Image package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Unit\Filter;

use Indigo\Image\Filter\DummyFilter;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Tests for AbstractFilter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Image\Filter\AbstractFilter
 * @group              Image
 * @group              Filter
 */
class FilterTest extends AbstractFilterTest
{
    public function _before()
    {
        $this->filter = new DummyFilter;
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $data = [];

        $filter = new DummyFilter($data);

        $this->assertEquals($data, $filter->getData());
    }

    /**
     * @covers ::getData
     * @covers ::setData
     */
    public function testData()
    {
        $this->assertSame($this->filter, $this->filter->setData([]));
        $this->assertEquals([], $this->filter->getData());
    }
}
