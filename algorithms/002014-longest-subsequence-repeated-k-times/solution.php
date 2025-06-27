<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function longestSubsequenceRepeatedK($s, $k) {
        $n = strlen($s);
        $freq = array_fill(0, 26, 0);
        for ($i = 0; $i < $n; $i++) {
            $char = $s[$i];
            $idx = ord($char) - ord('a');
            $freq[$idx]++;
        }

        $valid = [];
        for ($i = 0; $i < 26; $i++) {
            if ($freq[$i] >= $k) {
                $char = chr(ord('a') + $i);
                $valid[] = $char;
            }
        }

        if (empty($valid)) {
            return "";
        }

        rsort($valid);

        $max_len = min(7, intdiv($n, $k));

        for ($len = $max_len; $len >= 1; $len--) {
            $result = $this->dfs($len, "", $valid, $freq, $k, $s);
            if ($result !== "") {
                return $result;
            }
        }

        return "";
    }

    /**
     * @param $len
     * @param $path
     * @param $valid
     * @param $freq
     * @param $k
     * @param $s
     * @return array|bool|int|int[]|mixed|string|null
     */
    private function dfs($len, $path, $valid, $freq, $k, $s) {
        if ($len == 0) {
            if ($this->isKSub($s, $path, $k)) {
                return $path;
            }
            return "";
        }

        foreach ($valid as $c) {
            $count_c = 0;
            $path_len = strlen($path);
            for ($i = 0; $i < $path_len; $i++) {
                if ($path[$i] == $c) {
                    $count_c++;
                }
            }
            $idx = ord($c) - ord('a');
            $max_use = intdiv($freq[$idx], $k);
            if ($count_c < $max_use) {
                $new_path = $path . $c;
                $res = $this->dfs($len - 1, $new_path, $valid, $freq, $k, $s);
                if ($res !== "") {
                    return $res;
                }
            }
        }

        return "";
    }

    /**
     * @param $s
     * @param $seq
     * @param $k
     * @return bool
     */
    private function isKSub($s, $seq, $k) {
        $seq_len = strlen($seq);
        if ($seq_len == 0) {
            return true;
        }
        $j = 0;
        $rep = 0;
        $s_len = strlen($s);
        for ($i = 0; $i < $s_len; $i++) {
            if ($s[$i] == $seq[$j]) {
                $j++;
                if ($j == $seq_len) {
                    $rep++;
                    if ($rep == $k) {
                        return true;
                    }
                    $j = 0;
                }
            }
        }
        return false;
    }
}