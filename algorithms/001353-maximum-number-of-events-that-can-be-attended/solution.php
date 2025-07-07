<?php

class Solution {

    /**
     * @param Integer[][] $events
     * @return Integer
     */
    function maxEvents($events) {
        sort($events);
        $heap = new SplMinHeap();
        $i = 0;
        $n = count($events);
        $day = 0;
        $count = 0;

        while ($i < $n || !$heap->isEmpty()) {
            if ($heap->isEmpty()) {
                $day = $events[$i][0];
            }

            while ($i < $n && $events[$i][0] <= $day) {
                $heap->insert($events[$i][1]);
                $i++;
            }

            while (!$heap->isEmpty() && $heap->top() < $day) {
                $heap->extract();
            }

            if (!$heap->isEmpty()) {
                $heap->extract();
                $count++;
                $day++;
            }
        }

        return $count;
    }
}