<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Boolean
     */
    function hasAllCodes(string $s, int $k): bool
    {
        $n = strlen($s);
        if ($n < $k) {
            return false;
        }

        $total = 1 << $k;          // 2^k
        $mask = $total - 1;         // mask with k ones

        $seen = array_fill(0, $total, false);
        $count = 0;

        // Build initial value for first k characters
        $val = 0;
        for ($i = 0; $i < $k; $i++) {
            $val = ($val << 1) | (int)($s[$i] == '1');
        }
        if (!$seen[$val]) {
            $seen[$val] = true;
            $count++;
        }

        // Slide the window
        for ($i = $k; $i < $n; $i++) {
            $val = (($val << 1) & $mask) | (int)($s[$i] == '1');
            if (!$seen[$val]) {
                $seen[$val] = true;
                $count++;
                // Early exit
                if ($count == $total) {
                    return true;
                }
            }
        }

        return $count == $total;
    }
}