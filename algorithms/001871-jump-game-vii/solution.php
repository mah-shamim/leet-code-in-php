<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $minJump
     * @param Integer $maxJump
     * @return Boolean
     */
    function canReach(string $s, int $minJump, int $maxJump): bool
    {
        $n = strlen($s);
        $dp = array_fill(0, $n, false);
        $prefix = array_fill(0, $n, 0);

        $dp[0] = true;
        $prefix[0] = 1;

        for ($i = 1; $i < $n; $i++) {
            $left = $i - $maxJump;
            $right = $i - $minJump;

            if ($right < 0) {
                $prefix[$i] = $prefix[$i - 1];
                continue;
            }

            $left = max($left, 0);

            $reachableCount = $prefix[$right] - ($left > 0 ? $prefix[$left - 1] : 0);

            if ($reachableCount > 0 && $s[$i] == '0') {
                $dp[$i] = true;
            }

            $prefix[$i] = $prefix[$i - 1] + ($dp[$i] ? 1 : 0);
        }

        return $dp[$n - 1];
    }
}