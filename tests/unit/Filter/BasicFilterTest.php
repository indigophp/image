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

use Indigo\Image\Filter\BasicFilter;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Tests for BasicFilter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Image\Filter\BasicFilter
 * @group              Image
 * @group              Filter
 */
class BasicFilterTest extends AbstractFilterTest
{
	/**
	 * @covers ::__construct
	 * @covers ::getFilters
	 */
	public function testConstruct()
	{
		$filters = [];

		$filter = new BasicFilter($filters);

		$this->assertEquals($filters, $filter->getFilters());
	}
}
