<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isTrionic(array $nums): bool
    {
        $n = count($nums);

        // Try all possible p and q positions
        for ($p = 1; $p <= $n - 3; $p++) {
            for ($q = $p + 1; $q <= $n - 2; $q++) {
                $valid = true;

                // Check first segment: 0 to p (strictly increasing)
                for ($i = 0; $i < $p; $i++) {
                    if ($nums[$i] >= $nums[$i + 1]) {
                        $valid = false;
                        break;
                    }
                }
                if (!$valid) continue;

                // Check second segment: p to q (strictly decreasing)
                for ($i = $p; $i < $q; $i++) {
                    if ($nums[$i] <= $nums[$i + 1]) {
                        $valid = false;
                        break;
                    }
                }
                if (!$valid) continue;

                // Check third segment: q to n-1 (strictly increasing)
                for ($i = $q; $i < $n - 1; $i++) {
                    if ($nums[$i] >= $nums[$i + 1]) {
                        $valid = false;
                        break;
                    }
                }

                if ($valid) {
                    return true;
                }
            }
        }

        return false;
    }
}