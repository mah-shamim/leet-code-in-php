<?php

class Solution {

    /**
     * @param Integer[] $hand
     * @param Integer $groupSize
     * @return Boolean
     */
    function isNStraightHand($hand, $groupSize) {
        $n = count($hand);

        // Early return if the number of cards is not divisible by groupSize
        if ($n % $groupSize != 0) {
            return false;
        }

        // Step 1: Count frequency of each card using a hash table
        $count = [];
        foreach ($hand as $card) {
            if (isset($count[$card])) {
                $count[$card]++;
            } else {
                $count[$card] = 1;
            }
        }

        // Step 2: Sort the hand to ensure we start from the smallest card
        sort($hand);

        // Step 3: Try to form groups starting from the smallest card
        foreach ($hand as $card) {
            // If this card has already been used up, skip it
            if ($count[$card] == 0) {
                continue;
            }

            // Try to form a group of consecutive cards
            for ($i = 0; $i < $groupSize; $i++) {
                $currentCard = $card + $i;
                // If the card is missing or insufficient in number, return false
                if (!isset($count[$currentCard]) || $count[$currentCard] == 0) {
                    return false;
                }
                // Decrease the count of the current card
                $count[$currentCard]--;
            }
        }

        // If we successfully formed all the groups, return true
        return true;
    }
}