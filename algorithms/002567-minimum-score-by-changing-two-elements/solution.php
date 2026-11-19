<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimizeSum(array $nums): int
    {
        sort($nums);
        $n = count($nums);

        // We can always make the low score 0 by changing two elements
        // to the same value. So we only need to minimize the high score.
        //
        // To minimize the range after changing two elements, remove two
        // elements from the extremes of the sorted array. The remaining
        // n - 2 elements determine the minimum possible high score.
        return min(
            $nums[$n - 3] - $nums[0], // change two largest
            $nums[$n - 2] - $nums[1], // change one smallest and one largest
            $nums[$n - 1] - $nums[2]  // change two smallest
        );
    }
}