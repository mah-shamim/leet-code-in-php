<?php

class CustomStack {
    /**
     * @var array
     */
    private $stack;
    /**
     * @var int
     */
    private $maxSize;
    /**
     * Constructor to initialize the stack with a given maxSize
     *
     * @param Integer $maxSize
     */
    function __construct($maxSize) {
        $this->stack = array();
        $this->maxSize = $maxSize;
    }

    /**
     * Push an element to the stack if it has not reached the maxSize
     *
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        if (count($this->stack) < $this->maxSize) {
            array_push($this->stack, $x);
        }
    }

    /**
     * Pop the top element from the stack and return it, return -1 if the stack is empty
     *
     * @return Integer
     */
    function pop() {
        if (empty($this->stack)) {
            return -1;
        }
        return array_pop($this->stack);
    }

    /**
     * Increment the bottom k elements of the stack by val
     *
     * @param Integer $k
     * @param Integer $val
     * @return NULL
     */
    function increment($k, $val) {
        // We will only iterate through the first `k` elements or the full stack if it's smaller than `k`
        $limit = min($k, count($this->stack));
        for ($i = 0; $i < $limit; $i++) {
            $this->stack[$i] += $val;
        }
    }
}

/**
 * Your CustomStack object will be instantiated and called as such:
 * $obj = CustomStack($maxSize);
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $obj->increment($k, $val);
 */