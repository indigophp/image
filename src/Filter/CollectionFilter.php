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
 * Collection Filter
 *
 * Applies a set of filters
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CollectionFilter implements FilterInterface
{
    /**
     * Filter definition
     *
     * @var FilterInterface[]
     */
    protected $filters = [];

    /**
     * Creates a new Collection Filter
     *
     * @param FilterInterface[] $filters
     */
    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * Returns the filter array
     *
     * @return FilterInterface[]
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Adds a new filter
     *
     * @param FilterInterface $filter
     *
     * @return this
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function applyFilter(Image $image)
    {
        foreach ($this->filters as $filter) {
            $image->filter($filter);
        }

        return $image;
    }
}
