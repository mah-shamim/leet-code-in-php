<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @param String $baseStr
     * @return String
     */
    function smallestEquivalentString($s1, $s2, $baseStr) {
        $parent = range(0, 25);

        $len = strlen($s1);
        for ($i = 0; $i < $len; $i++) {
            $a = $s1[$i];
            $b = $s2[$i];
            $idxA = ord($a) - ord('a');
            $idxB = ord($b) - ord('a');
            $this->union($idxA, $idxB, $parent);
        }

        $res = '';
        $lenBase = strlen($baseStr);
        for ($i = 0; $i < $lenBase; $i++) {
            $c = $baseStr[$i];
            $idx = ord($c) - ord('a');
            $root = $this->find($idx, $parent);
            $res .= chr($root + ord('a'));
        }

        return $res;
    }

    /**
     * @param $x
     * @param $parent
     * @return mixed
     */
    private function find($x, &$parent) {
        $r = $x;
        while ($parent[$r] != $r) {
            $r = $parent[$r];
        }
        $cur = $x;
        while ($cur != $r) {
            $next = $parent[$cur];
            $parent[$cur] = $r;
            $cur = $next;
        }
        return $r;
    }

    /**
     * @param $x
     * @param $y
     * @param $parent
     * @return void
     */
    private function union($x, $y, &$parent) {
        $rootX = $this->find($x, $parent);
        $rootY = $this->find($y, $parent);
        if ($rootX == $rootY) {
            return;
        }
        if ($rootX < $rootY) {
            $parent[$rootY] = $rootX;
        } else {
            $parent[$rootX] = $rootY;
        }
    }
}