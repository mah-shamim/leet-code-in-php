3693\. Climbing Stairs II

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Dynamic Programming`, `Biweekly Contest 166`

You are climbing a staircase with `n + 1` steps, numbered from 0 to `n`.

You are also given a **1-indexed** integer array `costs` of length `n`, where `costs[i]` is the cost of step `i`.

From step `i`, you can jump **only** to step `i + 1`, `i + 2`, or `i + 3`. The cost of jumping from step `i` to step `j` is defined as: `costs[j] + (j - i)²`

You start from step 0 with `cost = 0`.

Return _the **minimum** total cost to reach step `n`_.

**Example 1:**

- **Input:** n = 4, costs = [1,2,3,4]
- **Output:** 13
- **Explanation:**
    - One optimal path is `0 → 1 → 2 → 4`
      
    |Jump	|Cost Calculation	|Cost|
    |-------|------------------------------|----|
    |0 → 1	|`costs[1] + (1 - 0)² = 1 + 1`	|2|
    |1 → 2	|`costs[2] + (2 - 1)² = 2 + 1`	|3|
    |2 → 4	|`costs[4] + (4 - 2)² = 4 + 4`	|8|
    - Thus, the minimum total cost is `2 + 3 + 8 = 13`

**Example 2:**

- **Input:** n = 4, costs = [5,1,6,2]
- **Output:** 11
- **Explanation:**

    - One optimal path is `0 → 2 → 4`
      
    |Jump	|Cost Calculation	|Cost|
    |-------|------------------------------|----|
    |0 → 2	|`costs[2] + (2 - 0)² = 1 + 4`	|5|
    |2 → 4	|`costs[4] + (4 - 2)² = 2 + 4`	|6|
    - Thus, the minimum total cost is `5 + 6 = 11`

**Example 3:**

- **Input:** n = 3, costs = [9,8,3]
- **Output:** 12
- **Explanation:** The optimal path is `0 → 3` with total `cost = costs[3] + (3 - 0)² = 3 + 9 = 12`

**Example 4:**

- **Input:** n = 1, costs = [5]
- **Output:** 6

**Example 5:**

- **Input:** n = 2, costs = [1,1]
- **Output:** 4

**Example 6:**

- **Input:** n = 5, costs = [1,1,1,1,1]
- **Output:** 10

**Example 7:**

- **Input:** n = 10, costs = [1,1,1,1,1,1,1,1,1,1]
- **Output:** 20

**Example 8:**

- **Input:** n = 100000, costs = [1, 1, ..., 1] (100000 elements)
- **Output:** 200000

**Example 9:**

- **Input:** n = 4, costs = [10000,10000,10000,10000]
- **Output:** 20008

**Example 10:**

- **Input:** n = 6, costs = [2,5,1,3,4,7]
- **Output:** 23

**Constraints:**

- `1 <= n == costs.length <= 10⁵`
- `1 <= costs[i] <= 10⁴`


**Hint:**

1. Use dynamic programming where `dp[j]` represents the minimum cost to reach step `j`.
2. From step `i`, you can jump to `i+1`, `i+2`, or `i+3`. Transition depends only on the previous three states.
3. `dp[j] = min(dp[i] + costs[j] + (j - i)²)` for all `i` in {`j-1`, `j-2`, `j-3`}.
4. Initialize `dp[0] = 0` and compute up to `dp[n]`; the answer is `dp[n]`.


**Solution:**

We are given a staircase with `n + 1` steps (`0` to `n`) and a 1-indexed `costs` array. From any step `i`, we can jump 1, 2, or 3 steps forward. Each jump `i → j` costs `costs[j] + (j - i)²`. We start at step `0` with cost `0` and need the **minimum total cost to reach step `n`**. This is solved efficiently with **linear dynamic programming** because each state depends only on the previous three states.

## Approach

- Define `dp[j]` = **minimum total cost to reach step `j`**.
- Base case: `dp[0] = 0` (we start here for free).
- Because a jump is limited to 1, 2, or 3 steps, the only predecessors of step `j` are `j-1`, `j-2`, and `j-3` (clamped at 0).
- For each step `j` from 1 to `n`:
  - Try jumping from each valid predecessor `i ∈ {j-3, j-2, j-1}` (but `i ≥ 0`).
  - Compute `dp[i] + costs[j] + (j - i)²`.
  - Take the minimum over these up to 3 candidates → `dp[j]`.
- The answer is `dp[n]`.

Let's implement this solution in PHP: **[3693. Climbing Stairs II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003693-climbing-stairs-ii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $costs
 * @return Integer
 */
function climbStairs(int $n, array $costs): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo climbStairs(4, [1,2,3,4]) . "\n";                         // Output: 13
echo climbStairs(4, [5,1,6,2]) . "\n";                         // Output: 11
echo climbStairs(3, [9,8,3]) . "\n";                           // Output: 12
echo climbStairs(1, [5]) . "\n";                               // Output: 6
echo climbStairs(2, [1,1]) . "\n";                             // Output: 4
echo climbStairs(5, [1,1,1,1,1]) . "\n";                       // Output: 10
echo climbStairs(10, array_fill(0, 10, 1)) . "\n";             // Output: 20
echo climbStairs(100000, array_fill(0, 100000, 1)) . "\n";     // Output: 200000
echo climbStairs(4, [10000,10000,10000,10000]) . "\n";         // Output: 20008
echo climbStairs(6, [2,5,1,3,4,7]) . "\n";                     // Output: 23
?>
```

## Explanation

- **`dp` array initialization:** `array_fill(0, $n + 1, 0)` creates `n+1` slots, all set to 0; `dp[0]` is already 0.
- **Outer loop `for ($j = 1; $j <= $n; $j++)`:** fills the DP table in increasing order of step index, which is valid because every transition goes to a smaller index.
- **`$start = max(0, $j - 3)`:** ensures we only look back up to 3 steps and never index a negative step.
- **`$stepCost = $costs[$j - 1]`:** translates the 1-indexed problem statement into PHP's 0-indexed array — cost of step `j` is `$costs[j-1]`.
- **Inner loop `for ($i = $start; $i < $j; $i++)`:** considers all reachable predecessors `i` within distance 1–3.
- **Transition:** `$candidate = $dp[$i] + $stepCost + $distance * $distance` combines the cost to reach `i`, the landing cost on `j`, and the squared jump distance.
- **Minimize:** `$best` tracks the minimum candidate; `dp[j] = $best` stores the optimal cost for step `j`.
- **Return `$dp[$n]`:** the minimum total cost to reach the top step.

## Complexity Analysis

- **Time Complexity:** `O(n)` — outer loop runs `n` times, inner loop runs at most 3 iterations per step.
- **Space Complexity:** `O(n)` — for the `dp` array of size `n + 1`.
  - (Can be optimized to `O(1)` since only the last 3 DP values are needed.)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**