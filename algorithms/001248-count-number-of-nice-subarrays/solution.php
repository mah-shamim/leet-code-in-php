<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numberOfSubarrays($nums, $k) {
        $r  = array(0, 0);
        $res = 0;
        $pre = 0;
        $cur = 0;
        for($i = 0; $i < count($nums); $i++){
            $r[$nums[$i] & 1]++;
            if($r[1] == $k){
                $pre = $cur;
            }
            while($r[1] == $k){
                $r[$nums[$cur] & 1]--;
                $cur++;
            }
            $res += $cur - $pre;
        }
        return $res;
    }
}