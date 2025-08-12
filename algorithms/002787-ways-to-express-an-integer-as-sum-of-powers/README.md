2787\. Ways to Express an Integer as Sum of Powers

**Difficulty:** Medium

**Topics:** `Dynamic Programming`, `Biweekly Contest 109`

Given two **positive** integers `n` and `x`.

Return _the number of ways_ `n` _can be expressed as the sum of the_ <code>x<sup>th</sup></code> _power of **unique** positive integers, in other words, the number of sets of unique integers_ <code>[n<sub>1</sub>, n<sub>2</sub>, ..., n<sub>k</sub>]</code> _where_ <code>n = n<sub>1</sub><sup>x</sup> + n<sub>2</sub><sup>x</sup> + ... + n<sub>k</sub><sup>x</sup></code>.

Since the result can be very large, return it modulo <code>10<sup>9</sup> + 7</code>.

For example, if <code>n = 160</code> and <code>x = 3</code>, one way to express `n` is <code>n = 2<sup>3</sup> + 3<sup>3</sup> + 5<sup>3</sup></code>.

**Example 1:**

- **Input:** n = 10, x = 2
- **Output:** 1
- **Explanation:** We can express n as the following: n = 3<sup>2</sup> + 1<sup>2</sup> = 10.
  It can be shown that it is the only way to express 10 as the sum of the 2<sup>nd</sup> power of unique integers.

**Example 2:**

- **Input:** n = 4, x = 1
- **Output:** 2
- **Explanation:** We can express n in the following ways:
  - n = 4<sup>1</sup> = 4.
  - n = 3<sup>1</sup> + 1<sup>1</sup> = 4.

**Constraints:**

- `1 <= n <= 300`
- `1 <= x <= 5`



**Hint:**
1. You can use dynamic programming, where `dp[k][j]` represents the number of ways to express k as the sum of the x<sup>th</sup> power of unique positive integers such that the biggest possible number we use is `j`.
2. To calculate `dp[k][j]`, you can iterate over the numbers smaller than `j` and try to use each one as a power of `x` to make our sum `k`.


**Similar Questions:**
1. [279. Perfect Squares](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000279-perfect-squares)
2. [377. Combination Sum IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000377-combination-sum-iv)
3. [494. Target Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000494-target-sum)






**Solution:**

We need to count the number of ways a given positive integer `n` can be expressed as the sum of unique positive integers each raised to the `x`-th power. The solution involves dynamic programming to efficiently compute the number of valid combinations without repetition.

### Approach
1. **Problem Analysis**: The problem requires finding all sets of unique positive integers such that the sum of each integer raised to the `x`-th power equals `n`. The solution must avoid duplicate sets (e.g., `{1, 2}` and `{2, 1}` are considered the same set) and each integer can be used at most once.
2. **Dynamic Programming Setup**: We use a dynamic programming array `dp` where `dp[j]` represents the number of ways to achieve the sum `j` using the integers processed so far. Initialize `dp[0]` to 1 (the base case representing the empty set).
3. **Determine Maximum Integer**: Calculate the largest integer <code>max<sub>i</sub></code> such that <code>max<sub>i</sub><sup>x</sup></code> is less than or equal to `n`. This bounds the integers we need to consider.
4. **DP Array Update**: For each integer `i` from 1 to <code>max<sub>i</sub></code>, compute <code>v = i<sup>x</sup></code>. Update the `dp` array in reverse order (from `n` down to `v`) to ensure each integer is used only once in each combination. For each `j`, update `dp[j]` by adding `dp[j - v]`, which represents the number of ways to form `j` by including `i`.
5. **Modulo Operation**: Since the result can be large, all updates are performed modulo _**10<sup>9</sup> + 7**_.

Let's implement this solution in PHP: **[2787. Ways to Express an Integer as Sum of Powers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002787-ways-to-express-an-integer-as-sum-of-powers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $x
 * @return Integer
 */
function numberOfWays($n, $x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfWays(10, 2) . "\n"; // Output: 1
echo numberOfWays(4, 1) . "\n";  // Output: 2
?>
```

### Explanation:

1. **Initialization**: The `dp` array is initialized with zeros, except for `dp[0]` which is set to 1. This array will store the number of ways to achieve each sum from 0 to `n`.
2. **Finding <code>max<sub>i</sub></code>**: The loop calculates the largest integer <code>max<sub>i</sub></code> such that <code>max<sub>i</sub><sup>x</sup></code> does not exceed `n`. This determines the range of integers we need to consider for the sum.
3. **Dynamic Programming Update**: For each integer `i` from 1 to <code>max<sub>i</sub></code>:
    - Compute <code>v = i<sup>x</sup></code>.
    - Update the `dp` array from `n` down to `v` to ensure each integer is only used once per combination. For each `j`, the value `dp[j]` is incremented by `dp[j - v]`, representing the inclusion of `i` in the sum.
4. **Result Extraction**: The result is found in `dp[n]`, which gives the number of valid combinations modulo _**10<sup>9</sup> + 7**_.

This approach efficiently counts all unique combinations of integers raised to the `x`-th power that sum to `n` using dynamic programming, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**