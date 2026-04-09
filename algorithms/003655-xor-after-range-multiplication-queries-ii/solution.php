<?php

class Solution {
    const MOD = 1000000007;

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Integer
     */
    function xorAfterQueries(array $nums, array $queries): int
    {
        $n = count($nums);
        $B = (int)sqrt($n) + 1;

        $smallQueries = [];
        $largeQueries = [];

        foreach ($queries as $q) {
            if ($q[2] > $B) {
                $largeQueries[] = $q;
            } else {
                $smallQueries[] = $q;
            }
        }

        // Process large k queries directly
        foreach ($largeQueries as $q) {
            list($l, $r, $k, $v) = $q;
            for ($idx = $l; $idx <= $r; $idx += $k) {
                $nums[$idx] = ($nums[$idx] * $v) % self::MOD;
            }
        }

        // Process small k queries
        $groups = [];
        foreach ($smallQueries as $q) {
            list($l, $r, $k, $v) = $q;
            $r0 = $l % $k;
            $groups[$k][$r0][] = [$l, $r, $v];
        }

        foreach ($groups as $k => $remainders) {
            foreach ($remainders as $r0 => $queriesList) {
                $t = (int)ceil(($n - $r0) / $k);
                $diff = array_fill(0, $t + 2, 1);

                foreach ($queriesList as $q) {
                    list($l, $r, $v) = $q;
                    $pos1 = (int)(($l - $r0) / $k);
                    $pos2 = (int)(($r - $r0) / $k);
                    $diff[$pos1] = ($diff[$pos1] * $v) % self::MOD;
                    $inv = $this->modInverse($v, self::MOD);
                    $diff[$pos2 + 1] = ($diff[$pos2 + 1] * $inv) % self::MOD;
                }

                $factor = 1;
                for ($i = 0; $i < $t; $i++) {
                    $factor = ($factor * $diff[$i]) % self::MOD;
                    $idx = $r0 + $i * $k;
                    if ($idx < $n) {
                        $nums[$idx] = ($nums[$idx] * $factor) % self::MOD;
                    }
                }
            }
        }

        // Compute XOR
        $xor = 0;
        foreach ($nums as $val) {
            $xor ^= $val;
        }
        return $xor;
    }

    /**
     * @param $a
     * @param $mod
     * @return int
     */
    private function modInverse($a, $mod): int
    {
        return $this->powMod($a, $mod - 2, $mod);
    }

    /**
     * @param $base
     * @param $exp
     * @param $mod
     * @return int
     */
    private function powMod($base, $exp, $mod): int
    {
        $result = 1;
        $base = $base % $mod;
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