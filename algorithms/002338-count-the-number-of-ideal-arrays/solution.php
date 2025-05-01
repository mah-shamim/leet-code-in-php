<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $maxValue
     * @return Integer
     */
    function idealArrays($n, $maxValue) {
        $mod = 1000000007;

        if ($maxValue == 0) {
            return 0;
        }

        $spf = $this->computeSPF($maxValue);
        $max_fact = $n + $maxValue; // Sufficient upper bound for factorial precomputation
        list($fact, $inv_fact) = $this->precomputeFactorials($max_fact, $mod);

        $total = 0;

        for ($v = 1; $v <= $maxValue; $v++) {
            $current = $v;
            $product = 1;

            if ($current != 1) {
                $factors = array();
                while ($current != 1) {
                    $p = $spf[$current];
                    $count = 0;
                    while ($current % $p == 0) {
                        $current = (int)($current / $p);
                        $count++;
                    }
                    $factors[] = $count;
                }
                foreach ($factors as $e) {
                    $a = $e + $n - 1;
                    if ($a > $max_fact) {
                        // This case should not occur due to our precomputed max_fact
                        return -1; // Error case should not happen
                    }
                    $comb = $fact[$a];
                    $comb = ($comb * $inv_fact[$e]) % $mod;
                    $comb = ($comb * $inv_fact[$n - 1]) % $mod;
                    $product = ($product * $comb) % $mod;
                }
            }

            $total = ($total + $product) % $mod;
        }

        return $total;
    }

    /**
     * @param $maxValue
     * @return array
     */
    function computeSPF($maxValue) {
        $spf = array_fill(0, $maxValue + 1, 0);
        for ($i = 2; $i <= $maxValue; $i++) {
            if ($spf[$i] == 0) {
                $spf[$i] = $i;
                if ($i * $i <= $maxValue) {
                    for ($j = $i * $i; $j <= $maxValue; $j += $i) {
                        if ($spf[$j] == 0) {
                            $spf[$j] = $i;
                        }
                    }
                }
            }
        }
        return $spf;
    }

    /**
     * @param $a
     * @param $b
     * @param $mod
     * @return int
     */
    function pow_mod($a, $b, $mod) {
        $result = 1;
        while ($b > 0) {
            if ($b % 2 == 1) {
                $result = ($result * $a) % $mod;
            }
            $a = ($a * $a) % $mod;
            $b = $b >> 1;
        }
        return $result;
    }

    /**
     * @param $max
     * @param $mod
     * @return array
     */
    function precomputeFactorials($max, $mod) {
        $fact = array_fill(0, $max + 1, 1);
        for ($i = 1; $i <= $max; $i++) {
            $fact[$i] = ($fact[$i - 1] * $i) % $mod;
        }

        $inv_fact = array_fill(0, $max + 1, 1);
        $inv_fact[$max] = $this->pow_mod($fact[$max], $mod - 2, $mod);
        for ($i = $max - 1; $i >= 0; $i--) {
            $inv_fact[$i] = ($inv_fact[$i + 1] * ($i + 1)) % $mod;
        }

        return array($fact, $inv_fact);
    }
}