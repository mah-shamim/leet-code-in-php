2110\. Number of Smooth Descent Periods of a Stock

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Dynamic Programming`, `Weekly Contest 272`

You are given an integer array `prices` representing the daily price history of a stock, where `prices[i]` is the stock price on the `iᵗʰ` day.

A **smooth descent period** of a stock consists of **one or more contiguous** days such that the price on each day is **lower** than the price on the **preceding day** by **exactly** `1`. The first day of the period is exempted from this rule.

Return _the number of **smooth descent periods**_.

**Example 1:**

- **Input:** prices = [3,2,1,4]
- **Output:** 7
- **Explanation:** There are 7 smooth descent periods:
  [3], [2], [1], [4], [3,2], [2,1], and [3,2,1]
  Note that a period with one day is a smooth descent period by the definition.

**Example 2:**

- **Input:** prices = [8,6,7,7]
- **Output:** 4
- **Explanation:** There are 4 smooth descent periods: [8], [6], [7], and [7]
  Note that [8,6] is not a smooth descent period as 8 - 6 ≠ 1.

**Example 3:**

- **Input:** prices = [1]
- **Output:** 1
- **Explanation:** There is 1 smooth descent period: [1]

**Constraints:**

- `1 <= prices.length <= 10⁵`
- `1 <= prices[i] <= 10⁵`



**Hint:**
1. Any array is a series of adjacent longest possible smooth descent periods. For example, [5,3,2,1,7,6] is [5] + [3,2,1] + [7,6].
2. Think of a 2-pointer approach to traverse the array and find each longest possible period.
3. Suppose you found the longest possible period with a length of k. How many periods are within that period? How can you count them quickly? Think of the formula to calculate the sum of 1, 2, 3, ..., k.




**Similar Questions:**
1. [713. Subarray Product Less Than K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000713-subarray-product-less-than-k)
2. [1063. Number of Valid Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001063-number-of-valid-subarrays)
3. [2348. Number of Zero-Filled Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002348-number-of-zero-filled-subarrays)






**Solution:**

We need to count contiguous subarrays where each element decreases by exactly 1 from the previous element. Let me break down the solution approach.

### Approach:

- Use a dynamic programming approach to track smooth descent periods ending at each index
- For each day i, count the number of valid smooth descent periods that end at that day
- If the price difference from the previous day is exactly -1, extend the periods from the previous day
- Otherwise, start a new period (only the current day)

Let's implement this solution in PHP: **[2110. Number of Smooth Descent Periods of a Stock](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002110-number-of-smooth-descent-periods-of-a-stock/solution.php)**

```php
<?php
/**
 * @param Integer[] $prices
 * @return Integer
 */
function getDescentPeriods($prices) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getDescentPeriods([3, 2, 1, 4]) . "\n";    // Output: 7
echo getDescentPeriods([8, 6, 7, 7]) . "\n";    // Output: 4
echo getDescentPeriods([1]) . "\n";             // Output: 1
?>
```

### Explanation:

- **Initialization**:
   - Create a dp array where `dp[i]` represents the number of smooth descent periods ending at index i
   - Initialize all values to 1 since every individual day forms at least one period
   - Start `total` with 1 for the first day

- **Iteration**:
   - For each day starting from index 1:
      - Check if the current price is exactly 1 less than the previous day's price
      - If yes: `dp[i] = dp[i-1] + 1` (extend all periods from previous day and add current day as new single-day period)
      - If no: `dp[i] = 1` (only the current day itself forms a period)
      - Add `dp[i]` to the running total

- **Why it works**:
   - The recurrence relation counts all valid subarrays ending at each position
   - When we have consecutive decreasing prices (difference of -1), we can extend all periods from the previous day
   - The formula for counting periods within a streak of length k is the triangular number sum: 1 + 2 + ... + k

- **Complexity**:
   - **Time**: O(n) - single pass through the array
   - **Space**: O(n) - dp array (can be optimized to O(1) by using a variable instead of array)

- **Optimization Note**:
   - The solution can be optimized to use O(1) space by tracking just the current streak length instead of the entire dp array
   - For clarity, the current implementation uses the dp array approach

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**