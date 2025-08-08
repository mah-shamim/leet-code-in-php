808\. Soup Servings

**Difficulty:** Medium

**Topics:** `Math`, `Dynamic Programming`, `Probability and Statistics`, `Weekly Contest 78`

You have two soups, **A** and **B**, each starting with `n` mL. On every turn, one of the following four serving operations is chosen _at random_, each with probability `0.25` **independent** of all previous turns:

- pour 100 mL from type A and 0 mL from type B
- pour 75 mL from type A and 25 mL from type B
- pour 50 mL from type A and 50 mL from type B
- pour 25 mL from type A and 75 mL from type B

**Note:**

- There is no operation that pours 0 mL from A and 100 mL from B.
- The amounts from A and B are poured simultaneously during the turn.
- If an operation asks you to pour **more than** you have left of a soup, pour all that remains of that soup.

The process stops immediately after any turn in which one of the soups is used up.

Return _the probability that A is used up before B, plus half the probability that both soups are used up in the **same turn**_. Answers within <code>10<sup>-5</sup></code> of the actual answer will be accepted.

**Example 1:**

- **Input:** n = 50
- **Output:** 0.62500
- **Explanation:**
  If we perform either of the first two serving operations, soup A will become empty first.
  If we perform the third operation, A and B will become empty at the same time.
  If we perform the fourth operation, B will become empty first.
  So the total probability of A becoming empty first plus half the probability that A and B become empty at the same time, is 0.25 * (1 + 1 + 0.5 + 0) = 0.625.

**Example 2:**

- **Input:** n = 100
- **Output:** 0.71875
- **Explanation:**
  If we perform the first serving operation, soup A will become empty first.
  If we perform the second serving operations, A will become empty on performing operation [1, 2, 3], and both A and B become empty on performing operation 4.
  If we perform the third operation, A will become empty on performing operation [1, 2], and both A and B become empty on performing operation 3.
  If we perform the fourth operation, A will become empty on performing operation 1, and both A and B become empty on performing operation 2.
  So the total probability of A becoming empty first plus half the probability that A and B become empty at the same time, is 0.71875.

**Example 3:**

- **Input:** n = 1
- **Output:** 0.62500

**Constraints:**

- <code>0 <= n <= 10<sup>9</sup></code>






**Solution:**

We need to compute the probability that soup A is used up before soup B, plus half the probability that both soups are used up in the same turn. The solution involves dynamic programming to efficiently calculate the probabilities for different states of the soups' volumes.

### Approach
1. **Problem Analysis**: The problem involves two soups, A and B, starting with `n` mL each. Each turn, one of four operations is chosen randomly, each with a probability of 0.25. The operations involve pouring different amounts from each soup. The process stops when either soup is depleted. The goal is to compute the probability that soup A is emptied before soup B, plus half the probability that both are emptied simultaneously.

2. **Key Insight**: For large values of `n` (specifically, `n >= 4800`), the probability that soup A is emptied before soup B is very close to 1 (within an acceptable error margin of 1e-5). Thus, we can directly return 1.0 for such cases to optimize performance.

3. **Dynamic Programming Setup**: For smaller values of `n` (i.e., `n < 4800`), we scale the problem by converting volumes into units of 25 mL (since each operation involves multiples of 25 mL). This reduces the problem size to `k = ceil(n / 25)`, making it feasible to use dynamic programming.

4. **DP State Definition**: We define `dp[i][j]` as the probability that soup A is emptied before soup B, plus half the probability both are emptied simultaneously, starting from `i` units of soup A and `j` units of soup B (where each unit is 25 mL).

5. **Base Cases**:
    - If both soups are already empty (`i <= 0 and j <= 0`), the probability is 0.5 (both emptied simultaneously without any operation).
    - If only soup A is empty (`i <= 0 and j > 0`), the probability is 1.0 (A emptied before B).
    - If only soup B is empty (`j <= 0 and i > 0`), the probability is 0.0 (B emptied before A).

6. **Recursive Case**: For each state `(i, j)`, we consider the four possible operations. Each operation reduces the volumes of soups A and B by specific amounts (clamped to non-negative values). The result for `dp[i][j]` is the average of the results from these four operations.

7. **Iterative Calculation**: We iteratively compute the DP table for all possible states from `(0, 0)` to `(k, k)` in increasing order of `i` and `j` to ensure dependencies are resolved.

Let's implement this solution in PHP: **[808. Soup Servings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000808-soup-servings/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Float
 */
function soupServings($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo soupServings(50) . "\n";   // Expected 0.62500
echo soupServings(100) . "\n";  // Expected 0.71875
?>
```

### Explanation:

1. **Threshold Handling**: For `n >= 4800`, the solution returns 1.0 immediately, leveraging the observation that the probability approaches 1 for large `n`.
2. **Scaling**: The problem is scaled down by converting volumes into units of 25 mL, reducing `n` to `k = ceil(n / 25)`.
3. **Base Cases**: Directly handle scenarios where one or both soups are already empty.
4. **DP Table Initialization**: A 2D array `dp` is initialized to store probabilities for all possible states `(i, j)`.
5. **Iterative Calculation**: The DP table is filled in increasing order of `i` and `j`. For each state, the solution averages the probabilities from the four possible operations, adjusting volumes to non-negative values.
6. **Result Extraction**: The result for the initial state `(k, k)` is returned, representing the desired probability for the original problem.

This approach efficiently computes the solution using dynamic programming, optimized by scaling and threshold handling for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**