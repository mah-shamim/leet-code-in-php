<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $meetings
     * @return Integer
     */
    function mostBooked($n, $meetings) {
        $free_rooms = new SplMinHeap();
        for ($i = 0; $i < $n; $i++) {
            $free_rooms->insert($i);
        }

        $busy_rooms = new class extends SplMinHeap {
            protected function compare($a, $b) {
                if ($a[0] != $b[0]) {
                    return $b[0] - $a[0];
                }
                return $b[1] - $a[1];
            }
        };

        usort($meetings, function($a, $b) {
            return $a[0] - $b[0];
        });

        $current_time = 0;
        $count = array_fill(0, $n, 0);

        foreach ($meetings as $meeting) {
            $s = $meeting[0];
            $e = $meeting[1];
            $current_time = max($current_time, $s);

            while (!$busy_rooms->isEmpty()) {
                $top = $busy_rooms->top();
                if ($top[0] <= $current_time) {
                    $busy_rooms->extract();
                    $free_rooms->insert($top[1]);
                } else {
                    break;
                }
            }

            if ($free_rooms->isEmpty()) {
                $top = $busy_rooms->extract();
                $current_time = $top[0];
                $free_rooms->insert($top[1]);
                while (!$busy_rooms->isEmpty() && $busy_rooms->top()[0] == $current_time) {
                    $top = $busy_rooms->extract();
                    $free_rooms->insert($top[1]);
                }
            }

            $room = $free_rooms->extract();
            $duration = $e - $s;
            $end_time = $current_time + $duration;
            $busy_rooms->insert([$end_time, $room]);
            $count[$room]++;
        }

        $result_room = 0;
        for ($room = 1; $room < $n; $room++) {
            if ($count[$room] > $count[$result_room] ||
                ($count[$room] == $count[$result_room] && $room < $result_room)) {
                $result_room = $room;
            }
        }
        return $result_room;
    }
}