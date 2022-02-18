<?php

namespace ValanticSpryker\Service\Newrelic\Collector;

use Generated\Shared\Transfer\CustomerTransfer;

class CustomerPropertiesCollector implements CustomerPropertiesCollectorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return array
     */
    public function getCustomerProperties(CustomerTransfer $customer): array
    {
        $attributes = [
            'customer.email' => $customer->getEmail(),
            'customer.id' => $customer->getIdCustomer(),
            'customer.is_guest' => $customer->getIsGuest(),
        ];

        return $attributes;
    }
}
