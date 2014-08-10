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
 * Basic Filter
 *
 * Applies filters based on input data
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class BasicFilter extends AbstractFilter
{
    /**
     * Alias to getData
     *
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return $this->getData();
    }

    /**
     * {@inheritdoc}
     */
    public function applyFilter(Image $image)
    {
        foreach ($this->data as $filter => $data) {
            if (is_int($filter)) {
                $filter = $data;
                $data = [];
            }

            $callable = [$image, $filter];

            if (is_callable($callable)) {
                call_user_func_array($callable, (array) $data);
            }
        }

        return $image;
    }
}
