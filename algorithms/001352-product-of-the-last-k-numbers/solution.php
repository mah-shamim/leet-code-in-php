<?php

class ProductOfNumbers {
    /**
     * @var int[]
     */
    private $prefixProducts;

    /**
     */
    function __construct() {
        $this->prefixProducts = [1];
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function add($num) {
        if ($num == 0) {
            $this->prefixProducts = [1];
        } else {
            $last = end($this->prefixProducts);
            $this->prefixProducts[] = $last * $num;
        }
    }

    /**
     * @param Integer $k
     * @return Integer
     */
    function getProduct($k) {
        $n = count($this->prefixProducts) - 1;
        if ($k > $n) {
            return 0;
        }
        return $this->prefixProducts[$n] / $this->prefixProducts[$n - $k];
    }
}

/**
 * Your ProductOfNumbers object will be instantiated and called as such:
 * $obj = ProductOfNumbers();
 * $obj->add($num);
 * $ret_2 = $obj->getProduct($k);
 */