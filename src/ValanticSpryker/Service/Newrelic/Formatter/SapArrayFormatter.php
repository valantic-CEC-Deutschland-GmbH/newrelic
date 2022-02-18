<?php

namespace Pyz\Service\Newrelic\Formatter;

class SapArrayFormatter implements ArrayFormatterInterface
{
    private const ITEM_DETAIL = [
        'ITM_NUMBER',
        'MATERIAL',
        'REQ_QTY',
        'S_UNIT_ISO',
    ];

    /**
     * @param array $input
     *
     * @return array
     */
    public function format(array $input): array
    {
        return $this->calculate($input);
    }

    /**
     * @param array $array
     * @param string $newKey
     * @param array $newArray
     *
     * @return array
     */
    private function calculate(array $array, string $newKey = 'payload', array $newArray = []): array
    {
        $key = key($array);

        if (empty($array) || isset($key) === false) {
            return $newArray;
        }
        if (strpos($newKey, 'ORDER_ITEMS_IN') !== false && $newKey !== 'payload.ORDER_ITEMS_IN') {
            if (is_array($array[$key])) {
                $newArray = $this->calculate($array[$key], $newKey, $newArray);
            } elseif (isset($newArray[$newKey])) {
                if (is_string($array[$key])) {
                    $newArray[$newKey] .= ';"' . $array[$key] . '"';
                } else {
                    $newArray[$newKey] .= ';' . $array[$key];
                }
            } else {
                $newArray[$newKey] = $array[$key];
            }
        }
        if (is_array($array[$key])) {
            $newArray = $this->calculate($array[$key], $newKey . '.' . $key, $newArray);
        } elseif (!in_array($key, self::ITEM_DETAIL, true)) {
            $newArray[$newKey . '.' . $key] = $array[$key];
        }

        unset($array[$key]);

        return $this->calculate($array, $newKey, $newArray);
    }
}
