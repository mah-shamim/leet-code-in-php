<?php

class Solution {

    /**
     * @param String[] $wordlist
     * @param String[] $queries
     * @return String[]
     */
    function spellchecker($wordlist, $queries) {
        $exactMap = [];
        $caseMap = [];
        $vowelMap = [];

        foreach ($wordlist as $word) {
            $exactMap[$word] = true;

            $lower = strtolower($word);
            if (!isset($caseMap[$lower])) {
                $caseMap[$lower] = $word;
            }

            $devoweled = $this->devowel($lower);
            if (!isset($vowelMap[$devoweled])) {
                $vowelMap[$devoweled] = $word;
            }
        }

        $result = [];
        foreach ($queries as $query) {
            if (isset($exactMap[$query])) {
                $result[] = $query;
                continue;
            }

            $lowerQuery = strtolower($query);
            if (isset($caseMap[$lowerQuery])) {
                $result[] = $caseMap[$lowerQuery];
                continue;
            }

            $devoweledQuery = $this->devowel($lowerQuery);
            if (isset($vowelMap[$devoweledQuery])) {
                $result[] = $vowelMap[$devoweledQuery];
                continue;
            }

            $result[] = "";
        }

        return $result;
    }

    /**
     * @param $s
     * @return array|string|string[]
     */
    function devowel($s) {
        return str_replace(['a', 'e', 'i', 'o', 'u'], '*', $s);
    }
}