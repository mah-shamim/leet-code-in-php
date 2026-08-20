<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function resultArray(array $nums): array
    {
        $arr1 = [$nums[0]];
        $arr2 = [$nums[1]];

        for ($i = 2; $i < count($nums); $i++) {
            $last1 = $arr1[count($arr1) - 1];
            $last2 = $arr2[count($arr2) - 1];

            if ($last1 > $last2) {
                $arr1[] = $nums[$i];
            } else {
                $arr2[] = $nums[$i];
            }
        }

        return array_merge($arr1, $arr2);
    }
}