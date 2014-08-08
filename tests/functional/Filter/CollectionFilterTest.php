<?php

/*
 * This file is part of the Indigo Image package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Functional\Filter;

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
class CollectionFilterTest extends BasicFilterTest
{
	public function _before()
	{
		parent::_before();

		$this->filter = new CollectionFilter(array($this->filter));
	}
}
