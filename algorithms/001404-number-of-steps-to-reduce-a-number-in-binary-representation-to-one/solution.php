<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numSteps($s) {
        $ans = 0;

        // All the trailing 0s can be popped by 1 step.
        while ($s[strlen($s) - 1] == '0') {
            $s = substr($s, 0, -1);
            ++$ans;
        }

        if ($s == "1")
            return $ans;

        // `s` is now odd, so add 1 to `s` and cost 1 step.
        ++$ans;

        // All the 1s will become 0s and can be popped by 1 step.
        // All the 0s will become 1s and can be popped by 2 steps (adding 1 then
        // dividing by 2).
        for ($i = 0; $i < strlen($s); $i++) {
            $ans += $s[$i] == '1' ? 1 : 2;
        }

        return $ans;
    }
}
