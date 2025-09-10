<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $languages
     * @param Integer[][] $friendships
     * @return Integer
     */
    function minimumTeachings($n, $languages, $friendships) {
        $m = count($languages);
        $knows = array_fill(1, $m, array_fill(1, $n, false));

        for ($i = 1; $i <= $m; $i++) {
            foreach ($languages[$i - 1] as $lang) {
                if ($lang >= 1 && $lang <= $n) {
                    $knows[$i][$lang] = true;
                }
            }
        }

        $unsatisfiedUsers = [];
        foreach ($friendships as $friendship) {
            $u = $friendship[0];
            $v = $friendship[1];
            $hasCommon = false;
            for ($l = 1; $l <= $n; $l++) {
                if ($knows[$u][$l] && $knows[$v][$l]) {
                    $hasCommon = true;
                    break;
                }
            }
            if (!$hasCommon) {
                $unsatisfiedUsers[$u] = true;
                $unsatisfiedUsers[$v] = true;
            }
        }

        if (empty($unsatisfiedUsers)) {
            return 0;
        }

        $minTeach = PHP_INT_MAX;
        for ($l = 1; $l <= $n; $l++) {
            $count = 0;
            foreach (array_keys($unsatisfiedUsers) as $user) {
                if (!$knows[$user][$l]) {
                    $count++;
                }
            }
            if ($count < $minTeach) {
                $minTeach = $count;
            }
        }

        return $minTeach;
    }
}