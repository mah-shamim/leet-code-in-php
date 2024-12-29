<?php

class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return String
     */
    function longestDiverseString($a, $b, $c) {
        // Create a max heap to store character counts
        $maxHeap = [];
        if ($a > 0) $maxHeap[] = ['char' => 'a', 'count' => $a];
        if ($b > 0) $maxHeap[] = ['char' => 'b', 'count' => $b];
        if ($c > 0) $maxHeap[] = ['char' => 'c', 'count' => $c];

        // Sort the heap based on count (max heap)
        usort($maxHeap, function($x, $y) {
            return $y['count'] - $x['count'];
        });

        $result = '';

        while (count($maxHeap) > 0) {
            // Sort the heap to get the character with the highest count
            usort($maxHeap, function($x, $y) {
                return $y['count'] - $x['count'];
            });

            // Get the character with the highest count
            $first = array_shift($maxHeap); // Most frequent character
            if (strlen($result) >= 2 && $result[-1] == $first['char'] && $result[-2] == $first['char']) {
                // We can't add this character because it would create 3 in a row
                if (count($maxHeap) == 0) break; // No other character to add

                // Get the second character
                $second = array_shift($maxHeap);
                $result .= $second['char'];
                $second['count']--;
                if ($second['count'] > 0) {
                    $maxHeap[] = $second; // Add it back if there's more left
                }
                // Put the first character back
                $maxHeap[] = $first; // Add the first character back
            } else {
                // We can add the first character
                $result .= $first['char'];
                $first['count']--;
                if ($first['count'] > 0) {
                    $maxHeap[] = $first; // Add it back if there's more left
                }
            }
        }

        return $result;
    }
}