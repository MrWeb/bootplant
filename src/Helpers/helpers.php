<?php

if (!function_exists('can_null')) {
    /**
     * Receives an array or a string and returns is [non specificato] if empty
     * it flattens the array concatenating it with spaces or returns empty
     *
     * @param  array || string
     * @return string
     */
    function can_null($string, $fallback = '[non specificato]')
    {
        if (is_array($string)) {

            if (str_replace(" ", "", implode(" ", $string)) == "") {
                return $fallback;
            }

            return implode(" ", $string);

        }

        return $string ?? $fallback;

    }
}

if (!function_exists('money')) {
    /**
     * Ritorna money value with currency symbol
     *
     * @param  array  $array
     * @return array
     */
    function money( ? string $string, $can_null = false)
    {
        if ($can_null && $string == null) {
            return null;
        }
        return number_format($string, 0, ',', "'") . " €";
    }
}

if (!function_exists('array_concat')) {
    /**
     * Ritorna money value with currency symbol
     *
     * @param  array  $array
     * @return array
     */
    function array_concat(array $array, $delimiter = ",")
    {
        if ($delimiter != ",") {
            $delimiter = " ${delimiter} ";
        }

        $flat_array = [];

        foreach ($array as $key => $value) {
            if ($value != null) {
                array_push($flat_array, $value);
            }
        }

        return implode($delimiter . " ", $flat_array);
    }
}
