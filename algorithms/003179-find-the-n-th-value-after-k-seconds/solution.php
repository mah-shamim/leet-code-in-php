<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function valueAfterKSeconds(int $n, int $k): int
    {
        $mod = 1000000007;
        $result = 1;

        // We need C(k + n - 1, n - 1)
        // formula: result = (k + n - 1)! / ((n - 1)! * k!)
        // But we compute iteratively:
        // result = product_{i=1}^{n-1} (k + i) / i  (mod M)

        for ($i = 1; $i <= $n - 1; $i++) {
            $result = $result * (($k + $i) % $mod) % $mod;
            $result = $result * $this->modInverse($i, $mod) % $mod;
        }

        return $result;
    }

    /**
     * Modular inverse using Fermat's little theorem
     *
     * @param $a
     * @param $mod
     * @return int
     */
    function modInverse($a, $mod): int
    {
        return $this->powMod($a, $mod - 2, $mod);
    }

    /**
     * Modular exponentiation
     *
     * @param $base
     * @param $exp
     * @param $mod
     * @return int
     */
    function powMod($base, $exp, $mod): int
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