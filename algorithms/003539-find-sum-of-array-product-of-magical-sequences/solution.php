<?php

class Solution {
    const MOD = 1000000007;

    /**
     * @param Integer $m
     * @param Integer $k
     * @param Integer[] $nums
     * @return Integer
     */
    function magicalSum($m, $k, $nums) {
        $comb = $this->getComb($m, $m);
        $mem = array_fill(0, $m + 1,
            array_fill(0, $k + 1,
                array_fill(0, count($nums) + 1,
                    array_fill(0, $m + 1, -1))));

        return $this->dp($m, $k, 0, 0, $nums, $mem, $comb);
    }

    /**
     * @param $m
     * @param $k
     * @param $i
     * @param $carry
     * @param $nums
     * @param $mem
     * @param $comb
     * @return int|mixed
     */
    private function dp($m, $k, $i, $carry, $nums, &$mem, $comb) {
        if ($m < 0 || $k < 0 || ($m + $this->popcount($carry) < $k)) {
            return 0;
        }
        if ($m == 0) {
            return $k == $this->popcount($carry) ? 1 : 0;
        }
        if ($i == count($nums)) {
            return 0;
        }
        if ($mem[$m][$k][$i][$carry] != -1) {
            return $mem[$m][$k][$i][$carry];
        }

        $res = 0;
        $n = count($nums);

        for ($count = 0; $count <= $m; $count++) {
            $contribution = ($comb[$m][$count] * $this->modPow($nums[$i], $count)) % self::MOD;
            $newCarry = $carry + $count;
            $dpResult = $this->dp($m - $count, $k - ($newCarry % 2), $i + 1, (int)($newCarry / 2), $nums, $mem, $comb);
            $res = ($res + ($dpResult * $contribution) % self::MOD) % self::MOD;
        }

        $mem[$m][$k][$i][$carry] = $res;
        return $res;
    }

    /**
     * @param $n
     * @param $k
     * @return array
     */
    private function getComb($n, $k) {
        $comb = array_fill(0, $n + 1, array_fill(0, $k + 1, 0));

        for ($i = 0; $i <= $n; $i++) {
            $comb[$i][0] = 1;
        }

        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $k; $j++) {
                $comb[$i][$j] = $comb[$i - 1][$j] + $comb[$i - 1][$j - 1];
            }
        }

        return $comb;
    }

    /**
     * @param $x
     * @param $n
     * @return int
     */
    private function modPow($x, $n) {
        if ($n == 0) return 1;
        if ($n % 2 == 1) {
            return ($x * $this->modPow($x % self::MOD, $n - 1)) % self::MOD;
        }
        return $this->modPow(($x * $x) % self::MOD, (int)($n / 2)) % self::MOD;
    }

    /**
     * @param $x
     * @return int
     */
    private function popcount($x) {
        $count = 0;
        while ($x > 0) {
            $count += $x & 1;
            $x >>= 1;
        }
        return $count;
    }
}