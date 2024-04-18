<?php

class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations(string $digits): array
    {
        if (empty($digits)) {
            return [];
        }
        $letters = ["", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz"];
        $ans = [];
        $curr = '';
        $this->findCombinations(0, $digits, $letters, $curr, $ans);
        return $ans;
    }

    private function findCombinations($start, $nums, $letters, &$curr, &$ans): void
    {
        if (strlen($curr) == strlen($nums)) {
            $ans[] = $curr;
            return;
        }
        for ($i = $start; $i < strlen($nums); $i++) {
            $n = intval($nums[$i]);
            for ($j = 0; $j < strlen($letters[$n]); $j++) {
                $ch = $letters[$n][$j];
                $curr .= $ch;
                $this->findCombinations($i + 1, $nums, $letters, $curr, $ans);
                $curr = substr($curr, 0, -1);
            }
        }
    }

}