<?php

class Solution {
    const MOD = 1000000007;

    /**
     * @param Integer $n
     * @param Integer $l
     * @param Integer $r
     * @return Integer
     */
    function zigZagArrays(int $n, int $l, int $r): int
    {
        $m = $r - $l + 1;
        if ($n == 1) return $m;

        $size = 2 * $m;
        // transition matrix
        $T = array_fill(0, $size, array_fill(0, $size, 0));

        // Fill T
        // Down states: index 0..m-1
        // Up states: index m..2m-1
        for ($x = 0; $x < $m; $x++) {
            // From down, x -> up, y for y > x
            for ($y = $x + 1; $y < $m; $y++) {
                $T[$x][$m + $y] = 1;
            }
            // From up, x -> down, y for y < x
            for ($y = 0; $y < $x; $y++) {
                $T[$m + $x][$y] = 1;
            }
        }

        // Initial vector for starting with "up" or "down"
        $v1 = array_fill(0, $size, 0);
        $v2 = array_fill(0, $size, 0);
        for ($i = 0; $i < $m; $i++) {
            $v1[$i] = 1;        // start with down, last = i
            $v2[$m + $i] = 1;   // start with up, last = i
        }

        // exponentiate T^(n-1)
        $pow = $this->matPow($T, $n - 1, $size);

        // Apply to initial vectors
        $res1 = $this->matVecMul($pow, $v1, $size);
        $res2 = $this->matVecMul($pow, $v2, $size);

        $total = 0;
        for ($i = 0; $i < $size; $i++) {
            $total = ($total + $res1[$i] + $res2[$i]) % self::MOD;
        }
        return $total;
    }

    /**
     * @param $A
     * @param $B
     * @param $n
     * @return array
     */
    function matMul($A, $B, $n): array
    {
        $C = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) {
            for ($k = 0; $k < $n; $k++) {
                if ($A[$i][$k] == 0) continue;
                $aik = $A[$i][$k];
                for ($j = 0; $j < $n; $j++) {
                    $C[$i][$j] = ($C[$i][$j] + $aik * $B[$k][$j]) % self::MOD;
                }
            }
        }
        return $C;
    }

    /**
     * @param $base
     * @param $exp
     * @param $n
     * @return array
     */
    function matPow($base, $exp, $n): array
    {
        $res = array_fill(0, $n, array_fill(0, $n, 0));
        for ($i = 0; $i < $n; $i++) $res[$i][$i] = 1;
        while ($exp > 0) {
            if ($exp & 1) {
                $res = $this->matMul($res, $base, $n);
            }
            $base = $this->matMul($base, $base, $n);
            $exp >>= 1;
        }
        return $res;
    }

    /**
     * @param $M
     * @param $v
     * @param $n
     * @return array
     */
    function matVecMul($M, $v, $n): array
    {
        $res = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            $sum = 0;
            for ($j = 0; $j < $n; $j++) {
                $sum = ($sum + $M[$i][$j] * $v[$j]) % self::MOD;
            }
            $res[$i] = $sum;
        }
        return $res;
    }
}