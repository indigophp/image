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
use Intervention\Image\Filters\FilterInterface;

/**
 * Abstract Filter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractFilter implements FilterInterface
{
    /**
     * Data array
     *
     * @var []
     */
    protected $data = [];

    /**
     * Creates a new Filter
     *
     * @param [] $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Returns the data array
     *
     * @return []
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the data array
     *
     * @param array $data
     *
     * @return this
     */
    public function setData(array $data = [])
    {
    	$this->data = $data;

    	return $this;
    }
}
