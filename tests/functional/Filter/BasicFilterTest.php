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
	public function _before()
	{
		$filters = [
			'resize' => [
				'width'  => 10,
				'height' => 10,
				'callback' => function($size) {
					$size->aspectRatio();
				},
			],
			'backup',
		];

		$this->filter = new BasicFilter($filters);
	}

	/**
	 * @covers ::applyFilter
	 */
	public function testFilter()
	{
		$image = Image::make(__DIR__.'/../../../resources/10x20.png');

		$image->filter($this->filter);

		$actual = __DIR__.'/../../_output/image.png';
		$expected = __DIR__.'/../../../resources/5x10.png';

		$image->save($actual);

		$this->assertFileEquals($expected, $actual);
	}
}
