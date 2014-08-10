<?php

/*
 * This file is part of the Indigo Image module.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Image\Job;

use Indigo\Queue\Job\JobInterface;
use Indigo\Queue\Manager\ManagerInterface;
use Intervention\Image\Image;

/**
 * Filter Job
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class FilterJob implements JobInterface
{
    /**
     * {@inheritdoc}
     */
    public function execute(ManagerInterface $manager)
    {
        $payload = $manager->getPayload();

        $data = $payload['data'];

        $filter = $this->resolveFilter($manager);

        $image = Image::make($data['path']);

        $image->filter($filter);

        $quality = isset($data['quality']) ? $data['quality'] : null;
        $save = isset($data['save']) ? $data['save'] : $data['path'];

        $image->save($save, $quality);
    }

    /**
     * Returns new filter instance
     *
     * @param ManagerInterface $manager
     *
     * @return FilterInterface
     */
    protected function resolveFilter(ManagerInterface $manager)
    {
        $payload = $manager->getPayload();

        $data = $payload['data'];

        $class = $data['filter'];

        if (is_subclass_of($class, 'Indigo\\Image\\Filter\\AbstractQueueFilter')) {
            return new $class($manager);
        } elseif (is_subclass_of($class, 'Indigo\\Queue\\Job\\FactoryInterface')) {
            return $class::factory($manager);
        } elseif (isset($data['closure'])) {
            return $data['closure']($manager);
        } elseif (is_subclass_of($class, 'Indigo\\Image\\Filter\\AbstractFilter')) {
            return new $class($data);
        }

        return new $class;
    }

    /**
     * {@inheritdoc}
     */
    public function fail(ManagerInterface $manager, \Exception $e)
    {
        return true;
    }
}
