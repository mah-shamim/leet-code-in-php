<?php

class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num) {
        if ($num == 0) {
            return "Zero";
        }

        $thousands = ["", "Thousand", "Million", "Billion"];
        $index = 0;
        $result = "";

        while ($num > 0) {
            if ($num % 1000 != 0) {
                $result = $this->helper($num % 1000) . $thousands[$index] . " " . $result;
            }
            $num = intval($num / 1000);
            $index++;
        }

        return trim($result);
    }

    /**
     * @param $num
     * @return string
     */
    function helper($num) {
        $below_20 = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
        $tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

        if ($num == 0) {
            return "";
        } elseif ($num < 20) {
            return $below_20[$num] . " ";
        } elseif ($num < 100) {
            return $tens[intval($num / 10)] . " " . $this->helper($num % 10);
        } else {
            return $below_20[intval($num / 100)] . " Hundred " . $this->helper($num % 100);
        }
    }
}