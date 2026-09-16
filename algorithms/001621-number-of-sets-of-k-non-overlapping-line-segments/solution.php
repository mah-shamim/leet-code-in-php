<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function numberOfSets(int $n, int $k): int
    {
        $MOD = 1000000007;

        // The answer is C(n + k - 1, 2k)
        $N = $n + $k - 1;
        $R = 2 * $k;

        if ($R > $N) {
            return 0;
        }

        $fact = array_fill(0, $N + 1, 1);
        for ($i = 1; $i <= $N; $i++) {
            $fact[$i] = ($fact[$i - 1] * $i) % $MOD;
        }

        $invFact = array_fill(0, $N + 1, 1);
        $invFact[$N] = $this->modPow($fact[$N], $MOD - 2, $MOD);

        for ($i = $N; $i >= 1; $i--) {
            $invFact[$i - 1] = ($invFact[$i] * $i) % $MOD;
        }

        $ans = $fact[$N];
        $ans = ($ans * $invFact[$R]) % $MOD;
        $ans = ($ans * $invFact[$N - $R]) % $MOD;

        return $ans;
    }

    /**
     * @param int $base
     * @param int $exp
     * @param int $mod
     * @return int
     */
    private function modPow(int $base, int $exp, int $mod): int
    {
        $result = 1;
        $base %= $mod;

        while ($exp > 0) {
            if ($exp & 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exp >>= 1;
        }

        return $result;
    }
}