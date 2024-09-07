1140\. Stone Game II

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Dynamic Programming`, `Prefix Sum`, `Game Theory`

Alice and Bob continue their games with piles of stones.  There are a number of piles **arranged in a row**, and each pile has a positive integer number of stones `piles[i]`.  The objective of the game is to end with the most stones.

Alice and Bob take turns, with Alice starting first.  Initially,` M = 1`.

On each player's turn, that player can take **all the stones** in the **first** `X` remaining piles, where `1 <= X <= 2M`.  Then, we set `M = max(M, X)`.

The game continues until all the stones have been taken.

Assuming Alice and Bob play optimally, return _the maximum number of stones Alice can get_.

**Example 1:**

- **Input:** piles = [2,7,9,4,4]
- **Output:** 10
- **Explanation:** If Alice takes one pile at the beginning, Bob takes two piles, then Alice takes 2 piles again. Alice can get 2 + 4 + 4 = 10 piles in total. If Alice takes two piles at the beginning, then Bob can take all three piles left. In this case, Alice get 2 + 7 = 9 piles in total. So we return 10 since it's larger.

**Example 2:**

- **Input:** piles = [1,2,3,4,5,100]
- **Output:** 104

**Constraints:**

- <code>1 <= piles.length <= 100</code>
- <code>1 <= piles[i] <= 10<sup>4</sup></code>

**Hint:**
1. Use dynamic programming: the states are (i, m) for the answer of `piles[i:]` and that given `m`.


**Solution:**


We need to use dynamic programming to find the maximum number of stones Alice can get if both players play optimally. Here's a step-by-step approach to develop the solution:

1. **Define the State and Transition:**
   - Define a 2D DP array where `dp[i][m]` represents the maximum stones Alice can collect starting from pile `i` with a maximum pick limit `m`.
   - Use a prefix sum array to efficiently calculate the sum of stones in subarrays.

2. **Base Case:**
   - If there are no stones left to pick, the score is 0.

3. **Recursive Case:**
   - For each pile `i` and maximum allowed pick `m`, calculate the maximum stones Alice can collect by considering all possible moves (taking `1` to `2m` piles).

4. **Transition Function:**
   - For each possible number of piles Alice can pick, compute the total stones Alice can get and use the results of future states to decide the optimal move.

Let's implement this solution in PHP: **[1140. Stone Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001140-stone-game-ii/solution.php)**

```php
<?php
// Example usage
$solution = new Solution();
$piles1 = [2, 7, 9, 4, 4];
$piles2 = [1, 2, 3, 4, 5, 100];
echo $solution->stoneGameII($piles1) . "\n"; // Output: 10
echo $solution->stoneGameII($piles2) . "\n"; // Output: 104
?>
```

### Explanation:

1. **Prefix Sum Calculation:** This helps in quickly calculating the sum of stones from any pile `i` to `j`.
2. **DP Array Initialization:** `dp[i][m]` holds the maximum stones Alice can get starting from pile `i` with a maximum pick limit of `m`.
3. **Dynamic Programming Transition:** For each pile and `m`, compute the maximum stones Alice can collect by iterating over possible pile counts she can take and updating the DP array accordingly.

This approach ensures that the solution is computed efficiently, taking advantage of dynamic programming to avoid redundant calculations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
