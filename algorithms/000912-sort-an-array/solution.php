<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums) {
        set_time_limit(-1);
        $this->mergeSort($nums);
        return $nums;
    }

    /**
     * @param $array
     * @return void
     */
    function mergeSort(&$array) {
        if (count($array) <= 1) {
            return;
        }

        $mid = count($array) >> 1;
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        $this->mergeSort($left);
        $this->mergeSort($right);

        $this->merge($array, $left, $right);
    }

    /**
     * @param $array
     * @param $left
     * @param $right
     * @return void
     */
    function merge(&$array, $left, $right) {
        $i = $j = $k = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] < $right[$j]) {
                $array[$k++] = $left[$i++];
            } else {
                $array[$k++] = $right[$j++];
            }
        }

        while ($i < count($left)) {
            $array[$k++] = $left[$i++];
        }

        while ($j < count($right)) {
            $array[$k++] = $right[$j++];
        }
    }

}