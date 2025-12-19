<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $meetings
     * @param Integer $firstPerson
     * @return Integer[]
     */
    function findAllPeople($n, $meetings, $firstPerson) {
        // Sort meetings by time
        usort($meetings, function($a, $b) {
            return $a[2] - $b[2];
        });

        // Track who knows the secret
        $knowsSecret = array_fill(0, $n, false);
        $knowsSecret[0] = true;
        $knowsSecret[$firstPerson] = true;

        $m = count($meetings);
        $i = 0;

        while ($i < $m) {
            $currentTime = $meetings[$i][2];

            // Build graph for current time
            $graph = [];
            $peopleAtTime = [];

            while ($i < $m && $meetings[$i][2] == $currentTime) {
                $x = $meetings[$i][0];
                $y = $meetings[$i][1];

                if (!isset($graph[$x])) $graph[$x] = [];
                if (!isset($graph[$y])) $graph[$y] = [];

                $graph[$x][] = $y;
                $graph[$y][] = $x;

                $peopleAtTime[] = $x;
                $peopleAtTime[] = $y;

                $i++;
            }

            // Use BFS to propagate secret within this time's graph
            $queue = new SplQueue();
            $visited = [];

            // Add all people who currently know the secret at this time
            foreach ($peopleAtTime as $person) {
                if ($knowsSecret[$person] && !isset($visited[$person])) {
                    $queue->enqueue($person);
                    $visited[$person] = true;
                }
            }

            // BFS
            while (!$queue->isEmpty()) {
                $current = $queue->dequeue();

                if (!isset($graph[$current])) continue;

                foreach ($graph[$current] as $neighbor) {
                    if (!isset($visited[$neighbor])) {
                        $knowsSecret[$neighbor] = true;
                        $visited[$neighbor] = true;
                        $queue->enqueue($neighbor);
                    }
                }
            }
        }

        // Collect result
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            if ($knowsSecret[$i]) {
                $result[] = $i;
            }
        }

        return $result;
    }
}