<?php

class Solution {

    /**
     * @param String $s
     * @param String[][] $knowledge
     * @return String
     */
    function evaluate(string $s, array $knowledge): string
    {
        $map = [];

        foreach ($knowledge as $pair) {
            $map[$pair[0]] = $pair[1];
        }

        $result = '';
        $n = strlen($s);

        for ($i = 0; $i < $n; $i++) {
            if ($s[$i] === '(') {
                $close = strpos($s, ')', $i + 1);
                $key = substr($s, $i + 1, $close - $i - 1);

                $result .= $map[$key] ?? '?';
                $i = $close;
            } else {
                $result .= $s[$i];
            }
        }

        return $result;
    }
}