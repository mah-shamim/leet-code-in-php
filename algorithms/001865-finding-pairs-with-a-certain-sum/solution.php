<?php

class FindSumPairs {
    private $nums1;
    private $nums2;
    private $freq;

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     */
    function __construct($nums1, $nums2) {
        $this->nums1 = $nums1;
        $this->nums2 = $nums2;
        $this->freq = array();
        foreach ($nums2 as $num) {
            if (isset($this->freq[$num])) {
                $this->freq[$num]++;
            } else {
                $this->freq[$num] = 1;
            }
        }
    }

    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function add($index, $val) {
        $oldVal = $this->nums2[$index];
        $newVal = $oldVal + $val;
        $this->nums2[$index] = $newVal;

        $this->freq[$oldVal]--;
        if ($this->freq[$oldVal] == 0) {
            unset($this->freq[$oldVal]);
        }

        if (isset($this->freq[$newVal])) {
            $this->freq[$newVal]++;
        } else {
            $this->freq[$newVal] = 1;
        }
    }

    /**
     * @param Integer $tot
     * @return Integer
     */
    function count($tot) {
        $res = 0;
        foreach ($this->nums1 as $x) {
            $required = $tot - $x;
            if ($required < 1) {
                continue;
            }
            if (isset($this->freq[$required])) {
                $res += $this->freq[$required];
            }
        }
        return $res;
    }
}

/**
 * Your FindSumPairs object will be instantiated and called as such:
 * $obj = FindSumPairs($nums1, $nums2);
 * $obj->add($index, $val);
 * $ret_2 = $obj->count($tot);
 */