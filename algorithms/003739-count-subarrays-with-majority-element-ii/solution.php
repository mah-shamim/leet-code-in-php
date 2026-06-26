<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function countMajoritySubarrays(array $nums, int $target): int
    {
        $n = count($nums);

        // Quick check: if target never appears, return 0
        if (!in_array($target, $nums)) {
            return 0;
        }

        // Step 1: Convert array to +1 for target, -1 for others
        $arr = array_map(function($val) use ($target) {
            return $val == $target ? 1 : -1;
        }, $nums);

        // Step 2: Build prefix sums
        $pref = [0];
        for ($i = 0; $i < $n; $i++) {
            $pref[] = $pref[$i] + $arr[$i];
        }

        // Step 3: Coordinate compression of prefix sums
        $sortedPref = $pref;
        sort($sortedPref);
        $compressed = [];
        foreach ($pref as $val) {
            // binary search to find index (1-based for Fenwick)
            $idx = $this->binarySearch($sortedPref, $val) + 1;
            $compressed[] = $idx;
        }

        // Step 4: Fenwick tree (BIT) for counting
        $size = count($sortedPref);
        $bit = array_fill(0, $size + 1, 0);

        // Step 5: Count pairs (i < j) with pref[j] > pref[i]
        $ans = 0;
        for ($j = 0; $j <= $n; $j++) {
            // number of previous prefix sums < current
            $lessCount = $this->bitQuery($bit, $compressed[$j] - 1);
            $ans += $lessCount;

            // update BIT with current prefix sum
            $this->bitUpdate($bit, $compressed[$j], 1);
        }

        return $ans;
    }

    /**
     * @param $bit
     * @param $idx
     * @param $delta
     * @return void
     */
    function bitUpdate(&$bit, $idx, $delta): void
    {
        $n = count($bit);
        while ($idx < $n) {
            $bit[$idx] += $delta;
            $idx += $idx & -$idx;
        }
    }

    /**
     * @param $bit
     * @param $idx
     * @return int|mixed
     */
    function bitQuery($bit, $idx): mixed
    {
        $sum = 0;
        while ($idx > 0) {
            $sum += $bit[$idx];
            $idx -= $idx & -$idx;
        }
        return $sum;
    }

    /**
     * Binary search helper for 0-based index
     *
     * @param $arr
     * @param $target
     * @return int
     */
    function binarySearch($arr, $target): int
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($arr[$mid] == $target) return $mid;
            if ($arr[$mid] < $target) $left = $mid + 1;
            else $right = $mid - 1;
        }
        return -1;
    }
}