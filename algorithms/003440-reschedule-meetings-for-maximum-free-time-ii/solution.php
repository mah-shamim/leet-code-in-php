<?php

class Solution {

    /**
     * @param Integer $eventTime
     * @param Integer[] $startTime
     * @param Integer[] $endTime
     * @return Integer
     */
    function maxFreeTime($eventTime, $startTime, $endTime) {
        $n = count($startTime);
        $original_gaps = array();
        $original_gaps[0] = $startTime[0];
        for ($i = 0; $i < $n - 1; $i++) {
            $original_gaps[$i + 1] = $startTime[$i + 1] - $endTime[$i];
        }
        $original_gaps[$n] = $eventTime - $endTime[$n - 1];

        $total_gaps = $n + 1;
        $prefix_max = array_fill(0, $total_gaps + 1, -1);
        $prefix_second_max = array_fill(0, $total_gaps + 1, -1);
        $prefix_max_count = array_fill(0, $total_gaps + 1, 0);

        for ($i = 0; $i < $total_gaps; $i++) {
            $cur = $original_gaps[$i];
            $cur_max = $prefix_max[$i];
            $cur_second = $prefix_second_max[$i];
            if ($cur > $cur_max) {
                $prefix_max[$i + 1] = $cur;
                $prefix_second_max[$i + 1] = max($cur_second, $cur_max);
                $prefix_max_count[$i + 1] = 1;
            } else if ($cur == $cur_max) {
                $prefix_max[$i + 1] = $cur_max;
                $prefix_second_max[$i + 1] = $cur_second;
                $prefix_max_count[$i + 1] = $prefix_max_count[$i] + 1;
            } else {
                $prefix_max[$i + 1] = $cur_max;
                if ($cur > $cur_second) {
                    $prefix_second_max[$i + 1] = $cur;
                } else {
                    $prefix_second_max[$i + 1] = $cur_second;
                }
                $prefix_max_count[$i + 1] = $prefix_max_count[$i];
            }
        }

        $suffix_max = array_fill(0, $total_gaps + 2, -1);
        $suffix_second_max = array_fill(0, $total_gaps + 2, -1);
        $suffix_max_count = array_fill(0, $total_gaps + 2, 0);
        $suffix_max[$total_gaps + 1] = -1;
        $suffix_second_max[$total_gaps + 1] = -1;
        $suffix_max_count[$total_gaps + 1] = 0;

        for ($i = $total_gaps - 1; $i >= 0; $i--) {
            $cur = $original_gaps[$i];
            $cur_max = $suffix_max[$i + 1];
            $cur_second = $suffix_second_max[$i + 1];
            if ($cur > $cur_max) {
                $suffix_max[$i] = $cur;
                $suffix_second_max[$i] = max($cur_second, $cur_max);
                $suffix_max_count[$i] = 1;
            } else if ($cur == $cur_max) {
                $suffix_max[$i] = $cur_max;
                $suffix_second_max[$i] = $cur_second;
                $suffix_max_count[$i] = $suffix_max_count[$i + 1] + 1;
            } else {
                $suffix_max[$i] = $cur_max;
                if ($cur > $cur_second) {
                    $suffix_second_max[$i] = $cur;
                } else {
                    $suffix_second_max[$i] = $cur_second;
                }
                $suffix_max_count[$i] = $suffix_max_count[$i + 1];
            }
        }

        $ans = max($original_gaps);

        for ($i = 0; $i < $n; $i++) {
            $duration = $endTime[$i] - $startTime[$i];
            if ($i == 0) {
                $merged = $startTime[1];
            } else if ($i == $n - 1) {
                $merged = $eventTime - $endTime[$n - 2];
            } else {
                $merged = $startTime[$i + 1] - $endTime[$i - 1];
            }

            $maxA = ($i > 0) ? $prefix_max[$i] : -1;
            $second_maxA = ($i > 0) ? $prefix_second_max[$i] : -1;
            $count_maxA = ($i > 0) ? $prefix_max_count[$i] : 0;

            $index_suffix = $i + 2;
            if ($index_suffix <= $total_gaps) {
                $maxC = $suffix_max[$index_suffix];
                $second_maxC = $suffix_second_max[$index_suffix];
                $count_maxC = $suffix_max_count[$index_suffix];
            } else {
                $maxC = -1;
                $second_maxC = -1;
                $count_maxC = 0;
            }

            $max_all = max($maxA, $merged, $maxC);
            if ($max_all < $duration) {
                continue;
            }

            $condition = false;
            if ($maxA >= $duration && $maxA < $max_all) {
                $condition = true;
            }
            if ($merged >= $duration && $merged < $max_all) {
                $condition = true;
            }
            if ($maxC >= $duration && $maxC < $max_all) {
                $condition = true;
            }

            if ($condition) {
                $ans = max($ans, $max_all);
            } else {
                $count = 0;
                if ($maxA == $max_all) {
                    $count += $count_maxA;
                }
                if ($merged == $max_all) {
                    $count += 1;
                }
                if ($maxC == $max_all) {
                    $count += $count_maxC;
                }
                if ($count >= 2) {
                    $ans = max($ans, $max_all);
                } else {
                    $candidate_from_A = ($maxA < $max_all) ? $maxA : $second_maxA;
                    $candidate_from_merged = ($merged < $max_all) ? $merged : -1;
                    $candidate_from_C = ($maxC < $max_all) ? $maxC : $second_maxC;
                    $second_max_val = max($candidate_from_A, $candidate_from_merged, $candidate_from_C);
                    $candidate_i = max($second_max_val, $max_all - $duration);
                    $ans = max($ans, $candidate_i);
                }
            }
        }

        return $ans;
    }
}