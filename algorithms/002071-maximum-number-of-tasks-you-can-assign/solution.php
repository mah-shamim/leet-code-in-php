<?php

class Solution {

    /**
     * @param Integer[] $tasks
     * @param Integer[] $workers
     * @param Integer $pills
     * @param Integer $strength
     * @return Integer
     */
    public function maxTaskAssign($tasks, $workers, $pills, $strength) {
        sort($tasks);
        sort($workers);

        $ans = 0;
        $left = 0;
        $right = min(count($tasks), count($workers));

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);
            if ($this->canComplete($tasks, $workers, $pills, $strength, $mid)) {
                $ans = $mid;
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $ans;
    }

    /**
     * @param $tasks
     * @param $workers
     * @param $pills
     * @param $strength
     * @param $m
     * @return bool
     */
    private function canComplete($tasks, $workers, $pills, $strength, $m) {
        if ($m == 0) {
            return true;
        }
        if (count($workers) < $m) {
            return false;
        }

        $selected_tasks = array_slice($tasks, 0, $m);
        $selected_tasks = array_reverse($selected_tasks);

        $selected_workers = array_slice($workers, -$m);
        sort($selected_workers); // Ensure they are sorted in ascending order

        $pills_remaining = $pills;

        foreach ($selected_tasks as $task) {
            $index = $this->findCeiling($selected_workers, $task);
            if ($index !== -1) {
                array_splice($selected_workers, $index, 1);
            } else {
                if ($pills_remaining <= 0) {
                    return false;
                }
                $required = $task - $strength;
                $index = $this->findCeiling($selected_workers, $required);
                if ($index !== -1) {
                    array_splice($selected_workers, $index, 1);
                    $pills_remaining--;
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param $arr
     * @param $target
     * @return int
     */
    private function findCeiling($arr, $target) {
        $left = 0;
        $right = count($arr) - 1;
        $result = -1;

        while ($left <= $right) {
            $mid = (int)(($left + $right) / 2);
            if ($arr[$mid] >= $target) {
                $result = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return $result;
    }
}