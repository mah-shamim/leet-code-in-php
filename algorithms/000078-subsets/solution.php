<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $ans = [[]];
        foreach($nums as $num){
            $ans_size = count($ans);
            for($i = 0; $i < $ans_size; $i++){
                $cur = $ans[$i];
                $cur[] = $num;
                $ans[] = $cur;
            }
        }
        return $ans;
    }
}