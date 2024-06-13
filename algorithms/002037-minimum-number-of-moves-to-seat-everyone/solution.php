<?php

class Solution {

    /**
     * @param Integer[] $seats
     * @param Integer[] $students
     * @return Integer
     */
    function minMovesToSeat($seats, $students) {
        $ans = 0;

        sort($seats);
        sort($students);

        for ($i = 0; $i < count($seats); $i++) {
            $ans += abs($seats[$i] - $students[$i]);
        }

        return $ans;
    }
}