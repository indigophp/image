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

		$class = $data['filter'];

		// Instantiate Filter
		if (is_subclass_of($class, 'Indigo\\Image\\Filter\\QueueFilter'))
		{
			$filter = new $class($manager);
		}
		elseif (isset($data['closure']))
		{
			$filter = $data['closure']($manager);
		}
		else
		{
			$filter = new $class;
		}

		$image = Image::make($data['path']);

		$image->filter($filter);

		$quality = isset($data['quality']) ? $data['quality'] : null;
		$save = isset($data['save']) ? $data['save'] : $data['path'];

		$image->save($save, $quality);
	}

	/**
	 * {@inheritdoc}
	 */
	public function fail(ManagerInterface $manager, \Exception $e)
	{
		return true;
	}
}
