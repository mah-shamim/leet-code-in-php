3129\. Find All Possible Stable Binary Arrays I

**Difficulty:** Medium

**Topics:** `Staff`, `Dynamic Programming`, `Prefix Sum`, `Biweekly Contest 129`

You are given 3 positive integers `zero`, `one`, and `limit`.

A binary array[^1] `arr` is called **stable** if:
- The number of occurrences of 0 in `arr` is **exactly** `zero`.
- The number of occurrences of 1 in `arr` is **exactly** `one`.
- Each subarray[^2] of `arr` with a size greater than `limit` must contain **both** 0 and 1.

Return _the total number of **stable** binary arrays_.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

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

- `1 <= zero, one, limit <= 200`


**Hint:**
1. Let `dp[a][b][c = 0/1][d]` be the number of stable arrays with exactly `a` 0s, `b` 1s and consecutive `d` value of `c`’s at the end.
2. Try each case by appending a 0/1 at last to get the inductions.


**Similar Questions:**
1. [525. Contiguous Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000525-contiguous-array)
2. [930. Binary Subarrays With Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000930-binary-subarrays-with-sum)

[^1]: **Binary Array:** A binary array is an array which contains only 0 and 1.
[^2]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.




**Solution:**

The problem asks for the number of binary arrays containing exactly `zero` zeros and `one` ones such that any contiguous subarray longer than `limit` contains both 0 and 1. This condition is equivalent to prohibiting any run of consecutive identical bits longer than `limit`. The solution uses a combinatorial run‑based approach: count the ways to split the zeros into a certain number of runs (each of length between 1 and `limit`) and similarly for the ones, then multiply the possibilities for runs that can interlace correctly.

### Approach:

- Reduce the problem to counting sequences where no run (block of equal bits) exceeds `limit`.
- Let `r0` be the number of runs of zeros and `r1` the number of runs of ones. Because runs alternate, `|r0 – r1| ≤ 1`.
- For a given number of runs `k`, compute `f0[k]` = number of ways to partition `zero` zeros into `k` runs, each run length in `[1, limit]`. Similarly `f1[l]` for `one` ones.
   - Use inclusion‑exclusion on the classic stars‑and‑bars formula:  
     `f[k] = Σ_{j=0}^{⌊(n−k)/limit⌋} (−1)^j * C(k, j) * C(n − j·limit − 1, k − 1)`.
- Sum over all valid `(r0, r1)` pairs, distinguishing arrays that start with 0 or with 1:
   - Starting with 0: either `r0 = r1` (ends with 1) or `r0 = r1 + 1` (ends with 0).
   - Starting with 1: either `r1 = r0` (ends with 0) or `r1 = r0 + 1` (ends with 1).
- All computations are performed modulo `10⁹ + 7`.

Let's implement this solution in PHP: **[3129. Find All Possible Stable Binary Arrays I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003129-find-all-possible-stable-binary-arrays-i/solution.php)**

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

/**
 * Fast modular exponentiation
 *
 * @param $a
 * @param $b
 * @param $mod
 * @return int
 */
function powmod($a, $b, $mod): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfStableArrays(1, 1, 2) . "\n";              // Output: 2
echo numberOfStableArrays(1, 2, 1) . "\n";              // Output: 1
echo numberOfStableArrays(3, 3, 2) . "\n";              // Output: 14
?>
```

### Explanation:

1. **Condition reinterpretation** – A subarray longer than `limit` containing only zeros or only ones would violate the rule; hence every run of zeros or ones can be at most `limit` long. Conversely, if all runs are ≤ `limit`, any subarray longer than `limit` must cross a run boundary and therefore contain both bits.
2. **Run decomposition** – Any binary array is uniquely described by its sequence of runs. For a fixed starting bit, the numbers of runs `r0` and `r1` determine the pattern.
3. **Counting runs of a given length** – Distributing `n` identical items into `k` non‑empty blocks with an upper bound `L` on each block is a constrained composition problem. The inclusion‑exclusion formula given above counts exactly those compositions.
4. **Combining runs** – Once `r0` and `r1` are fixed, the zeros runs and ones runs can be interleaved in exactly one way (the pattern is forced by the starting bit). Therefore the total number of arrays for that pair is `f0[r0] * f1[r1]`.
5. **Summation** – The loops iterate over all feasible `r0, r1` (from 1 up to the available counts) and add the products for both possible starting bits, avoiding double counting because arrays with a given starting bit are disjoint from those with the opposite starting bit.

### Complexity
- **Time Complexity**: Precomputing factorials and inverse factorials up to `maxN = 400` costs `O(maxN)`. Computing each `f0[k]` and `f1[l]` runs a loop over `j` up to roughly `n/L`, so total work is `O(zero·(zero/limit) + one·(one/limit))`. With `zero, one ≤ 200`, this is easily within limits.
- **Space Complexity**: `O(zero + one + maxN)` for the factorial arrays and the `f0, f1` tables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**