<?php

class Solution {

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion(string $version1, string $version2): int
    {
        $levels1 = explode('.', $version1);
        $levels2 = explode('.', $version2);
        $length = max(count($levels1), count($levels2));

        for ($i = 0; $i < $length; $i++) {
            $v1 = isset($levels1[$i]) ? (int)$levels1[$i] : 0;
            $v2 = isset($levels2[$i]) ? (int)$levels2[$i] : 0;
            if ($v1 < $v2) {
                return -1;
            }
            if ($v1 > $v2) {
                return 1;
            }
        }

        return 0;
    }
}