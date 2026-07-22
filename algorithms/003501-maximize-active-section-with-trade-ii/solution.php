<?php

class Group {
    public int $start;
    public int $length;

    /**
     * @param int $start
     * @param int $length
     */
    public function __construct(int $start, int $length) {
        $this->start = $start;
        $this->length = $length;
    }
}

class SparseTable {
    private int $n;
    private array $st; // 2D array for sparse table

    /**
     * @param array $nums
     */
    public function __construct(array $nums) {
        $this->n = count($nums);
        $this->st = [];
        $this->st[0] = $nums;

        for ($i = 1; (1 << $i) <= $this->n; $i++) {
            $this->st[$i] = [];
            $len = 1 << ($i - 1);
            for ($j = 0; $j + (1 << $i) <= $this->n; $j++) {
                $this->st[$i][$j] = max(
                    $this->st[$i - 1][$j],
                    $this->st[$i - 1][$j + $len]
                );
            }
        }
    }

    /**
     * Returns max(nums[l..r])
     *
     * @param int $l
     * @param int $r
     * @return int
     */
    public function query(int $l, int $r): int {
        $length = $r - $l + 1;
        $i = (int)floor(log($length, 2));
        $pow = 1 << $i;
        return max(
            $this->st[$i][$l],
            $this->st[$i][$r - $pow + 1]
        );
    }
}


class Solution {

    /**
     * @param String $s
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function maxActiveSectionsAfterTrade(string $s, array $queries): array
    {
        $n = strlen($s);
        $ones = substr_count($s, '1');
        [$zeroGroups, $zeroGroupIndex] = $this->getZeroGroups($s);

        if (empty($zeroGroups)) {
            return array_fill(0, count($queries), $ones);
        }

        $st = new SparseTable($this->getZeroMergeLengths($zeroGroups));
        $ans = [];

        foreach ($queries as $query) {
            $l = $query[0];
            $r = $query[1];
            $left = ($zeroGroupIndex[$l] == -1) ? -1 : (
                $zeroGroups[$zeroGroupIndex[$l]]->length -
                ($l - $zeroGroups[$zeroGroupIndex[$l]]->start)
            );
            $right = ($zeroGroupIndex[$r] == -1) ? -1 : (
                $r - $zeroGroups[$zeroGroupIndex[$r]]->start + 1
            );

            [$startAdjacentGroupIndex, $endAdjacentGroupIndex] = $this->mapToAdjacentGroupIndices(
                $zeroGroupIndex[$l] + 1,
                ($s[$r] == '1') ? $zeroGroupIndex[$r] : $zeroGroupIndex[$r] - 1
            );

            $activeSections = $ones;

            if ($s[$l] == '0' && $s[$r] == '0' &&
                $zeroGroupIndex[$l] + 1 == $zeroGroupIndex[$r]) {
                $activeSections = max($activeSections, $ones + $left + $right);
            }
            else if ($startAdjacentGroupIndex <= $endAdjacentGroupIndex) {
                $activeSections = max(
                    $activeSections,
                    $ones + $st->query($startAdjacentGroupIndex, $endAdjacentGroupIndex)
                );
            }

            if ($s[$l] == '0' &&
                $zeroGroupIndex[$l] + 1 <=
                (($s[$r] == '1') ? $zeroGroupIndex[$r] : $zeroGroupIndex[$r] - 1)) {
                $activeSections = max(
                    $activeSections,
                    $ones + $left + $zeroGroups[$zeroGroupIndex[$l] + 1]->length
                );
            }

            if ($s[$r] == '0' && $zeroGroupIndex[$l] < $zeroGroupIndex[$r] - 1) {
                $activeSections = max(
                    $activeSections,
                    $ones + $right + $zeroGroups[$zeroGroupIndex[$r] - 1]->length
                );
            }

            $ans[] = $activeSections;
        }

        return $ans;
    }

    /**
     * Returns the zero groups and the index of the zero group that contains the i-th character.
     *
     * @param string $s
     * @return array{0: Group[], 1: int[]}
     */
    private function getZeroGroups(string $s): array {
        $zeroGroups = [];
        $zeroGroupIndex = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '0') {
                if ($i > 0 && $s[$i - 1] == '0') {
                    $zeroGroups[count($zeroGroups) - 1]->length++;
                } else {
                    $zeroGroups[] = new Group($i, 1);
                }
            }
            $zeroGroupIndex[] = count($zeroGroups) - 1;
        }
        return [$zeroGroups, $zeroGroupIndex];
    }

    /**
     * Returns the sums of the lengths of the adjacent groups.
     *
     * @param Group[] $zeroGroups
     * @return int[]
     */
    private function getZeroMergeLengths(array $zeroGroups): array {
        $zeroMergeLengths = [];
        for ($i = 0; $i < count($zeroGroups) - 1; $i++) {
            $zeroMergeLengths[] = $zeroGroups[$i]->length + $zeroGroups[$i + 1]->length;
        }
        return $zeroMergeLengths;
    }

    /**
     * Returns the indices of the adjacent groups that contain l and r completely.
     *
     * @param int $startGroupIndex
     * @param int $endGroupIndex
     * @return int[]
     */
    private function mapToAdjacentGroupIndices(int $startGroupIndex, int $endGroupIndex): array {
        return [$startGroupIndex, $endGroupIndex - 1];
    }
}