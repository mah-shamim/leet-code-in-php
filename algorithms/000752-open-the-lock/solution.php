<?php

class Solution {

    /**
     * @param String[] $deadends
     * @param String $target
     * @return Integer
     */
    function openLock($deadends, $target) {
        // Convert deadends to a set for O(1) lookup
        $dead = array_flip($deadends);

        // Check if the initial state '0000' is a deadend
        if (isset($dead['0000'])) {
            return -1;
        }

        // Initialize BFS
        $queue = [['0000', 0]];  // Queue will store the state and the number of moves to reach it
        $visited = ['0000' => true];  // Mark '0000' as visited

        // BFS loop
        while (!empty($queue)) {
            list($state, $moves) = array_shift($queue);

            // If we reach the target, return the number of moves
            if ($state == $target) {
                return $moves;
            }

            // Get all possible next states
            $nextStates = $this->getNextStates($state);
            foreach ($nextStates as $next) {
                // If this state is not a deadend and has not been visited before
                if (!isset($dead[$next]) && !isset($visited[$next])) {
                    // Mark it as visited and add to the queue
                    $visited[$next] = true;
                    $queue[] = [$next, $moves + 1];
                }
            }
        }

        // If we exhaust all possibilities and don't reach the target, return -1
        return -1;
    }

    /**
     * Helper function to get the next possible states
     *
     * @param $current
     * @return array
     */
    private function getNextStates($current) {
        $result = [];
        for ($i = 0; $i < 4; $i++) {
            $digit = $current[$i];
            // Moving one up
            $up = $current;
            $up[$i] = ($digit == '9') ? '0' : chr(ord($digit) + 1);
            $result[] = $up;

            // Moving one down
            $down = $current;
            $down[$i] = ($digit == '0') ? '9' : chr(ord($digit) - 1);
            $result[] = $down;
        }
        return $result;
    }

}