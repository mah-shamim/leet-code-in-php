474\. Ones and Zeroes

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Dynamic Programming`

You are given an array of binary strings `strs` and two integers `m` and `n`.

Return _the size of the largest subset of `strs` such that there are **at most** `m` `0`'s and n `1`'s in the subset_.

A set `x` is a **subset** of a set `y` if all elements of `x` are also elements of `y`.

**Example 1:**

- **Input:** strs = ["10","0001","111001","1","0"], m = 5, n = 3
- **Output:** 4
- **Explanation:** The largest subset with at most 5 0's and 3 1's is {"10", "0001", "1", "0"}, so the answer is 4.
  Other valid but smaller subsets include {"0001", "1"} and {"10", "1", "0"}.
  {"111001"} is an invalid subset because it contains 4 1's, greater than the maximum of 3.

**Example 2:**

- **Input:** strs = ["10","0","1"], m = 1, n = 1
- **Output:** 2
- **Explanation:** The largest subset is {"0", "1"}, so the answer is 2.

**Constraints:**

- `1 <= strs.length <= 600`
- `1 <= strs[i].length <= 100`
- `strs[i]` consists only of digits `'0'` and `'1'`.
- `1 <= m, n <= 100`



**Similar Questions:**
1. [2031. Count Subarrays With More Ones Than Zeros](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002031-count-subarrays-with-more-ones-than-zeros)
2. [600. Non-negative Integers without Consecutive Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000600-non-negative-integers-without-consecutive-ones)
3. [2155. All Divisions With the Highest Score of a Binary Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002155-all-divisions-with-the-highest-score-of-a-binary-array)






**Solution:**

We need to find the largest subset of binary strings where the total count of 0's is ≤ m and total count of 1's is ≤ n.

This is essentially a **2D knapsack problem** where each string has a "weight" in terms of zeros and ones, and I need to maximize the number of items (strings) I can select without exceeding capacity m for zeros and n for ones.

## Approach

I'll use **dynamic programming** with a 2D DP array:
- `dp[i][j]` = maximum number of strings that can be selected with at most i zeros and j ones
- For each string, I'll count its zeros and ones, then update the DP table

Let's implement this solution in PHP: **[474. Ones and Zeroes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000474-ones-and-zeroes/solution.php)**

```php
<?php
/**
 * @param String[] $strs
 * @param Integer $m
 * @param Integer $n
 * @return Integer
 */
function findMaxForm($strs, $m, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// ---------- Example 1 ----------
$strs = ["10","0001","111001","1","0"];
$m = 5;
$n = 3;
echo findMaxForm($strs, $m, $n); // Output: 4

// ---------- Example 2 ----------
$strs = ["10","0","1"];
$m = 1;
$n = 1;
echo "\n" . findMaxForm($strs, $m, $n); // Output: 2
?>
```

### Explanation:

1. **DP Table Initialization**: Create a 2D array `dp` where `dp[i][j]` stores the maximum strings that can be selected with i zeros and j ones.

2. **String Processing**: For each binary string:
   - Count zeros using `substr_count($str, '0')`
   - Calculate ones as `string_length - zeros`

3. **DP Update**: Update the table from bottom-right to top-left to ensure we don't reuse the same string multiple times. For each cell `(i, j)`, we consider whether including the current string gives a better result.

4. **State Transition**:
   - If we don't take the string: `dp[i][j]` remains the same
   - If we take the string: `dp[i - zeros][j - ones] + 1` (use remaining capacity + 1 string)

## Complexity Analysis
- **Time Complexity**: O(L × m × n) where L is the number of strings
- **Space Complexity**: O(m × n) for the DP table

## Example Walkthrough

For `strs = ["10","0001","111001","1","0"]`, `m = 5`, `n = 3`:

- "10": zeros=1, ones=1
- "0001": zeros=3, ones=1
- "111001": zeros=2, ones=4 (exceeds n=3, so won't be selected)
- "1": zeros=0, ones=1
- "0": zeros=1, ones=0

The optimal subset is {"10", "0001", "1", "0"} with total zeros=5 and ones=3, giving answer 4.

The DP approach efficiently explores all combinations while respecting both capacity constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**