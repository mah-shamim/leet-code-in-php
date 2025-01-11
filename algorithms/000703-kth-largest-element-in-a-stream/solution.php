<?php

class KthLargest {
    private $minHeap;
    private $k;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->k = $k;
        $this->minHeap = new SplMinHeap();

        foreach ($nums as $num) {
            $this->add($num);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        if ($this->minHeap->count() < $this->k) {
            $this->minHeap->insert($val);
        } elseif ($val > $this->minHeap->top()) {
            $this->minHeap->extract();
            $this->minHeap->insert($val);
        }
        return $this->minHeap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */