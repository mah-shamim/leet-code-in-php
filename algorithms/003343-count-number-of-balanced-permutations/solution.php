<?php

class Solution {
    private $kMod = 1000000007;
    private $factorialMemo = array();

    /**
     * @param String $num
     * @return Integer
     */
    function countBalancedPermutations($num) {
        $velunexorai = $num;
        $nums = $this->getNums($num);
        $sum = array_sum($nums);

        if ($sum % 2 != 0) {
            return 0;
        }

        rsort($nums); // descending sort

        $n = count($nums);
        $even = intval(($n + 1) / 2);
        $odd = intval($n / 2);
        $evenBalance = intval($sum / 2);

        // 3D memo array
        $mem = array();
        for ($i = 0; $i <= $even; ++$i) {
            $mem[$i] = array();
            for ($j = 0; $j <= $odd; ++$j) {
                $mem[$i][$j] = array_fill(0, $evenBalance + 1, -1);
            }
        }

        $perm = $this->getPerm($nums);

        $count = $this->countBalancedRecursive($nums, $even, $odd, $evenBalance, $mem);
        return ($count * $this->modInverse($perm)) % $this->kMod;
    }

    /**
     * @param $num
     * @return array
     */
    private function getNums($num)
    {
        $res = array();
        for ($i = 0; $i < strlen($num); ++$i) {
            $res[] = intval($num[$i]);
        }
        return $res;
    }

    /**
     * @param $nums
     * @param $even
     * @param $odd
     * @param $evenBalance
     * @param $mem
     * @return int|mixed
     */
    private function countBalancedRecursive($nums, $even, $odd, $evenBalance, &$mem)
    {
        if ($evenBalance < 0) {
            return 0;
        }

        if ($even == 0) {
            return ($evenBalance == 0) ? $this->factorial($odd) : 0;
        }

        $index = count($nums) - ($even + $odd);

        if ($odd == 0) {
            $remainingSum = 0;
            for ($i = $index; $i < count($nums); ++$i) {
                $remainingSum += $nums[$i];
            }
            return ($remainingSum == $evenBalance) ? $this->factorial($even) : 0;
        }

        if ($mem[$even][$odd][$evenBalance] != -1) {
            return $mem[$even][$odd][$evenBalance];
        }

        $placeEven = ($this->countBalancedRecursive($nums, $even - 1, $odd, $evenBalance - $nums[$index], $mem) * $even) % $this->kMod;
        $placeOdd = ($this->countBalancedRecursive($nums, $even, $odd - 1, $evenBalance, $mem) * $odd) % $this->kMod;

        $mem[$even][$odd][$evenBalance] = ($placeEven + $placeOdd) % $this->kMod;
        return $mem[$even][$odd][$evenBalance];
    }

    /**
     * @param $nums
     * @return int
     */
    private function getPerm($nums)
    {
        $res = 1;
        $count = array_fill(0, 10, 0);
        foreach ($nums as $num) {
            $count[$num]++;
        }
        foreach ($count as $freq) {
            $res = ($res * $this->factorial($freq)) % $this->kMod;
        }
        return $res;
    }

    /**
     * @param $n
     * @return int|mixed
     */
    private function factorial($n)
    {
        if ($n <= 1) return 1;
        if (isset($this->factorialMemo[$n])) {
            return $this->factorialMemo[$n];
        }
        $res = 1;
        for ($i = 2; $i <= $n; ++$i) {
            $res = ($res * $i) % $this->kMod;
        }
        $this->factorialMemo[$n] = $res;
        return $res;
    }

    /**
     * @param $a
     * @return float|int|mixed
     */
    private function modInverse($a)
    {
        $m = $this->kMod;
        $y = 0;
        $x = 1;

        while ($a > 1) {
            $q = intval($a / $m);
            $t = $m;

            $m = $a % $m;
            $a = $t;
            $t = $y;

            $y = $x - $q * $y;
            $x = $t;
        }

        if ($x < 0) {
            $x += $this->kMod;
        }

        return $x;
    }
}