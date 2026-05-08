<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minJumps(array $nums): int
    {
        $n = count($nums);
        $maxVal = max($nums);

        // Sieve for SPF
        $spf = array_fill(0, $maxVal + 1, 0);
        for ($i = 2; $i <= $maxVal; $i++) {
            if ($spf[$i] == 0) {
                $spf[$i] = $i;
                for ($j = $i * $i; $j <= $maxVal; $j += $i) {
                    if ($spf[$j] == 0) {
                        $spf[$j] = $i;
                    }
                }
            }
        }

        // isPrime function
        $isPrime = function($x) use ($spf, $maxVal) {
            if ($x < 2) return false;
            return $spf[$x] == $x;
        };

        // Build buckets: prime -> indices with nums[i] divisible by prime
        $bucket = [];
        for ($i = 0; $i < $n; $i++) {
            $val = $nums[$i];
            $temp = $val;
            while ($temp > 1) {
                $p = $spf[$temp];
                if (!isset($bucket[$p])) $bucket[$p] = [];
                $bucket[$p][] = $i;
                while ($temp % $p == 0) {
                    $temp = intdiv($temp, $p);
                }
            }
        }

        // BFS
        $visitedIndex = array_fill(0, $n, false);
        $visitedPrime = [];
        $queue = [[0, 0]];
        $visitedIndex[0] = true;
        $front = 0;

        while ($front < count($queue)) {
            [$idx, $dist] = $queue[$front];
            $front++;

            if ($idx == $n - 1) {
                return $dist;
            }

            // Adjacent steps
            foreach ([$idx - 1, $idx + 1] as $nextIdx) {
                if ($nextIdx >= 0 && $nextIdx < $n && !$visitedIndex[$nextIdx]) {
                    $visitedIndex[$nextIdx] = true;
                    $queue[] = [$nextIdx, $dist + 1];
                }
            }

            // Teleport only if current number is prime
            if ($isPrime($nums[$idx])) {
                $p = $nums[$idx];
                if (!isset($visitedPrime[$p])) {
                    $visitedPrime[$p] = true;
                    if (isset($bucket[$p])) {
                        foreach ($bucket[$p] as $j) {
                            if ($j != $idx && !$visitedIndex[$j]) {
                                $visitedIndex[$j] = true;
                                $queue[] = [$j, $dist + 1];
                            }
                        }
                        unset($bucket[$p]);
                    }
                }
            }
        }

        return -1;
    }
}