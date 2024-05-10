<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     * @throws Exception
     */
    function kthSmallestPrimeFraction(array $arr, int $k): array
    {
        $n = count($arr);
        $l = 0.0;
        $r = 1.0;

        while ($l < $r) {
            $m = ($l + $r) / 2.0;
            $fractionsNoGreaterThanM = 0;
            $p = 0;
            $q = 1;

            // For each index i, find the first index j s.t. arr[i] / arr[j] <= m,
            // so fractionsNoGreaterThanM for index i will be n - j.
            for ($i = 0, $j = 1; $i < $n; ++$i) {
                while ($j < $n && $arr[$i] > $m * $arr[$j])
                    ++$j;
                if ($j == $n)
                    break;
                $fractionsNoGreaterThanM += $n - $j;
                if ($p * $arr[$j] < $q * $arr[$i]) {
                    $p = $arr[$i];
                    $q = $arr[$j];
                }
            }

            if ($fractionsNoGreaterThanM == $k)
                return [$p, $q];
            if ($fractionsNoGreaterThanM > $k)
                $r = $m;
            else
                $l = $m;
        }

        throw new Exception("Kth smallest prime fraction not found.");
    }
}