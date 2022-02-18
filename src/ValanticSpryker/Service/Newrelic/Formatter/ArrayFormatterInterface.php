<?php

namespace Pyz\Service\Newrelic\Formatter;

interface ArrayFormatterInterface
{
    /**
     * @param array $input
     *
     * @return array
     */
    public function format(array $input): array;
}
