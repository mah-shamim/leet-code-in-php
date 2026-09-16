1621\. Number of Sets of K Non-Overlapping Line Segments

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Dynamic Programming`, `Combinatorics`, `Prefix Sum`, `Biweekly Contest 37`

Given `n` points on a 1-D plane, where the `iᵗʰ` point (from `0` to `n-1`) is at `x = i`, find the number of ways we can draw **exactly** `k` **non-overlapping** line segments such that each segment covers two or more points. The endpoints of each segment must have **integral coordinates**. The `k` line segments **do not** have to cover all `n` points, and they are **allowed** to share endpoints.

Return _the number of ways we can draw `k` non-overlapping line segments. Since this number can be huge, return it **modulo** `10⁹ + 7`_.

**Example 1:**

![ex1](https://assets.leetcode.com/uploads/2020/09/07/ex1.png)

- **Input:** n = 4, k = 2
- **Output:** 5
- **Explanation:** 
  - The two line segments are shown in red and blue.
  - The image above shows the 5 different ways {(0,2),(2,3)}, {(0,1),(1,3)}, {(0,1),(2,3)}, {(1,2),(2,3)}, {(0,1),(1,2)}.

**Example 2:**

- **Input:** n = 3, k = 1
- **Output:** 3
- **Explanation:** The 3 ways are {(0,1)}, {(0,2)}, {(1,2)}.

**Example 3:**

- **Input:** n = 30, k = 7
- **Output:** 796297179
- **Explanation:** The total number of possible ways to draw 7 line segments is 3796297200. Taking this number modulo 10⁹ + 7 gives us 796297179.

**Example 4:**

- **Input:** n = 2, k = 1
- **Output:** 1

**Example 5:**

- **Input:** n = 3, k = 2
- **Output:** 1

**Example 6:**

- **Input:** n = 4, k = 1
- **Output:** 6

**Example 7:**

- **Input:** n = 1000, k = 999
- **Output:** 1

**Constraints:**

- `2 <= n <= 1000`
- `1 <= k <= n-1`


**Hint:**
1. Try to use dynamic programming where the current index and remaining number of line segments to form can describe any intermediate state.
2. To make the computation of each state in constant time, we could add another flag to the state that indicates whether or not we are in the middle of placing a line (placed start point but no endpoint).


**Solution:**

We count valid sets of exactly `k` non-overlapping line segments by reducing the problem to a single binomial coefficient:  
`C(n + k - 1, 2k) mod 1_000_000_007`.  
The given PHP solution precomputes factorials and inverse factorials, then evaluates this combination efficiently.

## Approach

- Represent a valid drawing as a sequence of `2k` endpoints:  
  `l1 < r1 <= l2 < r2 <= ... <= lk < rk`.
- Convert the weak inequalities `ri <= li+1` into strict inequalities by shifting alternating endpoints.
- This transforms the problem into choosing `2k` strictly increasing values from `n + k - 1` possible positions.
- Therefore, the answer is `C(n + k - 1, 2k)`.
- Compute the binomial coefficient modulo `10^9 + 7` using factorials and modular inverses.

Let's implement this solution in PHP: **[1621. Number of Sets of K Non-Overlapping Line Segments](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001621-number-of-sets-of-k-non-overlapping-line-segments/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer
 */
function numberOfSets(int $n, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param int $base
 * @param int $exp
 * @param int $mod
 * @return int
 */
function modPow(int $base, int $exp, int $mod): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfSets(4, 2) . "\n";             // Output: 5
echo numberOfSets(3, 1) . "\n";             // Output: 3
echo numberOfSets(30, 7) . "\n";            // Output: 796297179
echo numberOfSets(2, 1) . "\n";             // Output: 1
echo numberOfSets(3, 2) . "\n";             // Output: 1
echo numberOfSets(4, 1) . "\n";             // Output: 6
echo numberOfSets(1000, 999) . "\n";        // Output: 1
?>
```

### Explanation:

- Let `p1, p2, ..., p2k` be the endpoint sequence:
    - `p1 = l1`, `p2 = r1`, `p3 = l2`, `p4 = r2`, etc.
    - The constraints become  
      `p1 < p2 <= p3 < p4 <= ... <= p2k-1 < p2k`.
- Define `qj = pj + floor((j - 1) / 2)`.
    - Then `q1 < q2 < ... < q2k`.
    - The maximum possible value of `q2k` is `n + k - 2`.
- Thus, we need to choose `2k` distinct values from `0` to `n + k - 2`, inclusive.
- Number of choices:  
  `C(n + k - 1, 2k)`.
- The code computes:
    - `N = n + k - 1`
    - `R = 2 * k`
    - If `R > N`, return `0`.
    - Precompute `fact[0..N]`.
    - Compute `invFact[N] = modPow(fact[N], MOD - 2, MOD)`.
    - Fill `invFact` downward.
    - Return `fact[N] * invFact[R] * invFact[N - R] % MOD`.

## Complexity Analysis

- Time Complexity: `O(n + k + log MOD)`, dominated by factorial precomputation.
- Space Complexity: `O(n + k)` for factorial and inverse factorial arrays.
- With `n <= 1000`, this is easily within limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**