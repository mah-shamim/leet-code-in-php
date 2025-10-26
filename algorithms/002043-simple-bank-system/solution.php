<?php

class Bank {
    private array $accounts;
    private int $totalAccounts;

    /**
     * @param Integer[] $balance
     */
    function __construct($balance) {
        $this->accounts = $balance;
        $this->totalAccounts = count($balance);
    }

    /**
     * @param Integer $account1
     * @param Integer $account2
     * @param Integer $money
     * @return Boolean
     */
    function transfer($account1, $account2, $money) {
        // Check if both accounts are valid
        if (!$this->isValidAccount($account1) || !$this->isValidAccount($account2)) {
            return false;
        }

        // Check if account1 has sufficient balance
        if ($this->accounts[$account1 - 1] < $money) {
            return false;
        }

        // Perform transfer
        $this->accounts[$account1 - 1] -= $money;
        $this->accounts[$account2 - 1] += $money;

        return true;
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function deposit($account, $money) {
        // Check if account is valid
        if (!$this->isValidAccount($account)) {
            return false;
        }

        // Perform deposit
        $this->accounts[$account - 1] += $money;

        return true;
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function withdraw($account, $money) {
        // Check if account is valid
        if (!$this->isValidAccount($account)) {
            return false;
        }

        // Check if account has sufficient balance
        if ($this->accounts[$account - 1] < $money) {
            return false;
        }

        // Perform withdrawal
        $this->accounts[$account - 1] -= $money;

        return true;
    }

    /**
     * Check if account number is valid (between 1 and totalAccounts)
     *
     * @param int $account
     * @return bool
     */
    private function isValidAccount(int $account): bool {
        return $account >= 1 && $account <= $this->totalAccounts;
    }

    /**
     * Debug: Get current balances (for testing/demo purposes).
     *
     * @return array
     */
    public function getBalances(): array {
        return $this->balance;
    }
}

/**
 * Your Bank object will be instantiated and called as such:
 * $obj = Bank($balance);
 * $ret_1 = $obj->transfer($account1, $account2, $money);
 * $ret_2 = $obj->deposit($account, $money);
 * $ret_3 = $obj->withdraw($account, $money);
 */