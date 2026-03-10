3130\. Find All Possible Stable Binary Arrays II

**Difficulty:** Hard

**Topics:** `Principal`, `Dynamic Programming`, `Prefix Sum`, `Biweekly Contest 129`

You are given 3 positive integers `zero`, `one`, and `limit`.

A binary array[^1] `arr` is called **stable** if:
- The number of occurrences of 0 in `arr` is **exactly** `zero`.
- The number of occurrences of 1 in `arr` is **exactly** `one`.
- Each subarray[^2] of `arr` with a size greater than `limit` must contain **both** 0 and 1.

Return _the total number of **stable** binary arrays_.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

[^1]: **Binary Array:** A binary array is an array which contains only 0 and 1.
[^2]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** zero = 1, one = 1, limit = 2
- **Output:** 2
- **Explanation:** The two possible stable binary arrays are `[1,0]` and `[0,1]`, as both arrays have a single 0 and a single 1, and no subarray has a length greater than 2.

**Example 2:**

- **Input:** zero = 1, one = 2, limit = 1
- **Output:** 1
- **Explanation:**
   - The only possible stable binary array is `[1,0,1]`.
   - Note that the binary arrays `[1,1,0]` and `[0,1,1]` have subarrays of length 2 with identical elements, hence, they are not stable.

**Example 3:**

- **Input:** zero = 3, one = 3, limit = 2
- **Output:** 14
- **Explanation:** All the possible stable binary arrays are `[0,0,1,0,1,1]`, `[0,0,1,1,0,1]`, `[0,1,0,0,1,1]`, `[0,1,0,1,0,1]`, `[0,1,0,1,1,0]`, `[0,1,1,0,0,1]`, `[0,1,1,0,1,0]`, `[1,0,0,1,0,1]`, `[1,0,0,1,1,0]`, `[1,0,1,0,0,1]`, `[1,0,1,0,1,0]`, `[1,0,1,1,0,0]`, `[1,1,0,0,1,0]`, and `[1,1,0,1,0,0]`.

**Constraints:**

- `1 <= zero, one, limit <= 1000`


**Hint:**
1. Let `dp[x][y][z = 0/1]` be the number of stable arrays with exactly `x` zeros, `y` ones, and the last element is `z`. (0 or 1). `dp[x][y][0] + dp[x][y][1]` is the answer for given `(x, y)`.
2. If we have already placed `x` 1 and `y` 0, if we place a group of `k` 0, the number of ways is `dp[x-k][y][1]`. We can place a group with size `i`, where `i` varies from 1 to `min(limit, zero - x)`. Similarly, we can solve by placing a group of ones.
3. Speed up the calculation using prefix arrays to store the sum of `dp` states.


**Similar Questions:**
1. [525. Contiguous Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000525-contiguous-array)
2. [930. Binary Subarrays With Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000930-binary-subarrays-with-sum)






**Solution:**

We need to find the number of binary arrays of length `zero+one`, with exactly `zero` `zeros` and one `ones`, such that every **subarray** of `length > limit` contains both `0` and `1`. This condition means that there is no **subarray** of length `limit+1` or longer that is all `zeros` or all `ones`. In other words, the maximum consecutive run of `zeros` cannot exceed limit, and similarly for `ones`. Because if there were a run of `zeros` of length `L > limit`, then that **subarray** (the run itself) of length `L > limit` contains only zeros, violating condition. Conversely, if there is no run longer than limit, then any **subarray** longer than limit must contain both? Wait careful: The condition says: each **subarray** with size greater than limit must contain both `0` and `1`. If the longest run of `zeros` is `≤ limit`, could there be a **subarray** longer than limit that is all `zeros`? Not if the `zeros` are separated. But could there be a **subarray** longer than limit that consists of a mix of `zeros` and `ones` but still only `zeros`? No, it would have to be contiguous. So the condition is exactly that there is no contiguous block of identical bits of length > limit. That is necessary and sufficient? Let's think: Suppose there is a **subarray** of length > limit that contains both 0 and 1. That's fine. The only way a **subarray** of length > limit could violate is if it consists entirely of `zeros` or entirely of `ones`. So condition is equivalent to: no contiguous run of `zeros` longer than limit, and no contiguous run of `ones` longer than limit. Because any **subarray** that is all `zeros` must be contained within a maximal run of `zeros`. So if all runs are ≤ limit, then no **subarray** longer than limit can be all `zeros` or all `ones`. So yes, condition reduces to: maximum consecutive `zeros ≤ limit` and maximum consecutive `ones ≤ limit`. However, careful: Consider a **subarray** that starts and ends within a run but is longer than limit? That would require the run to be longer than limit. So condition is exactly that runs of `zeros` and `ones` are at most limit.

