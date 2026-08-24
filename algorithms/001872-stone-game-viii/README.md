1872\. Stone Game VIII

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Dynamic Programming`, `Minimax`, `Prefix Sum`, `Game Theory`, `Zero-Sum Game`, `Weekly Contest 242`

Alice and Bob take turns playing a game, with **Alice starting first**.

There are `n` stones arranged in a row. On each player's turn, while the number of stones is **more than one**, they will do the following:

1. Choose an integer `x > 1`, and **remove** the leftmost `x` stones from the row.
2. Add the **sum** of the **removed** stones' values to the player's score.
3. Place a **new stone**, whose value is equal to that sum, on the left side of the row.

The game stops when **only one** stone is left in the row.

The **score difference** between Alice and Bob is `(Alice's score - Bob's score)`. Alice's goal is to **maximize** the score difference, and Bob's goal is to **minimize** the score difference.

Given an integer array `stones` of length `n` where `stones[i]` represents the value of the `iᵗʰ` stone **from the left**, return _the **score difference** between Alice and Bob if they both play **optimally**_.

**Example 1:**

- **Input:** stones = [-1,2,-3,4,-5]
- **Output:** 5
- **Explanation:**
  - Alice removes the first 4 stones, adds (-1) + 2 + (-3) + 4 = 2 to her score, and places a stone of value 2 on the left. stones = [2,-5].
  - Bob removes the first 2 stones, adds 2 + (-5) = -3 to his score, and places a stone of value -3 on the left. stones = [-3].
  - The difference between their scores is 2 - (-3) = 5.

**Example 2:**

- **Input:** stones = [7,-6,5,10,5,-2,-6]
- **Output:** 13
- **Explanation:**
  - Alice removes all stones, adds 7 + (-6) + 5 + 10 + 5 + (-2) + (-6) = 13 to her score, and places a stone of value 13 on the left. stones = [13].
  - The difference between their scores is 13 - 0 = 13.

**Example 3:**

- **Input:** stones = [-10,-12]
- **Output:** -22
- **Explanation:**
  - Alice can only make one move, which is to remove both stones. She adds (-10) + (-12) = -22 to her score and places a stone of value -22 on the left. stones = [-22].
  - The difference between their scores is (-22) - 0 = -22.

**Example 4:**

- **Input:** stones = [1,2,3,4]
- **Output:** 10

**Example 5:**

- **Input:** stones = [-1,-2,-3,-4]
- **Output:** -10

**Example 6:**

- **Input:** stones = [5,0,-5,10]
- **Output:** 10

**Example 7:**

- **Input:** stones = [100, -100]
- **Output:** 0

**Example 8:**

- **Input:** stones = [-5, -3]
- **Output:** -8

**Example 9:**

- **Input:** stones = [3, -1, 2, -4, 5]
- **Output:** 5

**Example 10:**

- **Input:** stones = [100, -50]
- **Output:** 50

**Constraints:**

- `n == stones.length`
- `2 <= n <= 10⁵`
- `-10⁴ <= stones[i] <= 10⁴`


**Hint:**
1. Let's note that the only thing that matters is how many stones were removed so we can maintain `dp[numberOfRemovedStones]`
2. `dp[x] = max(sum of all elements up to y - dp[y])` for all `y > x`


**Similar Questions:**
1. [877. Stone Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000877-stone-game)
2. [1140. Stone Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001140-stone-game-ii)
3. [1406. Stone Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001406-stone-game-iii)
4. [1510. Stone Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001510-stone-game-iv)
5. [1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v)
6. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
7. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
8. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
9. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)


**Solution:**

We present a dynamic programming solution that computes the optimal score difference in Stone Game VIII. By leveraging prefix sums and a backward `DP` state, we efficiently determine the maximum difference Alice can guarantee, given optimal play from both players. The solution runs in _**O(n)**_ time and _**O(n)**_ space, making it feasible for n up to `1e5`.

## Approach

- The game state after any move is completely determined by the current leftmost stone’s value, which is the prefix sum up to some index `i`.
- We define `dp[i]` as the maximum score difference the current player can achieve when the game starts with a single stone of value `prefix[i]` (i.e., the first `i+1` original stones have been merged).
- If only two stones remain (i.e., `i = n-2`), the current player must take both, so `dp[n-2] = prefix[n-1]`.
- For `i < n-2`, the current player can either:
   - Take all remaining stones immediately (score = `prefix[n-1]`), or
   - Take `x` stones (where `x > 1`) and leave the opponent with a state starting at `prefix[i+1]`, with the opponent's optimal difference being `dp[i+1]`. The current player’s difference then becomes `prefix[i+1] - dp[i+1]`.
- We maximize over these two choices, which reduces to `dp[i] = max(dp[i+1], prefix[i+1] - dp[i+1])`.
- We compute `dp` from right to left and return `dp[0]`.

Let's implement this solution in PHP: **[1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii/solution.php)**

```php
<?php
/**
 * @param Integer[] $stones
 * @return Integer
 */
