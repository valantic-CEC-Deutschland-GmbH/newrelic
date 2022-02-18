<?php

namespace Pyz\Service\Newrelic\Collector;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerPropertiesCollectorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return array
     */
    public function getCustomerProperties(CustomerTransfer $customer): array;
}
