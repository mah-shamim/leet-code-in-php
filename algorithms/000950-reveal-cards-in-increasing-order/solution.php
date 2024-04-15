<?php

class Solution
{

    /**
     * @param Integer[] $deck
     * @return Integer[]
     */
    function deckRevealedIncreasing(array $deck): array
    {
        // Initialize an empty double-ended queue (deque)
        $deque_cards = new SplDoublyLinkedList();

        // Sort the deck in descending order and iterate over the cards
        rsort($deck);

        foreach ($deck as $card) {

            // If the deque is not empty, move the last element to the front
            if (!$deque_cards->isEmpty()) {
                $deque_cards->unshift($deque_cards->pop());
            }

            // Insert the current card to the front of the deque
            $deque_cards->unshift($card);

        }

        // Convert the deque back to a list before returning it
        return iterator_to_array($deque_cards);
    }
}