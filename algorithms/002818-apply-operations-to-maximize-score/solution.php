<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumScore($nums, $k) {
        $MOD = 1000000007;
        $n = count($nums);
        if ($n == 0) return 0;

        // Compute prime scores for each number
        $s = array();
        foreach ($nums as $x) {
            $s[] = $this->primeScore($x);
        }

        // Compute left and right arrays using monotonic stacks
        $left = array_fill(0, $n, -1);
        $stack = array();
        for ($i = 0; $i < $n; $i++) {
            while (!empty($stack) && $s[end($stack)] < $s[$i]) {
                array_pop($stack);
            }
            if (!empty($stack)) {
                $left[$i] = end($stack);
            }
            array_push($stack, $i);
        }

        $right = array_fill(0, $n, $n);
        $stack = array();
        for ($i = $n - 1; $i >= 0; $i--) {
            while (!empty($stack) && $s[end($stack)] <= $s[$i]) {
                array_pop($stack);
            }
            if (!empty($stack)) {
                $right[$i] = end($stack);
            }
            array_push($stack, $i);
        }

        // Compute ranges and create elements array
        $elements = array();
        for ($i = 0; $i < $n; $i++) {
            $count = ($i - $left[$i]) * ($right[$i] - $i);
            $elements[] = array(
                's' => $s[$i],
                'x' => $nums[$i],
                'count' => $count,
                'index' => $i
            );
        }

        // Sort the elements by x descending, then s descending, then index ascending
        usort($elements, function ($a, $b) {
            if ($a['x'] != $b['x']) {
                return $b['x'] - $a['x'];
            }
            if ($a['s'] != $b['s']) {
                return $b['s'] - $a['s'];
            }
            return $a['index'] - $b['index'];
        });

        $result = 1;
        $remaining_k = $k;
        foreach ($elements as $elem) {
            if ($remaining_k <= 0) break;
            $t = min($elem['count'], $remaining_k);
            $result = ($result * $this->powmod($elem['x'], $t, $MOD)) % $MOD;
            $remaining_k -= $t;
        }

        return $result % $MOD;
    }

    /**
     * @param $x
     * @return int
     */
    function primeScore($x) {
        if ($x == 1) return 0;
        $count = 0;
        $divisor = 2;
        while ($divisor * $divisor <= $x) {
            if ($x % $divisor == 0) {
                $count++;
                while ($x % $divisor == 0) {
                    $x = (int) ($x / $divisor);
                }
            }
            $divisor++;
        }
        if ($x > 1) {
            $count++;
        }
        return $count;
    }

    /**
     * @param $x
     * @param $n
     * @param $mod
     * @return int
     */
    function powmod($x, $n, $mod) {
        $result = 1;
        $x = $x % $mod;
        while ($n > 0) {
            if ($n % 2 == 1) {
                $result = ($result * $x) % $mod;
            }
            $x = ($x * $x) % $mod;
            $n = (int) ($n / 2);
        }
        return $result;
    }
}