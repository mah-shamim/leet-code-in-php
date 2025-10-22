<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $numOperations
     * @return Integer
     */
    function maxFrequency($nums, $k, $numOperations) {
        $n = count($nums);
        if ($n === 0) return 0;
        sort($nums);

        // frequency map for exact values
        $freq = [];
        foreach ($nums as $v) {
            if (!isset($freq[$v])) $freq[$v] = 0;
            $freq[$v] += 1;
        }

        // build candidate targets: nums[i]-k, nums[i], nums[i]+k
        $cands = [];
        foreach ($nums as $v) {
            $cands[] = $v - $k;
            $cands[] = $v;
            $cands[] = $v + $k;
        }
        // deduplicate and sort candidates
        $cands = array_values(array_unique($cands));
        sort($cands);

        $ans = 1; // at least 1 (n >= 1)
        foreach ($cands as $T) {
            // count of elements inside [T-k, T+k]
            $leftIdx = $this->lower_bound($nums, $T - $k);
            $rightIdx = $this->upper_bound($nums, $T + $k);
            $inRange = $rightIdx - $leftIdx;

            $equal = $freq[$T] ?? 0;
            $convertible = $inRange - $equal; // those in range but not already equal T

            // we can convert at most numOperations of convertible elements
            $possible = $equal + min($numOperations, $convertible);
            if ($possible > $ans) $ans = $possible;

            // early exit if we already can convert whole array
            if ($ans === $n) return $n;
        }

        return $ans;
    }

    /**
     * Find first index >= target
     *
     * @param array $arr
     * @param int $target
     * @return int
     */
    function lower_bound(array $arr, int $target): int {
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $m = intdiv($l + $r, 2);
            if ($arr[$m] < $target) $l = $m + 1;
            else $r = $m;
        }
        return $l;
    }

    /**
     * Find first index > target
     *
     * @param array $arr
     * @param int $target
     * @return int
     */
    function upper_bound(array $arr, int $target): int {
        $l = 0;
        $r = count($arr);
        while ($l < $r) {
            $m = intdiv($l + $r, 2);
            if ($arr[$m] <= $target) $l = $m + 1;
            else $r = $m;
        }
        return $l;
    }
}


/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer $numOperations
 * @return Integer
 */
function maxFrequency($nums, $k, $numOperations) {
    $n = count($nums);
    if ($n === 0) return 0;
    sort($nums);

    // frequency map for exact values
    $freq = [];
    foreach ($nums as $v) {
        if (!isset($freq[$v])) $freq[$v] = 0;
        $freq[$v] += 1;
    }

    // build candidate targets: nums[i]-k, nums[i], nums[i]+k
    $cands = [];
    foreach ($nums as $v) {
        $cands[] = $v - $k;
        $cands[] = $v;
        $cands[] = $v + $k;
    }
    // deduplicate and sort candidates
    $cands = array_values(array_unique($cands));
    sort($cands);

    $ans = 1; // at least 1 (n >= 1)
    foreach ($cands as $T) {
        // count of elements inside [T-k, T+k]
        $leftIdx = lower_bound($nums, $T - $k);
        $rightIdx = upper_bound($nums, $T + $k);
        $inRange = $rightIdx - $leftIdx;

        $equal = $freq[$T] ?? 0;
        $convertible = $inRange - $equal; // those in range but not already equal T

        // we can convert at most numOperations of convertible elements
        $possible = $equal + min($numOperations, $convertible);
        if ($possible > $ans) $ans = $possible;

        // early exit if we already can convert whole array
        if ($ans === $n) return $n;
    }

    return $ans;
}

/**
 * Find first index >= target
 *
 * @param array $arr
 * @param int $target
 * @return int
 */
function lower_bound(array $arr, int $target): int {
    $l = 0;
    $r = count($arr);
    while ($l < $r) {
        $m = intdiv($l + $r, 2);
        if ($arr[$m] < $target) $l = $m + 1;
        else $r = $m;
    }
    return $l;
}

/**
 * Find first index > target
 *
 * @param array $arr
 * @param int $target
 * @return int
 */
function upper_bound(array $arr, int $target): int {
    $l = 0;
    $r = count($arr);
    while ($l < $r) {
        $m = intdiv($l + $r, 2);
        if ($arr[$m] <= $target) $l = $m + 1;
        else $r = $m;
    }
    return $l;
}