<?php declare(strict_types = 1);

namespace ValanticSpryker\Service\Newrelic\Formatter;

class SimpleArrayFormatter implements ArrayFormatterInterface
{
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

        if (is_array($array[$key])) {
            $newArray = $this->calculate($array[$key], $newKey . '.' . $key, $newArray);
        } else {
            $newArray[$newKey . '.' . $key] = $array[$key];
        }

        unset($array[$key]);

        if (!$array) {
            return $newArray;
        }

        return $this->calculate($array, $newKey, $newArray);
    }
}
