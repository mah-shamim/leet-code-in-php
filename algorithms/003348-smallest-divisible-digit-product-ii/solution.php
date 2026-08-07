<?php

class Solution {
    private array $factorCounts;

    /**
     *
     */
    public function __construct() {
        // Initialize digit factor counts
        $this->factorCounts = [
            0 => [],
            1 => [],
            2 => [2 => 1],
            3 => [3 => 1],
            4 => [2 => 2],
            5 => [5 => 1],
            6 => [2 => 1, 3 => 1],
            7 => [7 => 1],
            8 => [2 => 3],
            9 => [3 => 2]
        ];
    }
    /**
     * @param String $num
     * @param Integer $t
     * @return String
     */
    function smallestNumber(string $num, int $t): string
    {
        [$primeCount, $isDivisible] = $this->getPrimeCount($t);
        if (!$isDivisible) {
            return "-1";
        }

        $factorCount = $this->getFactorCount($primeCount);
        if ($this->sumValues($factorCount) > strlen($num)) {
            return $this->construct($factorCount);
        }

        $primeCountPrefix = $this->getPrimeCountFromString($num);
        $firstZeroIndex = strpos($num, '0');
        if ($firstZeroIndex === false) {
            $firstZeroIndex = strlen($num);
            if ($this->isSubset($primeCount, $primeCountPrefix)) {
                return $num;
            }
        }

        $numLength = strlen($num);
        for ($i = $numLength - 1; $i >= 0; $i--) {
            $d = intval($num[$i]);
            // Remove current digit's factors from primeCountPrefix
            $primeCountPrefix = $this->subtract($primeCountPrefix, $this->factorCounts[$d]);
            $spaceAfterThisDigit = $numLength - 1 - $i;

            if ($i > $firstZeroIndex) {
                continue;
            }

            for ($biggerDigit = $d + 1; $biggerDigit < 10; $biggerDigit++) {
                // Compute required factors after replacement
                $temp = $this->subtract($primeCount, $primeCountPrefix);
                $factorsAfterReplacement = $this->getFactorCount(
                    $this->subtract($temp, $this->factorCounts[$biggerDigit])
                );

                if ($this->sumValues($factorsAfterReplacement) <= $spaceAfterThisDigit) {
                    $fillOnes = $spaceAfterThisDigit - $this->sumValues($factorsAfterReplacement);
                    return substr($num, 0, $i) .
                        (string)$biggerDigit .
                        str_repeat('1', $fillOnes) .
                        $this->construct($factorsAfterReplacement);
                }
            }
        }

        // No solution of same length
        $factorsAfterExtension = $this->getFactorCount($primeCount);
        return str_repeat('1', strlen($num) + 1 - $this->sumValues($factorsAfterExtension)) .
            $this->construct($factorsAfterExtension);
    }

    /**
     * @param int $t
     * @return array
     */
    private function getPrimeCount(int $t): array {
        $count = [2 => 0, 3 => 0, 5 => 0, 7 => 0];
        foreach ([2, 3, 5, 7] as $prime) {
            while ($t % $prime === 0) {
                $t = intdiv($t, $prime);
                $count[$prime]++;
            }
        }
        return [$count, $t === 1];
    }

    /**
     * @param string $num
     * @return array
     */
    private function getPrimeCountFromString(string $num): array {
        $count = [2 => 0, 3 => 0, 5 => 0, 7 => 0];
        $numLength = strlen($num);
        for ($i = 0; $i < $numLength; $i++) {
            $d = intval($num[$i]);
            if (isset($this->factorCounts[$d])) {
                foreach ($this->factorCounts[$d] as $prime => $freq) {
                    $count[$prime] += $freq;
                }
            }
        }
        return $count;
    }

    /**
     * @param array $count
     * @return array
     */
    private function getFactorCount(array $count): array {
        $result = [2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0];

        $count8 = intdiv($count[2] ?? 0, 3);
        $remaining2 = ($count[2] ?? 0) % 3;

        $count9 = intdiv($count[3] ?? 0, 2);
        $count3 = ($count[3] ?? 0) % 2;

        $count4 = intdiv($remaining2, 2);
        $count2 = $remaining2 % 2;

        $count6 = 0;
        if ($count2 === 1 && $count3 === 1) {
            $count2 = 0;
            $count3 = 0;
            $count6 = 1;
        }

        if ($count3 === 1 && $count4 === 1) {
            $count2 = 1;
            $count6 = 1;
            $count3 = 0;
            $count4 = 0;
        }

        return [
            2 => $count2,
            3 => $count3,
            4 => $count4,
            5 => $count[5] ?? 0,
            6 => $count6,
            7 => $count[7] ?? 0,
            8 => $count8,
            9 => $count9
        ];
    }

    /**
     * @param array $factors
     * @return string
     */
    private function construct(array $factors): string {
        $result = '';
        for ($digit = 2; $digit <= 9; $digit++) {
            if (isset($factors[$digit]) && $factors[$digit] > 0) {
                $result .= str_repeat((string)$digit, $factors[$digit]);
            }
        }
        return $result;
    }

    /**
     * @param array $a
     * @param array $b
     * @return bool
     */
    private function isSubset(array $a, array $b): bool {
        foreach ($a as $key => $value) {
            if (!isset($b[$key]) || $b[$key] < $value) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param array $a
     * @param array $b
     * @return array
     */
    private function subtract(array $a, array $b): array {
        foreach ($b as $key => $value) {
            $a[$key] = max(0, ($a[$key] ?? 0) - $value);
        }
        return $a;
    }

    /**
     * @param array $count
     * @return int
     */
    private function sumValues(array $count): int {
        return array_sum($count);
    }
}