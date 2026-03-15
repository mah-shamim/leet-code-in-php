<?php

class Fancy {
    private const MOD = 1000000007;
    private int $mul = 1;
    private int $add = 0;
    private array $values = [];

    /**
     */
    function __construct() {

    }

    /**
     * Modular exponentiation (fast power)
     *
     * @param int $base
     * @param int $exp
     * @param int $mod
     * @return int
     */
    private function modPow(int $base, int $exp, int $mod): int {
        $result = 1;
        $base %= $mod;
        while ($exp > 0) {
            if ($exp & 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exp >>= 1;
        }
        return $result;
    }

    /**
     * Modular inverse using Fermat's little theorem (mod is prime)
     *
     * @param int $x
     * @return int
     */
    private function modInv(int $x): int {
        return $this->modPow($x, self::MOD - 2, self::MOD);
    }

    /**
     * Appends a new value to the sequence
     *
     * @param Integer $val
     * @return void
     */
    public function append(int $val): void {
        // base = (val - add) * inv(mul)  (mod MOD)
        $num = ($val - $this->add) % self::MOD;
        if ($num < 0) {
            $num += self::MOD;
        }
        $inv = $this->modInv($this->mul);
        $base = ($num * $inv) % self::MOD;
        $this->values[] = $base;
    }

    /**
     * Increments all existing values by inc
     *
     * @param Integer $inc
     * @return void
     */
    public function addAll(int $inc): void {
        $this->add = ($this->add + $inc) % self::MOD;
    }

    /**
     * Multiplies all existing values by m
     *
     * @param Integer $m
     * @return void
     */
    public function multAll(int $m): void {
        $this->mul = ($this->mul * $m) % self::MOD;
        $this->add = ($this->add * $m) % self::MOD;
    }

    /**
     * Returns the current value at index idx modulo MOD, or -1 if out of bounds
     *
     * @param Integer $idx
     * @return Integer
     */
    public function getIndex(int $idx): int {
        if ($idx >= count($this->values)) {
            return -1;
        }
        $base = $this->values[$idx];
        return ($base * $this->mul + $this->add) % self::MOD;
    }
}

/**
 * Your Fancy object will be instantiated and called as such:
 * $obj = Fancy();
 * $obj->append($val);
 * $obj->addAll($inc);
 * $obj->multAll($m);
 * $ret_4 = $obj->getIndex($idx);
 */