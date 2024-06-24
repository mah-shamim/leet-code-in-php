<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $limit
     * @return Integer
     */
    function longestSubarray($nums, $limit) {
        $ans = 1;
        $minQ = new SplDoublyLinkedList();
        $maxQ = new SplDoublyLinkedList();

        for ($l = 0, $r = 0; $r < count($nums); ++$r) {
            while (!$minQ->isEmpty() && $minQ->top() > $nums[$r])
                $minQ->pop();
            $minQ->push($nums[$r]);
            while (!$maxQ->isEmpty() && $maxQ->top() < $nums[$r])
                $maxQ->pop();
            $maxQ->push($nums[$r]);
            while ($maxQ->bottom() - $minQ->bottom() > $limit) {
                if ($minQ->bottom() == $nums[$l])
                    $minQ->shift();
                if ($maxQ->bottom() == $nums[$l])
                    $maxQ->shift();
                ++$l;
            }
            $ans = max($ans, $r - $l + 1);
        }

        return $ans;
    }
}