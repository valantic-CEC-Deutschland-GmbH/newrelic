<?php declare(strict_types = 1);

namespace Pyz\Service\Newrelic;

use Generated\Shared\Transfer\CustomerTransfer;

interface NewrelicServiceInterface
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
    public function addCustomAttributes(array $attributes): void;

    /**
     * Add transaction name
     *
     * @api
     *
     * @param string $name
     *
     * @return void
     */
    public function addTransactionName(string $name): void;

    /**
     * Record custom events
     *
     * @api
     *
     * @param string $name
     * @param array $attributes
     *
     * @return void
     */
    public function recordCustomEvent(string $name, array $attributes): void;

    /**
     * Add customer specific attributes
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return void
     */
    public function addCustomerAttributes(CustomerTransfer $customer): void;

    /**
     * Add custom tracer
     *
     * @api
     *
     * @param string $className
     *
     * @return void
     */
    public function addCustomTracer(string $className): void;

    /**
     * Format Sap Array
     *
     * @api
     *
     * @param array $attributes
     *
     * @return array
     */
    public function formatSapArray(array $attributes): array;
}
