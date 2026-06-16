<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function processStr(string $s): string
    {
        $result = '';

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if (ctype_lower($char)) {
                // Append lowercase letter
                $result .= $char;
            } elseif ($char === '*') {
                // Remove last character if exists
                if (strlen($result) > 0) {
                    $result = substr($result, 0, -1);
                }
            } elseif ($char === '#') {
                // Duplicate current result and append to itself
                $result .= $result;
            } elseif ($char === '%') {
                // Reverse current result
                $result = strrev($result);
            }
        }

        return $result;
    }
}