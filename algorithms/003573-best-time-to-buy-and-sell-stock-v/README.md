3573\. Best Time to Buy and Sell Stock V

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Biweekly Contest 158`

You are given an integer array `prices` where `prices[i]` is the price of a stock in dollars on the `iᵗʰ` day, and an integer `k`.

You are allowed to make at most `k` transactions, where each transaction can be either of the following:

- **Normal transaction**: Buy on day `i`, then sell on a later day `j` where `i < j`. You profit `prices[j] - prices[i]`.
- **Short selling transaction**: Sell on day `i`, then buy back on a later day `j` where `i < j`. You profit `prices[i] - prices[j]`.

**Note** that you must complete each transaction before starting another. Additionally, you can't buy or sell on the same day you are selling or buying back as part of a previous transaction.

Return the **maximum** total profit you can earn by making **at most** `k` transactions.

**Example 1:**

- **Input:** prices = [1,7,9,8,2], k = 2
- **Output:** 14
- **Explanation:** We can make $14 of profit through 2 transactions:
  - A normal transaction: buy the stock on day 0 for $1 then sell it on day 2 for $9.
  - A short selling transaction: sell the stock on day 3 for $8 then buy back on day 4 for $2.


**Example 2:**

- **Input:** prices = [12,16,19,19,8,1,19,13,9], k = 3
- **Output:** 36
- **Explanation:** We can make $36 of profit through 3 transactions:
  - A normal transaction: buy the stock on day 0 for $12 then sell it on day 2 for $19.
  - A short selling transaction: sell the stock on day 3 for $19 then buy back on day 4 for $8.
  - A normal transaction: buy the stock on day 5 for $1 then sell it on day 6 for $19.


**Constraints:**

- `2 <= prices.length <= 10³`
- `1 <= prices[i] <= 10⁹`
- `1 <= k <= prices.length / 2`



**Hint:**
1. Use dynamic programming.
2. Keep the following states: `idx`, `transactionsDone`, `transactionType`, `isTransactionRunning`.
3. Transactions transition from `completed -> running` and from `running -> completed`.



**Similar Questions:**
1. [121. Best Time to Buy and Sell Stock](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000121-best-time-to-buy-and-sell-stock)






**Solution:**

We need to maximize profit with at most `k` transactions, where each transaction can be either:
- **Normal**: Buy then sell (profit = prices[j] - prices[i])
- **Short**: Sell then buy (profit = prices[i] - prices[j])

### **Key constraints:**
- No overlapping transactions
- Must complete one transaction before starting another
- Can't perform another trade on the same day as a previous transaction's completion
- `k ≤ prices.length / 2`

## Dynamic Programming Approach

We can use DP with state variables:
- `i`: current day index
- `t`: number of transactions completed
- `state`: 0 (not holding any position), 1 (holding a long position after buy), 2 (holding a short position after sell)

### State Transitions

1. **State 0 (no position)**:
   - Do nothing: `dp[i][t][0] → dp[i+1][t][0]`
   - Start long (buy): `dp[i][t][0] - prices[i] → dp[i+1][t][1]`
   - Start short (sell): `dp[i][t][0] + prices[i] → dp[i+1][t][2]`

2. **State 1 (holding long)**:
   - Do nothing: `dp[i][t][1] → dp[i+1][t][1]`
   - Sell (complete normal transaction): `dp[i][t][1] + prices[i] → dp[i+1][t+1][0]`

3. **State 2 (holding short)**:
   - Do nothing: `dp[i][t][2] → dp[i+1][t][2]`
   - Buy back (complete short transaction): `dp[i][t][2] - prices[i] → dp[i+1][t+1][0]`

Let's implement this solution in PHP: **[3573. Best Time to Buy and Sell Stock V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003573-best-time-to-buy-and-sell-stock-v/solution.php)**

```php
<?php
/**
 * @param Integer[] $prices
 * @param Integer $k
 * @return Integer
 */
function maximumProfit($prices, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumProfit([[1,7,9,8,2], 2) . "\n";                 // Output: 14
echo maximumProfit([12,16,19,19,8,1,19,13,9], 3) . "\n";    // Output: 36
?>
```

### Explanation:

1. **Initialization**: We start with 0 profit, 0 transactions, and no position.
2. **State Transitions**: At each day, we consider all possible actions from each state.
3. **State 0 (no position)**: We can start a new transaction (long or short) or do nothing.
4. **State 1 (holding long)**: We can either continue holding or sell to complete the transaction.
5. **State 2 (holding short)**: We can either continue holding or buy back to complete the transaction.
6. **Transaction Limit**: We only increment the transaction count when completing a transaction, and we can't exceed `k`.
7. **Final Answer**: The maximum profit after `n` days with any number of transactions ≤ `k` and no open positions.

### Complexity
- Time: O(n × k)
- Space: O(n × k) or optimized to O(k)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**