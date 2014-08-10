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

use Indigo\Image\Filter\CollectionFilter;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Tests for CollecionFilter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Image\Filter\CollectionFilter
 * @group              Image
 * @group              Filter
 */
class CollectionFilterTest extends AbstractFilterTest
{
    /**
     * @covers ::addFilter
     */
    public function testFilter()
    {
        $collection = new CollectionFilter;
        $filter = \Mockery::mock('Intervention\\Image\\Filters\\FilterInterface');

        $this->assertSame($collection, $collection->addFilter($filter));
        $this->assertEquals([$filter], $collection->getFilters());
    }
}
