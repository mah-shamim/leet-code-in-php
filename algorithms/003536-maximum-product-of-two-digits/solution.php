<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function maxProduct(int $n): int
    {
        $digits = array_map('intval', str_split((string)$n));
        $maxProduct = 0;

        for ($i = 0; $i < count($digits); $i++) {
            for ($j = $i + 1; $j < count($digits); $j++) {
                $product = $digits[$i] * $digits[$j];
                if ($product > $maxProduct) {
                    $maxProduct = $product;
                }
            }
        }

        return $maxProduct;
    }
}