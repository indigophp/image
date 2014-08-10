<?php

/*
 * This file is part of the Indigo Image package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Unit\Filter;

use Indigo\Image\Filter\DummyQueueFilter;

/**
 * Tests for QueueFilter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Image\Filter\AbstractQueueFilter
 */
class QueueFilterTest extends AbstractFilterTest
{
    /**
     * Default payload
     *
     * @var []
     */
    protected $payload = [];

    /**
     * Returns Manager mock
     *
     * @return ManagerInterface
     */
    public function getManagerMock()
    {
        $mock = \Mockery::mock('Indigo\\Queue\\Manager\\ManagerInterface');

        $mock->shouldReceive('getPayload')
            ->andReturn($this->payload)
            ->byDefault();

        return $mock;
    }

    /**
     * @covers ::__construct
     * @covers ::getManager
     */
    public function testConstruct()
    {
        $manager = $this->getManagerMock();

        $filter = new DummyQueueFilter($manager);

        $this->assertSame($manager, $filter->getManager());
    }
}
