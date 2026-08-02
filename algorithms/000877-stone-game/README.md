877\. Stone Game

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Dynamic Programming`, `Game Theory`, `Weekly Contest 95`

Alice and Bob play a game with piles of stones. There are an **even** number of piles arranged in a row, and each pile has a **positive** integer number of stones `piles[i]`.

The objective of the game is to end with the most stones. The **total** number of stones across all the piles is **odd**, so there are no ties.

Alice and Bob take turns, with **Alice starting first**. Each turn, a player takes the entire pile of stones either from the **beginning** or from the end of the row. This continues until there are no more piles left, at which point the person with the **most stones wins**.

Assuming Alice and Bob play optimally, return _`true` if Alice wins the game, or `false` if Bob wins_.

**Example 1:**

- **Input:** piles = [5,3,4,5]
- **Output:** true
- **Explanation:**
  - Alice starts first, and can only take the first 5 or the last 5.
  - Say she takes the first 5, so that the row becomes [3, 4, 5].
  - If Bob takes 3, then the board is [4, 5], and Alice takes 5 to win with 10 points.
  - If Bob takes the last 5, then the board is [3, 4], and Alice takes 4 to win with 9 points.
  - This demonstrated that taking the first 5 was a winning move for Alice, so we return true.

**Example 2:**

- **Input:** piles = [3,7,2,3]
- **Output:** true

**Example 3:**

- **Input:** piles = [1,2]
- **Output:** true

**Example 4:**

- **Input:** piles = [2,2,2,2]
- **Output:** true

**Example 5:**

- **Input:** piles = [8,15,3,7,10,12]
- **Output:** true

**Example 6:**

- **Input:** piles = [6,9,4,11]
- **Output:** true

**Constraints:**

- `2 <= piles.length <= 500`
- `piles.length` is **even**.
- `1 <= piles[i] <= 500`
- `sum(piles[i])` is **odd**.


**Similar Questions:**
1. [1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v)
2. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
3. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
4. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
5. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)
6. [2396. Strictly Palindromic Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002396-strictly-palindromic-number)
7. [2786. Visit Array Positions to Maximize Score](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002786-visit-array-positions-to-maximize-score)


**Solution:**

We implemented a solution for the Stone Game problem using dynamic programming to determine if Alice can win when both players play optimally. The solution leverages the fact that with an even number of piles and an odd total sum, there is always a winning strategy for the first player, though we still compute the optimal outcome using minimax-style DP.

## Approach

- **Dynamic Programming State**: We define `dp[i][j]` as the maximum advantage (difference in stones) the current player can achieve over their opponent when playing on the subarray `piles[i...j]`.
- **Base Case**: When there is only one pile (`i == j`), the current player takes it all, giving an advantage of `piles[i]`.
- **Transition**: For any interval `[i, j]`, the current player can choose either:
   - Take the left pile (`piles[i]`), then the opponent becomes the current player for `[i+1, j]`, so the advantage is `piles[i] - dp[i+1][j]`
   - Take the right pile (`piles[j]`), then the opponent becomes the current player for `[i, j-1]`, so the advantage is `piles[j] - dp[i][j-1]`
- **Decision**: We take the maximum of these two options, representing optimal play.
- **Final Result**: If `dp[0][n-1] > 0`, Alice (the first player) has a positive advantage and wins.

Let's implement this solution in PHP: **[877. Stone Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000877-stone-game/solution.php)**

```php
<?php
/**
 * @param Integer[] $piles
 * @return Boolean
 */
function stoneGame(array $piles): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo stoneGame([5,3,4,5]) .  "\n";          // Output: true
echo stoneGame([3,7,2,3]) .  "\n";          // Output: true
echo stoneGame([1,2]) .  "\n";              // Output: true
echo stoneGame([2,2,2,2]) .  "\n";          // Output: true
echo stoneGame([8,15,3,7,10,12]) .  "\n";   // Output: true
echo stoneGame([6,9,4,11]) .  "\n";         // Output: true
?>
```

### Explanation:

- **Optimal Play Assumption**: The DP accounts for both players playing optimally by always choosing the move that maximizes their advantage.
- **Subtraction Technique**: Instead of tracking absolute scores, we track the difference in stones between the current player and the opponent, which simplifies the DP logic.
- **Even Length Property**: With an even number of piles and an odd total sum, Alice can always win by taking all piles at odd or even positions, making the result always `true`.
- **Memoization**: The DP builds solutions bottom-up, starting from the smallest intervals and working up to the full array.
- **Time Complexity**: _**O(n²)**_ where n is the number of piles, filling a triangular DP table.
- **Space Complexity**: _**O(n²)**_ for the DP table, which is acceptable given the constraint of `n ≤ 500`.

## Complexity Analysis

- **Time Complexity**: _**O(n²)**_ — We fill a 2D DP table where each cell is computed once.
- **Space Complexity**: _**O(n²)**_ — We store the DP table of size `n×n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**