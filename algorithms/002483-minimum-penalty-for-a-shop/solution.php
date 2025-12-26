<?php

class Solution {

    /**
     * @param String $customers
     * @return Integer
     */
    function bestClosingTime($customers) {
        $n = strlen($customers);
        $minPenalty = 0;
        $currentPenalty = 0;
        $bestHour = 0;

        for ($i = 0; $i < $n; $i++) {
            // If customer comes ('Y'), penalty decreases if we're open
            // If customer doesn't come ('N'), penalty increases if we're open
            if ($customers[$i] == 'Y') {
                $currentPenalty--;
            } else {
                $currentPenalty++;
            }

            // Update minimum penalty
            if ($currentPenalty < $minPenalty) {
                $minPenalty = $currentPenalty;
                $bestHour = $i + 1;
            }
        }

        return $bestHour;
    }
}