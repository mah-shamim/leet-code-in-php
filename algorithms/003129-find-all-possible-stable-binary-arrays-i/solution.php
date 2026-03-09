<?php

class Solution {

    /**
     * @param Integer $zero
     * @param Integer $one
     * @param Integer $limit
     * @return Integer
     */
    function numberOfStableArrays(int $zero, int $one, int $limit): int
    {
        $MOD = 1000000007;

        // maximum value needed for binomial coefficients
        $maxN = 400;
        $fact = array_fill(0, $maxN + 1, 1);
        for ($i = 1; $i <= $maxN; $i++) {
            $fact[$i] = ($fact[$i - 1] * $i) % $MOD;
        }
        $invFact = array_fill(0, $maxN + 1, 1);
        $invFact[$maxN] = $this->powmod($fact[$maxN], $MOD - 2, $MOD);
        for ($i = $maxN - 1; $i >= 0; $i--) {
            $invFact[$i] = ($invFact[$i + 1] * ($i + 1)) % $MOD;
        }

        // binomial coefficient with safety checks
        $C = function($n, $r) use ($fact, $invFact, $MOD) {
            if ($n < 0 || $r < 0 || $r > $n) return 0;
            return ($fact[$n] * $invFact[$r] % $MOD) * $invFact[$n - $r] % $MOD;
        };

        // f0[k] = number of ways to split $zero zeros into k runs of length 1..limit
        $f0 = array_fill(0, $zero + 1, 0);
        for ($k = 1; $k <= $zero; $k++) {
            $total = 0;
            $maxJ = intdiv($zero - $k, $limit);
            for ($j = 0; $j <= $maxJ; $j++) {
                $term = $C($k, $j) * $C($zero - $j * $limit - 1, $k - 1) % $MOD;
                if ($j % 2 == 0) {
                    $total = ($total + $term) % $MOD;
                } else {
                    $total = ($total - $term + $MOD) % $MOD;
                }
            }
            $f0[$k] = $total;
        }

        // f1[l] = number of ways to split $one ones into l runs of length 1..limit
        $f1 = array_fill(0, $one + 1, 0);
        for ($l = 1; $l <= $one; $l++) {
            $total = 0;
            $maxJ = intdiv($one - $l, $limit);
            for ($j = 0; $j <= $maxJ; $j++) {
                $term = $C($l, $j) * $C($one - $j * $limit - 1, $l - 1) % $MOD;
                if ($j % 2 == 0) {
                    $total = ($total + $term) % $MOD;
                } else {
                    $total = ($total - $term + $MOD) % $MOD;
                }
            }
            $f1[$l] = $total;
        }

        $ans = 0;

        // arrays starting with 0
        for ($r1 = 1; $r1 <= $one; $r1++) {
            $r0 = $r1;
            if ($r0 <= $zero) {
                $ans = ($ans + $f0[$r0] * $f1[$r1]) % $MOD;
            }
            $r0 = $r1 + 1;
            if ($r0 <= $zero) {
                $ans = ($ans + $f0[$r0] * $f1[$r1]) % $MOD;
            }
        }

        // arrays starting with 1
        for ($r0 = 1; $r0 <= $zero; $r0++) {
            $r1 = $r0;
            if ($r1 <= $one) {
                $ans = ($ans + $f0[$r0] * $f1[$r1]) % $MOD;
            }
            $r1 = $r0 + 1;
            if ($r1 <= $one) {
                $ans = ($ans + $f0[$r0] * $f1[$r1]) % $MOD;
            }
        }

        return $ans % $MOD;
    }

    /**
     * Fast modular exponentiation
     *
     * @param $a
     * @param $b
     * @param $mod
     * @return int
     */
    private function powmod($a, $b, $mod): int
    {
        $res = 1;
        while ($b > 0) {
            if ($b & 1) $res = ($res * $a) % $mod;
            $a = ($a * $a) % $mod;
            $b >>= 1;
        }
        return $res;
    }
}