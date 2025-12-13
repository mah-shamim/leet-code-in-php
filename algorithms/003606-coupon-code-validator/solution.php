<?php

class Solution {

    /**
     * @param String[] $code
     * @param String[] $businessLine
     * @param Boolean[] $isActive
     * @return String[]
     */
    function validateCoupons($code, $businessLine, $isActive) {
        $priority = ['electronics' => 0, 'grocery' => 1, 'pharmacy' => 2, 'restaurant' => 3];

        // Collect valid coupons with their properties
        $valid = [];
        for ($i = 0; $i < count($code); $i++) {
            if ($isActive[$i] &&
                isset($priority[$businessLine[$i]]) &&
                $code[$i] !== '' &&
                preg_match('/^[a-zA-Z0-9_]+$/', $code[$i])) {

                $valid[] = [
                    'code' => $code[$i],
                    'priority' => $priority[$businessLine[$i]]
                ];
            }
        }

        // Sort and extract codes
        usort($valid, fn($a, $b) =>
        $a['priority'] <=> $b['priority'] ?: strcmp($a['code'], $b['code']));

        return array_column($valid, 'code');
    }
}