<?php

class Solution {

    /**
     * @param String[] $queries
     * @param String[] $dictionary
     * @return String[]
     */
    function twoEditWords(array $queries, array $dictionary): array
    {
        $result = [];

        foreach ($queries as $query) {
            $matched = false;

            foreach ($dictionary as $dictWord) {
                $diffCount = 0;
                $len = strlen($query);

                for ($i = 0; $i < $len; $i++) {
                    if ($query[$i] !== $dictWord[$i]) {
                        $diffCount++;
                        if ($diffCount > 2) {
                            break;
                        }
                    }
                }

                if ($diffCount <= 2) {
                    $matched = true;
                    break;
                }
            }

            if ($matched) {
                $result[] = $query;
            }
        }

        return $result;
    }
}