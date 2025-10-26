2043\. Simple Bank System

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Design`, `Simulation`, `Weekly Contest 263`

You have been tasked with writing a program for a popular bank that will automate all its incoming transactions (transfer, deposit, and withdraw). The bank has `n` accounts numbered from `1` to `n`. The initial balance of each account is stored in a **0-indexed** integer array `balance`, with the `(i + 1)ᵗʰ` account having an initial balance of `balance[i]`.

Execute all the **valid** transactions. A transaction is **valid** if:

- The given account number(s) are between `1` and `n`, and
- The amount of money withdrawn or transferred from is **less than or equal** to the balance of the account.

Implement the `Bank` class:

- `Bank(long[] balance)` Initializes the object with the **0-indexed** integer array `balance`.
- `boolean transfer(int account1, int account2, long money)` Transfers `money` dollars from the account numbered `account1` to the account numbered `account2`. Return `true` if the transaction was successful, `false` otherwise.
- `boolean deposit(int account, long money)` Deposit `money` dollars into the account numbered `account`. Return `true` if the transaction was successful, `false` otherwise.
- `boolean withdraw(int account, long money)` Withdraw `money` dollars from the account numbered `account`. Return `true` if the transaction was successful, `false` otherwise.


**Example 1:**

- **Input:**
  ["Bank", "withdraw", "transfer", "deposit", "transfer", "withdraw"]
  [[[10, 100, 20, 50, 30]], [3, 10], [5, 1, 20], [5, 20], [3, 4, 15], [10, 50]]
- **Output:** [null, true, true, true, false, false]
- **Explanation:**
  Bank bank = new Bank([10, 100, 20, 50, 30]);
  bank.withdraw(3, 10);    // return true, account 3 has a balance of $20, so it is valid to withdraw $10.
  // Account 3 has $20 - $10 = $10.
  bank.transfer(5, 1, 20); // return true, account 5 has a balance of $30, so it is valid to transfer $20.
  // Account 5 has $30 - $20 = $10, and account 1 has $10 + $20 = $30.
  bank.deposit(5, 20);     // return true, it is valid to deposit $20 to account 5.
  // Account 5 has $10 + $20 = $30.
  bank.transfer(3, 4, 15); // return false, the current balance of account 3 is $10,
  // so it is invalid to transfer $15 from it.
  bank.withdraw(10, 50);   // return false, it is invalid because account 10 does not exist.

**Constraints:**

- `n == balance.length`
- `1 <= n, account, account1, account2 <= 10⁵`
- `0 <= balance[i], money <= 10¹²`
- At most `10⁴` calls will be made to **each** function `transfer`, `deposit`, `withdraw`.



**Hint:**
1. How do you determine if a transaction will fail?
2. Simply apply the operations if the transaction is valid.



**Similar Questions:**
1. [2241. Design an ATM Machine](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002241-design-an-atm-machine)






**Solution:**

We need to design a banking system that handles three operations: transfer, deposit, and withdraw, with proper validation.

### Approach:

- Store account balances in an array with 1-based indexing (account 1 is at index 0)
- For each operation, validate account numbers and sufficient funds
- Use basic arithmetic operations to update balances

Let's implement this solution in PHP: **[2043. Simple Bank System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002043-simple-bank-system/solution.php)**

```php
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
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function deposit($account, $money) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $account
     * @param Integer $money
     * @return Boolean
     */
    function withdraw($account, $money) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Check if account number is valid (between 1 and totalAccounts)
     *
     * @param int $account
     * @return bool
     */
    private function isValidAccount(int $account): bool {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Debug: Get current balances (for testing/demo purposes).
     *
     * @return array
     */
    public function getBalances(): array {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases
$bank = new Bank([10, 100, 20, 50, 30]);

echo json_encode([
    $bank->withdraw(3, 10),    // true
    $bank->transfer(5, 1, 20), // true
    $bank->deposit(5, 20),     // true
    $bank->transfer(3, 4, 15), // false
    $bank->withdraw(10, 50)    // false
]) . PHP_EOL;

// Optional: show final balances
print_r($bank->getBalances());
?>
```

### Explanation:


1. **Constructor**: Initializes the bank with account balances and stores the total number of accounts.

2. **Transfer**:
   - Validates both source and destination accounts exist
   - Checks if source account has sufficient funds
   - Transfers money by subtracting from source and adding to destination

3. **Deposit**:
   - Validates the account exists
   - Adds money to the specified account

4. **Withdraw**:
   - Validates the account exists
   - Checks if account has sufficient funds
   - Subtracts money from the account

5. **Helper method**: `isValidAccount()` checks if an account number is within the valid range (1 to n).

**Key Points:**
- Uses 1-based indexing for accounts (account 1 is at index 0)
- All operations return boolean indicating success/failure
- Proper validation prevents invalid transactions
- Time complexity: O(1) for all operations
- Space complexity: O(n) where n is the number of accounts

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**