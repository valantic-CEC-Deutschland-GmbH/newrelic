<?php

use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\Propel\PropelConstants;

$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;
$config[KernelConstants::PROJECT_NAMESPACE] = 'Pyz';
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'ValanticSpryker',
    'ValanticSprykerSupport',
    'Pyz',
];

$config[KernelConstants::CORE_NAMESPACES] = [

    'Spryker'
];

$config[\Spryker\Shared\Propel\PropelConstants::ZED_DB_ENGINE] = \Spryker\Zed\Propel\PropelConfig::DB_ENGINE_PGSQL;
$config[\Spryker\Shared\Propel\PropelConstants::ZED_DB_USERNAME] = '';

$config[\Spryker\Shared\Propel\PropelConstants::ZED_DB_PASSWORD] = '';
$config[PropelConstants::ZED_DB_HOST] = getenv('SPRYKER_DB_HOST');
$config[PropelConstants::ZED_DB_PORT] = getenv('SPRYKER_DB_PORT');
$config[PropelConstants::ZED_DB_USERNAME] = getenv('SPRYKER_DB_USERNAME');
$config[PropelConstants::ZED_DB_PASSWORD] = getenv('SPRYKER_DB_PASSWORD');
$config[PropelConstants::ZED_DB_DATABASE] = getenv('SPRYKER_DB_DATABASE');
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = false;

/**
$config[KernelConstants::ENABLE_CONTAINER_OVERRIDING] = true;
$config[KernelConstants::PROJECT_NAMESPACE] = 'Pyz';
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[KernelConstants::CORE_NAMESPACES] = [
    'Spryker',
    'ValanticSpryker',
];

$config[PropelConstants::ZED_DB_HOST] = getenv('SPRYKER_DB_HOST');
$config[PropelConstants::ZED_DB_PORT] = getenv('SPRYKER_DB_PORT');
$config[PropelConstants::ZED_DB_USERNAME] = getenv('SPRYKER_DB_USERNAME');
$config[PropelConstants::ZED_DB_PASSWORD] = getenv('SPRYKER_DB_PASSWORD');
$config[PropelConstants::ZED_DB_DATABASE] = getenv('SPRYKER_DB_DATABASE');
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = false;
*/
