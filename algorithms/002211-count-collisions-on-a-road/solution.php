<?php

class Solution {

    /**
     * @param String $directions
     * @return Integer
     */
    function countCollisions($directions) {
        $stack = [];
        $collisions = 0;

        for ($i = 0; $i < strlen($directions); $i++) {
            $car = $directions[$i];

            if ($car == 'R') {
                // Right-moving car - might collide later
                $stack[] = 'R';
            }
            elseif ($car == 'S') {
                // Stationary car - all right-moving cars in stack will collide with it
                while (!empty($stack) && end($stack) == 'R') {
                    array_pop($stack);
                    $collisions++; // R collides with S = 1 collision
                }
                $stack[] = 'S'; // Stationary car remains
            }
            else { // $car == 'L'
                if (!empty($stack)) {
                    if (end($stack) == 'R') {
                        // R and L collide (opposite directions)
                        array_pop($stack);
                        $collisions += 2; // Opposite directions = 2 collisions

                        // The collision point becomes stationary
                        // Any other R cars in stack will now collide with this stationary point
                        while (!empty($stack) && end($stack) == 'R') {
                            array_pop($stack);
                            $collisions++; // Each R collides with stationary point = 1 collision
                        }
                        $stack[] = 'S'; // Collision point is now stationary
                    }
                    elseif (end($stack) == 'S') {
                        // L collides with stationary car
                        $collisions++; // L collides with S = 1 collision
                        // Stationary car remains, L becomes part of stationary point
                    }
                    // If top is 'L', no collision (both moving left)
                }
                // If stack is empty, this L will never collide
            }
        }

        return $collisions;
    }
}