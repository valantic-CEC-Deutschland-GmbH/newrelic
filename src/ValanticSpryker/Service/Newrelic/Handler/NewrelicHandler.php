<?php

declare(strict_types = 1);

namespace Pyz\Service\Newrelic\Handler;

use Exception;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface;
use Pyz\Service\Newrelic\Formatter\ArrayFormatterInterface;

class NewrelicHandler
{
    /**
     * @var \Pyz\Service\Newrelic\Formatter\ArrayFormatterInterface
     */
    private $arrayFormatter;

    /**
     * @var \Pyz\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface
     */
    private $customerPropertiesCollector;

    /**
     * @param \Pyz\Service\Newrelic\Formatter\ArrayFormatterInterface $arrayFormatter
     * @param \Pyz\Service\Newrelic\Collector\CustomerPropertiesCollectorInterface $customerPropertiesCollector
     */
    public function __construct(ArrayFormatterInterface $arrayFormatter, CustomerPropertiesCollectorInterface $customerPropertiesCollector)
    {
        $this->arrayFormatter = $arrayFormatter;
        $this->customerPropertiesCollector = $customerPropertiesCollector;
    }

    /**
     * @api Add custom attributes
     *
     * @param array $attributes
     *
     * @return void
     */
    public function addCustomAttributes(array $attributes): void
    {
        if ($this->isNewrelicEnabled()) {
            try {
                $formattedAttributes = $this->arrayFormatter->format($attributes);

                foreach ($formattedAttributes as $key => $attribute) {
                    newrelic_add_custom_parameter($key, $attribute);
                }
            } catch (Exception $ex) {
                //Nothing happens
            }
        }
    }

    /**
     * @api Add transaction name
     *
     * @param string $name
     *
     * @return void
     */
    public function addTransactionName(string $name): void
    {
        if ($this->isNewrelicEnabled()) {
            newrelic_name_transaction($name);
        }
    }

    /**
     * @api Record custom events
     *
     * @param string $name
     * @param array $attributes
     *
     * @return void
     */
    public function recordCustomEvent(string $name, array $attributes): void
    {
        if ($this->isNewrelicEnabled()) {
            try {
                newrelic_record_custom_event($name, $attributes);
            } catch (Exception $ex) {
                //Nothing happens
            }
        }
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return void
     */
    public function addCustomerAttributes(CustomerTransfer $customer): void
    {
        if ($this->isNewrelicEnabled()) {
            $customerAttributes = $this->customerPropertiesCollector->getCustomerProperties($customer);
            $this->addCustomAttributes($customerAttributes);
        }
    }

    /**
     * Add custom tracer
     *
     * @api
     *
     * @param string $className
     *
     * @return void
     */
    public function addCustomTracer(string $className): void
    {
        if ($this->isNewrelicEnabled()) {
            try {
                newrelic_add_custom_tracer($className);
            } catch (Exception $ex) {
                //Nothing happens
            }
        }
    }

    /**
     * @return bool
     */
    private function isNewrelicEnabled(): bool
    {
        return extension_loaded('newrelic');
    }
}
