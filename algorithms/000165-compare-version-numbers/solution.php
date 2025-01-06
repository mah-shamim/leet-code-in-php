<?php

class Solution {

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion($version1, $version2) {
        // Split the version numbers into arrays of segments
        $v1 = explode('.', $version1);
        $v2 = explode('.', $version2);

        // Get the maximum length to iterate over both arrays
        $length = max(count($v1), count($v2));

        // Compare each segment
        for ($i = 0; $i < $length; $i++) {
            // Get the current segment from each version, defaulting to "0" if not present
            $seg1 = isset($v1[$i]) ? (int)$v1[$i] : 0;
            $seg2 = isset($v2[$i]) ? (int)$v2[$i] : 0;

            // Compare segments
            if ($seg1 < $seg2) {
                return -1;
            } elseif ($seg1 > $seg2) {
                return 1;
            }
        }

        // All segments are equal
        return 0;

    }
}