### Approach:

- **State definition**
   - `dp0[i][j]` – number of stable arrays with `i` zeros, `j` ones ending with `0`
   - `dp1[i][j]` – number with `i` zeros, `j` ones ending with `1`
- **Base cases**
   - A single run of zeros: `dp0[i][0] = 1` if `1 ≤ i ≤ limit` (array consists only of zeros, but with at most `limit` consecutive zeros)
   - A single run of ones: `dp1[0][j] = 1` if `1 ≤ j ≤ limit`
- **Recurrence (naïve)**
   - To form `dp0[i][j]`, we take a sequence ending with `1` (having `i-k` zeros, `j` ones) and append a block of `k` zeros (1 ≤ k ≤ min(limit, i)).  
     `dp0[i][j] = Σ_{k=1..min(limit,i)} dp1[i-k][j]`
   - Similarly, `dp1[i][j] = Σ_{k=1..min(limit,j)} dp0[i][j-k]`
- **Optimisation**
   - For `dp0`, keep for each `j` a running sum `sum1[j]` of `dp1[i'][j]` over the last `limit` values of `i'`. Then `dp0[i][j] = sum1[j] + base0` (where `base0` handles the pure‑zero array case).
   - For `dp1`, compute prefix sums `pref0` over `dp0[i][*]` (for the current `i`). Then  
     `dp1[i][j] = pref0[j-1] - pref0[max(0, j-limit)-1] + base1` (using modular arithmetic).
   - Update the sliding window `sum1` after computing `dp1[i][*]` by adding the new row and removing the row that falls out of the window.
- **Answer**  
  - `(dp0[zero][one] + dp1[zero][one]) mod 10⁹+7`

Let's implement this solution in PHP: **[3130. Find All Possible Stable Binary Arrays II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003130-find-all-possible-stable-binary-arrays-ii/solution.php)**

```php
<?php
/**
 * @param Integer $zero
 * @param Integer $one
 * @param Integer $limit
 * @return Integer
 */
function numberOfStableArrays(int $zero, int $one, int $limit): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfStableArrays(1, 1, 2) . "\n";          // Output: 2
echo numberOfStableArrays(1, 2, 1) . "\n";          // Output: 1
echo numberOfStableArrays(3, 3, 2) . "\n";          // Output: 14
?>
```

### Explanation:

1. **Why two DP tables?**  
   The last digit matters because the forbidden pattern (more than `limit` identical digits) is checked per run. By knowing the last digit we ensure we never exceed the allowed run length.
2. **Transitions via runs**
   - If the array ends with `0`, the last run consists of consecutive zeros. The run length can be any `k` from 1 up to `limit`. Before this run the array ended with `1` (or it is the very first run). Hence we sum over all possible previous counts of zeros (`i-k`) with the same number of ones (`j`) and last digit `1`.
   - Symmetrically for ending with `1`.
3. **Sliding‑window sum for `dp0`**
   - For a fixed `j`, `dp0[i][j]` needs the sum of `dp1[i-k][j]` for `k=1..limit`. This is exactly the sum of the last `limit` rows of `dp1` (in the `i` dimension) for that `j`.
   - `sum1[j]` is maintained as a sliding window: when we move from `i-1` to `i`, we add `dp1[i-1][j]` and, if `i-1 ≥ limit`, we subtract `dp1[i-1-limit][j]`. At the start of iteration `i`, `sum1[j]` already holds the required sum.
4. **Prefix sum for `dp1`**
   - For `dp1[i][j]` we need the sum of `dp0[i][j-k]` for `k=1..limit`. This is a range sum in the `j` dimension for the current `i`. Precomputing prefix sums `pref0` for row `i` allows O(1) range queries.
5. **Base cases**
   - `dp0[i][0]` for `i ≤ limit` is 1 because the whole array is zeros and that run length is allowed. Similarly `dp1[0][j]` for `j ≤ limit`. These are incorporated as `base0` and `base1` to avoid double counting when the sliding‑window sum might be empty (e.g., `j=0` for `dp0`).
6. **Modulo handling**  
   All additions and subtractions are taken modulo `10⁹+7` to keep numbers within bounds.

### Complexity
- **Time Complexity**: _**O(zero · one)**_ – two nested loops over `i` and `j`, with constant‑time operations per state (sliding‑window updates and prefix‑sum lookups).
- **Space Complexity**: _**O(zero · one)**_ – two DP tables of size `(zero+1) × (one+1)`. The sliding window `sum1` and prefix array `pref0` each use O(one) space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**