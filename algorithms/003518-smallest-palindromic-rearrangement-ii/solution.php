<?php

class Solution {
    private const MAX = 1000001;

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function smallestPalindrome(string $s, int $k): string
    {
        $count = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($s); $i++) {
            $count[ord($s[$i]) - ord('a')]++;
        }

        if (!$this->isPalindromePossible($count)) {
            return "";
        }

        [$halfCount, $midLetter] = $this->getHalfCountAndMidLetter($count);
        $totalPerm = $this->calculateTotalPermutations($halfCount);

        if ($k > $totalPerm) {
            return "";
        }

        $leftHalf = $this->generateLeftHalf($halfCount, $k);
        return implode("", $leftHalf) . $midLetter . implode("", array_reverse($leftHalf));
    }

    /**
     * @param $count
     * @return bool
     */
    private function isPalindromePossible($count): bool
    {
        $oddCount = 0;
        for ($i = 0; $i < 26; $i++) {
            if ($count[$i] % 2 == 1) $oddCount++;
        }
        return $oddCount <= 1;
    }

    /**
     * @param $count
     * @return array
     */
    private function getHalfCountAndMidLetter($count): array
    {
        $halfCount = array_fill(0, 26, 0);
        $midLetter = "";
        for ($i = 0; $i < 26; $i++) {
            $halfCount[$i] = intdiv($count[$i], 2);
            if ($count[$i] % 2 == 1) {
                $midLetter = chr($i + ord('a'));
            }
        }
        return [$halfCount, $midLetter];
    }

    /**
     * @param $halfCount
     * @return int
     */
    private function calculateTotalPermutations($halfCount): int
    {
        return $this->countArrangements($halfCount);
    }

    /**
     * @param $halfCount
     * @param $k
     * @return array
     */
    private function generateLeftHalf(&$halfCount, $k): array
    {
        $halfLen = array_sum($halfCount);
        $left = [];

        for ($pos = 0; $pos < $halfLen; $pos++) {
            for ($i = 0; $i < 26; $i++) {
                if ($halfCount[$i] == 0) continue;

                $halfCount[$i]--;
                $arrangements = $this->countArrangements($halfCount);

                if ($arrangements >= $k) {
                    $left[] = chr($i + ord('a'));
                    break;
                } else {
                    $k -= $arrangements;
                    $halfCount[$i]++;
                }
            }
        }

        return $left;
    }

    /**
     * @param $count
     * @return int
     */
    private function countArrangements($count): int
    {
        $total = array_sum($count);
        $res = 1;

        for ($i = 0; $i < 26; $i++) {
            if ($count[$i] == 0) continue;
            $res *= $this->nCk($total, $count[$i]);
            if ($res >= 1000001) return 1000001;
            $total -= $count[$i];
        }

        return $res;
    }

    /**
     * @param $n
     * @param $k
     * @return int
     */
    private function nCk($n, $k): int
    {
        $res = 1;
        $k = min($k, $n - $k);
        for ($i = 1; $i <= $k; $i++) {
            $res = ($res * ($n - $i + 1)) / $i;
            if ($res >= 1000001) return 1000001;
        }
        return (int)$res;
    }
}