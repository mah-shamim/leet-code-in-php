<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $lastIndices = array_fill(0, 256, -1);
        $maxLen = 0;
        $curLen = 0;
        $start = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $cur = $s[$i];
            $curAscii = ord($cur);

            if ($lastIndices[$curAscii] < $start) {
                $lastIndices[$curAscii] = $i;
                $curLen++;
            } else {
                $lastIndex = $lastIndices[$curAscii];
                $start = $lastIndex + 1;
                $curLen = $i - $start + 1;
                $lastIndices[$curAscii] = $i;
            }

            if ($curLen > $maxLen) {
                $maxLen = $curLen;
            }
        }

        return $maxLen;
    }
}