function stoneGameVIII(array $stones): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo stoneGameVIII([-1,2,-3,4,-5]) .  "\n";             // Output: 5
echo stoneGameVIII([7,-6,5,10,5,-2,-6]) .  "\n";        // Output: 13
echo stoneGameVIII([-10,-12]) .  "\n";                  // Output: -22
echo stoneGameVIII([1,2,3,4]) .  "\n";                  // Output: 10
echo stoneGameVIII([-1,-2,-3,-4]) .  "\n";              // Output: -10
echo stoneGameVIII([5,0,-5,10]) .  "\n";                // Output: 10
echo stoneGameVIII([100, -100]) .  "\n";                // Output: 0
echo stoneGameVIII([-5, -3]) .  "\n";                   // Output: -8
echo stoneGameVIII([3, -1, 2, -4, 5]) .  "\n";          // Output: 5
echo stoneGameVIII([100, -50]) .  "\n";                 // Output: 50
?>
```

### Explanation:

- **Prefix sums** are precomputed so that `prefix[i]` equals the sum of the first `i+1` stones. This represents the value of the merged stone after removing the first `i+1` stones.
- **DP state definition** is crucial: `dp[i]` is the best score difference for the player whose turn it is, assuming the row starts with one stone whose value is `prefix[i]`.
- **Base case**: When `i = n-2`, there are exactly two stones (the merged stone of value `prefix[n-2]` and the last original stone `stones[n-1]`). The only legal move is to remove both, so the difference is `prefix[n-1] - 0 = prefix[n-1]`.
- **Recurrence**: For `i < n-2`, the current player has two options:
   1. **Take all**: remove all remaining stones, get `prefix[n-1]` directly.
   2. **Take some but not all**: remove `x > 1` stones, which corresponds to moving to state `i+1`. The current player gains `prefix[i+1]`, and then the opponent will get `dp[i+1]` from the new state, so the net difference is `prefix[i+1] - dp[i+1]`.
- Since `dp[i+1]` already represents optimal play from the next state, we only need to choose the maximum between `dp[i+1]` and `prefix[i+1] - dp[i+1]`.
- We iterate **backwards** from `n-3` down to `0` because `dp[i]` depends only on `dp[i+1]` and `prefix[i+1]`.
- Finally, `dp[0]` gives the answer, as the game initially starts with a row of `n` stones, equivalent to a single stone of value `prefix[0] = stones[0]` after removing 0 stones – but since the first move must remove at least 2 stones, our recurrence correctly handles that.

## Complexity Analysis

- **Time complexity**: _**O(n)**_ – we compute prefix sums in one pass, then fill the DP array in a second pass.
- **Space complexity**: _**O(n)**_ – we store prefix sums and the `DP` array. This can be optimized to _**O(1)**_ extra space by keeping only the last `DP` value, but _**O(n)**_ is acceptable given constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**