<?php

class Solution {
    private int $MOD = 1000000007;
    private array $fact = [];
    private array $invFact = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numOfWays(array $nums): int
    {
        $n = count($nums);

        // Precompute factorials and inverse factorials for combinations.
        $this->fact = array_fill(0, $n + 1, 1);
        for ($i = 1; $i <= $n; $i++) {
            $this->fact[$i] = ($this->fact[$i - 1] * $i) % $this->MOD;
        }

        $this->invFact = array_fill(0, $n + 1, 1);
        $this->invFact[$n] = $this->modPow($this->fact[$n], $this->MOD - 2);

        for ($i = $n; $i > 0; $i--) {
            $this->invFact[$i - 1] = ($this->invFact[$i] * $i) % $this->MOD;
        }

        // Subtract 1 to exclude the original ordering.
        return ($this->dfs($nums) - 1 + $this->MOD) % $this->MOD;
    }

    /**
     * @param $arr
     * @return int
     */
    private function dfs($arr): int
    {
        $len = count($arr);

        if ($len <= 1) {
            return 1;
        }

        $root = $arr[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $root) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }

        $leftCount = count($left);
        $rightCount = count($right);

        // Interleave left and right subtree insertion orders.
        $ways = $this->comb($len - 1, $leftCount);

        $ways = ($ways * $this->dfs($left)) % $this->MOD;
        $ways = ($ways * $this->dfs($right)) % $this->MOD;

        return $ways;
    }

    /**
     * @param $n
     * @param $k
     * @return int
     */
    private function comb($n, $k): int
    {
        if ($k < 0 || $k > $n) {
            return 0;
        }

        return $this->fact[$n]
            * $this->invFact[$k] % $this->MOD
            * $this->invFact[$n - $k] % $this->MOD;
    }

    /**
     * @param $base
     * @param $exp
     * @return int
     */
    private function modPow($base, $exp): int
    {
        $result = 1;
        $base %= $this->MOD;

        while ($exp > 0) {
            if ($exp & 1) {
                $result = ($result * $base) % $this->MOD;
            }

            $base = ($base * $base) % $this->MOD;
            $exp >>= 1;
        }

        return $result;
    }
}