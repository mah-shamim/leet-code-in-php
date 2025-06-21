<?php

class Solution {

    /**
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    function minimumDeletions($word, $k) {
        $freq = array();
        $len = strlen($word);
        for ($i = 0; $i < $len; $i++) {
            $c = $word[$i];
            if (!isset($freq[$c])) {
                $freq[$c] = 0;
            }
            $freq[$c]++;
        }
        $freqs = array_values($freq);
        $maxFreq = empty($freqs) ? 0 : max($freqs);

        $candidateSet = array();
        $candidateSet[0] = true;
        $candidateSet[$maxFreq] = true;

        foreach ($freqs as $f) {
            $candidateSet[$f] = true;
            $next = $f + 1;
            if ($next <= $maxFreq) {
                $candidateSet[$next] = true;
            }
            $cand1 = $f - $k;
            $cand2 = $cand1 + 1;
            if ($cand1 >= 0) {
                $candidateSet[$cand1] = true;
            }
            if ($cand2 >= 0 && $cand2 <= $maxFreq) {
                $candidateSet[$cand2] = true;
            }
        }

        $candidates = array_keys($candidateSet);
        $minDel = PHP_INT_MAX;

        foreach ($candidates as $m) {
            if ($m < 0 || $m > $maxFreq) {
                continue;
            }
            $del = 0;
            foreach ($freqs as $f) {
                if ($f < $m) {
                    $del += $f;
                } else if ($f > $m + $k) {
                    $del += ($f - $m - $k);
                }
            }
            if ($del < $minDel) {
                $minDel = $del;
            }
        }

        return $minDel;
    }
}