<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @param ListNode $head
     * @return Integer[][]
     */
    function spiralMatrix($m, $n, $head) {
        // Step 1: Initialize an m x n matrix filled with -1
        $matrix = array_fill(0, $m, array_fill(0, $n, -1));

        // Step 2: Define the direction vectors for right, down, left, and up movements
        $dirs = [[0, 1], [1, 0], [0, -1], [-1, 0]]; // right, down, left, up
        $dirIndex = 0; // Start with the direction moving right
        $row = 0;
        $col = 0;

        // Step 3: Traverse the linked list
        $curr = $head;

        while ($curr) {
            // Step 4: Fill the current position in the matrix with the current node's value
            $matrix[$row][$col] = $curr->val;

            // Move to the next node in the linked list
            $curr = $curr->next;

            // Calculate the next position
            $nextRow = $row + $dirs[$dirIndex][0];
            $nextCol = $col + $dirs[$dirIndex][1];

            // Step 5: Check if the next position is out of bounds or already filled
            if ($nextRow < 0 || $nextRow >= $m || $nextCol < 0 || $nextCol >= $n || $matrix[$nextRow][$nextCol] != -1) {
                // Change direction (rotate clockwise)
                $dirIndex = ($dirIndex + 1) % 4;
                // Update the next position after changing direction
                $nextRow = $row + $dirs[$dirIndex][0];
                $nextCol = $col + $dirs[$dirIndex][1];
            }

            // Step 6: Update row and col to the next position
            $row = $nextRow;
            $col = $nextCol;
        }

        return $matrix;

    }
}