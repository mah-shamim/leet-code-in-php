<?php

class NumberContainers {
    private $indexToNumber;
    private $numberToHeap;
    /**
     */
    function __construct() {
        $this->indexToNumber = array();
        $this->numberToHeap = array();
    }

    /**
     * @param Integer $index
     * @param Integer $number
     * @return NULL
     */
    function change($index, $number) {
        // Check if the index already has a number and it's the same as the new number
        if (isset($this->indexToNumber[$index]) && $this->indexToNumber[$index] === $number) {
            return;
        }
        // Update the index's number
        $this->indexToNumber[$index] = $number;
        // Add the index to the new number's heap
        if (!isset($this->numberToHeap[$number])) {
            $this->numberToHeap[$number] = new SplMinHeap();
        }
        $this->numberToHeap[$number]->insert($index);
    }

    /**
     * @param Integer $number
     * @return Integer
     */
    function find($number) {
        if (!isset($this->numberToHeap[$number])) {
            return -1;
        }
        $heap = $this->numberToHeap[$number];
        while (!$heap->isEmpty()) {
            $index = $heap->top();
            // Check if the current number at this index matches the target number
            if (isset($this->indexToNumber[$index]) && $this->indexToNumber[$index] === $number) {
                return $index;
            } else {
                // Remove the invalid index from the heap
                $heap->extract();
            }
        }
        return -1;
    }
}

/**
 * Your NumberContainers object will be instantiated and called as such:
 * $obj = NumberContainers();
 * $obj->change($index, $number);
 * $ret_2 = $obj->find($number);
 */