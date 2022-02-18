<?php


namespace ValanticSpryker\Service\Newrelic;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Service\Kernel\AbstractService;

/**
 * @method \ValanticSpryker\Service\Newrelic\NewrelicServiceFactory getFactory()
 */
class NewrelicService extends AbstractService implements NewrelicServiceInterface
{
    /**
     * Add custom attributes
     *
     * @api
     *
     * @param array $attributes
     *
     * @return void
     */
    public function addCustomAttributes(array $attributes): void
    {
        $this->getFactory()->createNewrelicHandler()->addCustomAttributes($attributes);
    }

    /**
     * Add transaction name
     *
     * @api
     *
     * @param string $name
     *
     * @return void
     */
    public function addTransactionName(string $name): void
    {
        $this->getFactory()->createNewrelicHandler()->addTransactionName($name);
    }

    /**
     * Record custom event
     *
     * @api
     *
     * @param string $name
     * @param array $attributes
     *
     * @return void
     */
    public function recordCustomEvent(string $name, array $attributes): void
    {
        $this->getFactory()->createNewrelicHandler()->recordCustomEvent($name, $attributes);
    }

    /**
     * Add Customer specific attributes
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return void
     */
    public function addCustomerAttributes(CustomerTransfer $customer): void
    {
        $this->getFactory()->createNewrelicHandler()->addCustomerAttributes($customer);
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
        $this->getFactory()->createNewrelicHandler()->addCustomTracer($className);
    }
}
