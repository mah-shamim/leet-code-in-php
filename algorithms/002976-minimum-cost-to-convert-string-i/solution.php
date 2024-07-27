<?php

class Solution {

    /**
     * @param String $source
     * @param String $target
     * @param String[] $original
     * @param String[] $changed
     * @param Integer[] $cost
     * @return Integer
     */
    function minimumCost($source, $target, $original, $changed, $cost) {
        $n = strlen($source);
        $numChars = 26;
        $inf = 1000000000; // A large number representing infinity

        // Initialize the cost matrix
        $graph = array_fill(0, $numChars, array_fill(0, $numChars, $inf));

        // Set the cost to change a character to itself to 0
        for ($i = 0; $i < $numChars; $i++) {
            $graph[$i][$i] = 0;
        }

        // Populate the graph with the given transformations and their costs
        for ($i = 0; $i < count($original); $i++) {
            $origIndex = ord($original[$i]) - ord('a');
            $changeIndex = ord($changed[$i]) - ord('a');
            $graph[$origIndex][$changeIndex] = min($graph[$origIndex][$changeIndex], $cost[$i]);
        }

        // Use the Floyd-Warshall algorithm to compute the shortest paths
        for ($k = 0; $k < $numChars; $k++) {
            for ($i = 0; $i < $numChars; $i++) {
                for ($j = 0; $j < $numChars; $j++) {
                    if ($graph[$i][$j] > $graph[$i][$k] + $graph[$k][$j]) {
                        $graph[$i][$j] = $graph[$i][$k] + $graph[$k][$j];
                    }
                }
            }
        }

        // Calculate the total minimum cost to convert source to target
        $totalCost = 0;
        for ($i = 0; $i < $n; $i++) {
            $sourceChar = ord($source[$i]) - ord('a');
            $targetChar = ord($target[$i]) - ord('a');

            if ($graph[$sourceChar][$targetChar] == $inf) {
                return -1; // It's impossible to convert source to target
            }

            $totalCost += $graph[$sourceChar][$targetChar];
        }

        return $totalCost;
    }
}