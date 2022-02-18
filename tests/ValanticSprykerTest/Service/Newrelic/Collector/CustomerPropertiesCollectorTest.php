<?php

namespace ValanticSprykerTest\Service\Newrelic\Collector;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CustomerTransfer;
use ValanticSpryker\Service\Newrelic\Collector\CustomerPropertiesCollector;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Service
 * @group Newrelic
 * @group Collector
 * @group CustomerPropertiesCollectorTest
 * Add your own group annotations below this line
 * @group Nxs
 */
class CustomerPropertiesCollectorTest extends Unit
{
    /**
     * @return void
     */
    public function testGetCustomerProperties()
    {
        $email = 'test@test.de';

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($email);

        $customerPropertiesCollector = new CustomerPropertiesCollector();
        $result = $customerPropertiesCollector->getCustomerProperties($customerTransfer);

        $this->assertEquals($email, $result['customer.email']);
    }
}
