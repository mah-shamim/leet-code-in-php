<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxKelements(array $nums, int $k): int
    {
        $pq = new SplMaxHeap(); // Building Max Heap
        $ans = 0;
        foreach($nums as $num){
            $pq->insert($num);
        }
        $sum = 0;
        for($i=0; $i<$k; $i++){
            $t = $pq->extract();
            $sum += (int)$t;
            $pq->insert((int)($t+2)/3); // taking ceil value
        }
        return $sum;
    }
}