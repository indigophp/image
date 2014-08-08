<?php

/*
 * This file is part of the Indigo Image module.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Image\Filter;

use Indigo\Queue\Manager\ManagerInterface;
use Intervention\Image\Filters\FilterInterface;

/**
 * Abstract Filter Class
 *
 * Use this class with Queue
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class QueueFilter implements FilterInterface
{
    /**
     * Manager object
     *
     * @var ManagerInterface
     */
    protected $manager;

    /**
     * Creates a new filter
     *
     * @param ManagerInterface $manager
     */
    public function __construct(ManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Returns the manager
     *
     * @return ManagerInterface
     */
    public function getManager()
    {
        return $this->manager;
    }
}
