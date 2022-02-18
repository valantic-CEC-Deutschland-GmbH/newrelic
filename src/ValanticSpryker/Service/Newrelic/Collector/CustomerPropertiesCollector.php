<?php

namespace Pyz\Service\Newrelic\Collector;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
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
            'username' => $customer->getEmail(),
            'customernumber' => $customer->getCustomerNumber(),
        ];

        $companyUser = $customer->getCompanyUserTransfer();
        if ($companyUser !== null) {
            $attributes['companyid'] = $companyUser->getCompany()->getIdCompany();
            $attributes['roles'] = $this->getCustomerRoles($companyUser->getCompanyRoleCollection());
        }

        return $attributes;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer|null $companyRoleCollectionTransfer
     *
     * @return string
     */
    private function getCustomerRoles(?CompanyRoleCollectionTransfer $companyRoleCollectionTransfer): string
    {
        $roles = '';
        foreach ($companyRoleCollectionTransfer->getRoles() as $companyRole) {
            $roles = $roles . ', ' . $companyRole->getName();
        }
        return $roles;
    }
}
