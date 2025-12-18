3652\. Best Time to Buy and Sell Stock using Strategy

**Difficulty:** Medium

**Topics:** `Array`, `Sliding Window`, `Prefix Sum`, `Weekly Contest 463`

You are given two integer arrays prices and strategy, where:

- `prices[i]` is the price of a given stock on the `iᵗʰ` day.
- `strategy[i]` represents a trading action on the `iᵗʰ` day, where:
  - `-1` indicates buying one unit of the stock.
  - `0` indicates holding the stock.
  - `1` indicates selling one unit of the stock.

You are also given an **even** integer `k`, and may perform **at most one** modification to `strategy`. A modification consists of:

- Selecting exactly `k` **consecutive** elements in `strategy`.
- Set the **first** `k / 2` elements to `0` (hold).
- Set the **last** `k / 2` elements to `1` (sell).

The **profit** is defined as the **sum** of `strategy[i] * prices[i]` across all days.

Return the **maximum** possible profit you can achieve.

**Note:** There are no constraints on budget or stock ownership, so all buy and sell operations are feasible regardless of past actions.

**Example 1:**

- **Input:** prices = [4,2,8], strategy = [-1,0,1], k = 2
- **Output:** 10
- **Explanation:**

  | Modification	   | Strategy	   | Profit Calculation	                        | Profit |
  |-----------------|-------------|--------------------------------------------|--------|
  | Original	       | [-1, 0, 1]	 | (-1 × 4) + (0 × 2) + (1 × 8) = -4 + 0 + 8	 | 4      |
  | Modify  [0, 1]	 | [0, 1, 1]	  | (0 × 4) + (1 × 2) + (1 × 8) = 0 + 2 + 8	   | 10     |
  | Modify [1, 2]	  | [-1, 0, 1]	 | (-1 × 4) + (0 × 2) + (1 × 8) = -4 + 0 + 8	 | 4      |

Thus, the maximum possible profit is 10, which is achieved by modifying the subarray `[0, 1]`.

**Example 2:**

- **Input:** prices = [5,4,3], strategy = [1,1,0], k = 2
- **Output:** 9
- **Explanation:**

  | Modification	  | Strategy	  | Profit Calculation	                      | Profit |
  |----------------|------------|------------------------------------------|--------|
  | Original	      | [1, 1, 0]	 | (1 × 5) + (1 × 4) + (0 × 3) = 5 + 4 + 0	 | 9      |
  | Modify [0, 1]	 | [0, 1, 0]	 | (0 × 5) + (1 × 4) + (0 × 3) = 0 + 4 + 0	 | 4      |
  | Modify [1, 2]	 | [1, 0, 1]	 | (1 × 5) + (0 × 4) + (1 × 3) = 5 + 0 + 3	 | 8      |

Thus, the maximum possible profit is 9, which is achieved without any modification.

**Constraints:**

- `2 <= prices.length == strategy.length <= 10⁵`
- `1 <= prices[i] <= 10⁵`
- `-1 <= strategy[i] <= 1`
- `2 <= k <= prices.length`
- `k` is even



**Hint:**
1. Use prefix sums to precompute the base profit and to get fast range queries (sums of `prices` and counts of each `strategy` value over any interval).
2. Try every segment of length `k`: compute the profit delta caused by replacing that segment (using the prefix queries) and take the maximum of `base + delta`.






**Solution:**

We can solve this problem efficiently using prefix sums to compute the profit change for any modification in O(1) time, after O(n) preprocessing.

### Approach:

- **Compute Base Profit**: Start by calculating the original profit without any modifications.
- **Prefix Sums for Efficiency**: Precompute prefix sums to quickly calculate sums over any subarray in O(1) time.
- **Analyze Modification Impact**: For each possible modification window, compute the profit change compared to the original.
- **Optimize with Sliding Window**: Consider all possible windows of length k and track the maximum improvement.
- **Combine Results**: Add the maximum possible improvement to the base profit.

Let's implement this solution in PHP: **[3652. Best Time to Buy and Sell Stock using Strategy](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003652-best-time-to-buy-and-sell-stock-using-strategy/solution.php)**

```php
<?php
/**
 * @param Integer[] $prices
 * @param Integer[] $strategy
 * @param Integer $k
 * @return Integer
 */
function maxProfit($prices, $strategy, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxProfit([4,2,8], [-1,0,1], 2) . "\n";    // Output: 10
echo maxProfit([5,4,3], [1,1,0], 2) . "\n";     // Output: 9
?>
```

### Explanation:

1. **Base Profit Calculation**:
   - Calculate the initial profit as `sum(strategy[i] * prices[i])` for all days.
   - This represents the profit without any modifications.

2. **Prefix Sum Arrays**:
   - Create `prefixPrices`: cumulative sum of `prices`, allows O(1) range sum queries.
   - Create `prefixSp`: cumulative sum of `strategy[i] * prices[i]`, allows O(1) queries for original profit in any window.

3. **Understanding the Modification**:
   - When modifying a window of length k:
      - First k/2 elements become 0 (hold) → their contribution becomes 0.
      - Last k/2 elements become 1 (sell) → their contribution becomes `prices[i]`.
   - Original profit in window: `sum(strategy[i] * prices[i])` for i in window.
   - New profit in window: `sum(prices[i])` for i in second half of window.
   - Change in profit (delta) = `new_profit - old_profit`.

4. **Efficient Delta Calculation**:
   - For window [l, l+k-1]:
      - `sumPricesSecondHalf` = sum of prices from l+half to l+k-1.
      - `sumOldSegment` = original profit contribution from entire window.
      - `delta = sumPricesSecondHalf - sumOldSegment`.

5. **Iterate Through All Windows**:
   - Try every possible starting position l where window fits (0 ≤ l ≤ n-k).
   - Track maximum delta found.
   - If no positive delta exists, no modification is beneficial.

6. **Final Result**:
   - Maximum profit = baseProfit + max(0, maxDelta).

### Complexity Analysis
- **Time Complexity**: O(n) - Single pass to build prefix arrays, then O(n) to check all windows.
- **Space Complexity**: O(n) - For storing prefix sums.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**