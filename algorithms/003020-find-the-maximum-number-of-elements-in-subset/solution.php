<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumLength(array $nums): int
    {
        // Count frequencies
        $freq = [];
        foreach ($nums as $num) {
            $freq[$num] = ($freq[$num] ?? 0) + 1;
        }

        $maxLength = 1; // At minimum, we can pick any single element

        // Handle special case for 1
        if (isset($freq[1])) {
            // If we have 1s, we can take odd number of them
            $onesCount = $freq[1];
            if ($onesCount % 2 == 0) {
                $maxLength = max($maxLength, $onesCount - 1);
            } else {
                $maxLength = max($maxLength, $onesCount);
            }
        }

        // For each number as starting point
        foreach ($freq as $start => $count) {
            if ($start == 1) continue;

            $sequence = [];
            $current = $start;

            // Build sequence by squaring
            while (isset($freq[$current]) && $freq[$current] > 0) {
                $sequence[] = $current;

                // Prevent overflow for large numbers
                if ($current > 31622) break; // sqrt(10^9)

                $next = $current * $current;
                if ($next > 1000000000) break;

                $current = $next;
            }

            // Calculate maximum length from this sequence
            $len = count($sequence);
            if ($len > 0) {
                // We need at least one of each element in the sequence
                // For the peak, we only need 1
                // For all others, we need 2 (one for each side)
                $possible = true;
                $length = 1; // Peak element

                // Check if we have enough of each element
                for ($i = 0; $i < $len - 1; $i++) {
                    if ($freq[$sequence[$i]] < 2) {
                        $possible = false;
                        break;
                    }
                    $length += 2; // Add both sides
                }

                if ($possible) {
                    $maxLength = max($maxLength, $length);
                }
            }
        }

        return $maxLength;
    }
}