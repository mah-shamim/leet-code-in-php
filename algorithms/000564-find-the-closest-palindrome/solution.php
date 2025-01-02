<?php

class Solution {

    /**
     * @param String $n
     * @return String
     */
    function nearestPalindromic($n) {
        $length = strlen($n);
        $isOddLength = $length % 2 != 0;
        $halfLength = intval(($length + 1) / 2);
        $firstHalf = substr($n, 0, $halfLength);

        // Generate potential palindrome candidates
        $candidates = [];
        $mirroredPalindrome = $this->generatePalindrome($firstHalf, $isOddLength);
        $candidates[] = $mirroredPalindrome;

        // Adjust the first half up and down by 1
        $firstHalfPlusOne = strval(intval($firstHalf) + 1);
        $candidates[] = $this->generatePalindrome($firstHalfPlusOne, $isOddLength);

        $firstHalfMinusOne = strval(intval($firstHalf) - 1);
        $candidates[] = $this->generatePalindrome($firstHalfMinusOne, $isOddLength);

        // Edge case: 10...01 and 9...9
        $candidates[] = strval(pow(10, $length - 1) - 1);
        $candidates[] = strval(pow(10, $length) + 1);

        // Find the closest palindrome
        $nearestPalindromic = null;
        $minDifference = PHP_INT_MAX;

        foreach ($candidates as $candidate) {
            if ($candidate !== $n) {
                $diff = abs(intval($n) - intval($candidate));
                if ($diff < $minDifference || ($diff == $minDifference && intval($candidate) < intval($nearestPalindromic))) {
                    $minDifference = $diff;
                    $nearestPalindromic = $candidate;
                }
            }
        }

        return $nearestPalindromic;
    }

    /**
     * @param $firstHalf
     * @param $isOddLength
     * @return string
     */
    private function generatePalindrome($firstHalf, $isOddLength) {
        $secondHalf = strrev(substr($firstHalf, 0, $isOddLength ? -1 : $firstHalf));
        return $firstHalf . $secondHalf;
    }

}