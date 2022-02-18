<?php


namespace ValanticSpryker\Service\Newrelic;

use Spryker\Service\Kernel\AbstractServiceFactory;
use ValanticSpryker\Service\Newrelic\Collector\CustomerPropertiesCollector;
use ValanticSpryker\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface;
use ValanticSpryker\Service\Newrelic\Formatter\ArrayFormatterInterface;
use ValanticSpryker\Service\Newrelic\Formatter\SimpleArrayFormatter;
use ValanticSpryker\Service\Newrelic\Handler\NewrelicHandler;

/**
 * Class NewrelicServiceFactory
 */
class NewrelicServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \ValanticSpryker\Service\Newrelic\Handler\NewrelicHandler
     */
    public function createNewrelicHandler(): NewrelicHandler
    {
        return new NewrelicHandler(
            $this->createSimpleArrayFormatter(),
            $this->createCustomerPropertiesCollector(),
        );
    }

    /**
     * @return \ValanticSpryker\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface
     */
    private function createCustomerPropertiesCollector(): CustomerPropertiesCollectorInterface
    {
        return new CustomerPropertiesCollector();
    }

    /**
     * @return \ValanticSpryker\Service\Newrelic\Formatter\ArrayFormatterInterface
     */
    private function createSimpleArrayFormatter(): ArrayFormatterInterface
    {
        return new SimpleArrayFormatter();
    }
}
