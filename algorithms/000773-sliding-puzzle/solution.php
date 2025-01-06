<?php

class Solution {

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function slidingPuzzle($board) {
        $target = "123450";  // The solved state as a string
        $initial = implode('', array_map('implode', $board));  // Convert the board into a string
        $queue = [[$initial, 0]];  // Queue for BFS, each element is a tuple (board_state, moves_count)
        $visited = [$initial => true];  // Dictionary to track visited states

        // Direction vectors for up, down, left, right movements
        $directions = [-1, 1, -3, 3];  // Horizontal moves: -1 (left), 1 (right), Vertical moves: -3 (up), 3 (down)

        while (!empty($queue)) {
            list($current, $moves) = array_shift($queue);  // Dequeue the current board state and move count

            if ($current === $target) {
                return $moves;  // If the current state matches the solved state, return the number of moves
            }

            // Find the position of the empty space (0)
            $zeroPos = strpos($current, '0');

            foreach ($directions as $direction) {
                $newPos = $zeroPos + $direction;

                // Ensure the new position is valid and within bounds
                if ($newPos >= 0 && $newPos < 6 && !($zeroPos % 3 == 0 && $direction == -1) && !($zeroPos % 3 == 2 && $direction == 1)) {
                    // Swap the '0' with the adjacent tile
                    $newState = $current;
                    $newState[$zeroPos] = $newState[$newPos];
                    $newState[$newPos] = '0';

                    if (!isset($visited[$newState])) {
                        $visited[$newState] = true;
                        array_push($queue, [$newState, $moves + 1]);  // Enqueue the new state with incremented move count
                    }
                }
            }
        }

        return -1;  // If BFS completes and we don't find the solution, return -1
    }
}