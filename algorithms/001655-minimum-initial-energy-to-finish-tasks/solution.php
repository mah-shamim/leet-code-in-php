<?php

class Solution {

    /**
     * @param Integer[][] $tasks
     * @return Integer
     */
    function minimumEffort(array $tasks): int
    {
        usort($tasks, function($a, $b) {
            // sort by (minimum - actual) descending
            return ($b[1] - $b[0]) - ($a[1] - $a[0]);
        });

        $initial = 0;
        $sumActual = 0;

        foreach ($tasks as $task) {
            $actual = $task[0];
            $minimum = $task[1];
            $initial = max($initial, $minimum + $sumActual);
            $sumActual += $actual;
        }

        return $initial;
    }
}