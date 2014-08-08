<?php

/*
 * This file is part of the Indigo Image package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Image\Filter;

use Intervention\Image\Image;

/**
 * Dummy Queue Filter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyQueueFilter extends QueueFilter
{
    public function applyFilter(Image $image)
    {
        return $image;
    }
}
