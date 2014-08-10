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

use Codeception\TestCase\Test;

/**
 * Tests for Filters
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractFilterTest extends Test
{
    /**
     * Filter object
     *
     * @var Intervention\Image\Filters\FilterInterface
     */
    protected $filter;

    /**
     * Removes any file left
     */
    public function _after()
    {
        if (is_file(__DIR__.'/../../_output/image.png')) {
            unlink(__DIR__.'/../../_output/image.png');
        }
    }
}
