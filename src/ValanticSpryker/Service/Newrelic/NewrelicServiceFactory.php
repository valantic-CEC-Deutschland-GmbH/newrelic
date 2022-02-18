<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Service\Newrelic;

use Pyz\Service\Newrelic\Collector\CustomerPropertiesCollector;
use Pyz\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface;
use Pyz\Service\Newrelic\Formatter\SapArrayFormatter;
use Pyz\Service\Newrelic\Handler\NewrelicHandler;
use Spryker\Service\Kernel\AbstractServiceFactory;

/**
 * Class NewrelicServiceFactory
 */
class NewrelicServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \Pyz\Service\Newrelic\Handler\NewrelicHandler
     */
    public function createNewrelicHandler(): NewrelicHandler
    {
        return new NewrelicHandler(
            $this->createSapArrayFormatter(),
            $this->createCustomerPropertiesCollector()
        );
    }

    /**
     * @return \Pyz\Service\Newrelic\Formatter\SapArrayFormatter
     */
    public function createSapArrayFormatter(): SapArrayFormatter
    {
        return new SapArrayFormatter();
    }

    /**
     * @return \Pyz\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface
     */
    private function createCustomerPropertiesCollector(): CustomerPropertiesCollectorInterface
    {
        return new CustomerPropertiesCollector();
    }
}
