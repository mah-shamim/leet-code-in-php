<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function subsequencePairCount(array $nums): int
    {
        $mod = 1000000007;
        $maxVal = 200;

        // dp[g1][g2] = number of ways
        $dp = array_fill(0, $maxVal + 1, array_fill(0, $maxVal + 1, 0));
        $dp[0][0] = 1; // empty subsequences

        foreach ($nums as $x) {
            $newDp = $dp; // skip current element

            for ($g1 = 0; $g1 <= $maxVal; $g1++) {
                for ($g2 = 0; $g2 <= $maxVal; $g2++) {
                    if ($dp[$g1][$g2] == 0) continue;
                    $val = $dp[$g1][$g2];

                    // Add x to first subsequence
                    $ng1 = $g1 == 0 ? $x : $this->gcd($g1, $x);
                    $newDp[$ng1][$g2] = ($newDp[$ng1][$g2] + $val) % $mod;

                    // Add x to second subsequence
                    $ng2 = $g2 == 0 ? $x :$this-> gcd($g2, $x);
                    $newDp[$g1][$ng2] = ($newDp[$g1][$ng2] + $val) % $mod;
                }
            }

            $dp = $newDp;
        }

        $result = 0;
        for ($g = 1; $g <= $maxVal; $g++) {
            $result = ($result + $dp[$g][$g]) % $mod;
        }

        return $result;
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    function gcd($a, $b): mixed
    {
        while ($b != 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return $a;
    }
}