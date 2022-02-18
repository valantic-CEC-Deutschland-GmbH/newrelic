<?php

namespace ValanticSprykerTest\Service\Newrelic\Formatter;

use Codeception\Test\Unit;
use ValanticSpryker\Service\Newrelic\Formatter\SimpleArrayFormatter;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Service
 * @group Newrelic
 * @group Formatter
 * @group SimpleArrayFormatterTest
 * Add your own group annotations below this line
 * @group Nxs
 */
class SimpleArrayFormatterTest extends Unit
{
    /**
     * @return void
     */
    public function testFormat()
    {
        $input = [
            'test' => 12345,
            'ORDERS_IN' => [
                [
                    'article' => 567655,
                    'quantity' => 4,
                ],
                [
                    'article' => 898,
                    'quantity' => 2,
                ],
                [
                    'article' => 77756,
                    'quantity' => 1,
                    'sub' => [
                        [
                            'property_1' => 'ABC',
                            'property_2' => 'ZYX',
                        ],
                        [
                            'property_1' => 'ZZZZ',
                            'property_2' => 'AAAAA',
                        ],
                    ],
                ],
            ],
            'PARTNERS_OUT' => [
                [
                    'name' => 'Hans',
                    'address' => 'Here',
                ],
            ],
        ];

        $result = (new SimpleArrayFormatter())->format($input);

        $this->assertEquals(12345, $result['payload.test']);
        $this->assertEquals(567655, $result['payload.ORDERS_IN.0.article']);
        $this->assertEquals(4, $result['payload.ORDERS_IN.0.quantity']);
        $this->assertEquals(898, $result['payload.ORDERS_IN.1.article']);
        $this->assertEquals(2, $result['payload.ORDERS_IN.1.quantity']);
        $this->assertEquals(77756, $result['payload.ORDERS_IN.2.article']);
        $this->assertEquals(1, $result['payload.ORDERS_IN.2.quantity']);
        $this->assertEquals('ABC', $result['payload.ORDERS_IN.2.sub.0.property_1']);
        $this->assertEquals('ZYX', $result['payload.ORDERS_IN.2.sub.0.property_2']);
        $this->assertEquals('ZZZZ', $result['payload.ORDERS_IN.2.sub.1.property_1']);
        $this->assertEquals('AAAAA', $result['payload.ORDERS_IN.2.sub.1.property_2']);
        $this->assertEquals('Hans', $result['payload.PARTNERS_OUT.0.name']);
        $this->assertEquals('Here', $result['payload.PARTNERS_OUT.0.address']);
    }
}
