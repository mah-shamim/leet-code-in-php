<?php

class Solution {

    /**
     * @param Integer[] $hand
     * @param Integer $groupSize
     * @return Boolean
     */
    function isNStraightHand($hand, $groupSize) {
        $cardCounts = array();
        foreach ($hand as $card) {
            if (!isset($cardCounts[$card])) {
                $cardCounts[$card] = 1;
            } else {
                $cardCounts[$card]++;
            }
        }
        sort($hand);
        foreach ($hand as $card) {
            if (isset($cardCounts[$card])) {
                for ($nextCard = $card; $nextCard < $card + $groupSize; $nextCard++) {
                    if (!isset($cardCounts[$nextCard])) {
                        return false;
                    }
                    if (--$cardCounts[$nextCard] == 0) {
                        unset($cardCounts[$nextCard]);
                    }
                }
            }
        }
        return true;
    }
}