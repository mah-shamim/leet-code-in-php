486\. Predict the Winner

**Difficulty:** Medium

**Topics:** `Senior Staff`, `Array`, `Math`, `Dynamic Programming`, `Recursion`, `Game Theory`

You are given an integer array `nums`. Two players are playing a game with this array: player 1 and player 2.

Player 1 and player 2 take turns, with player 1 starting first. Both players start the game with a score of `0`. At each turn, the player takes one of the numbers from either end of the array (i.e., `nums[0]` `or nums[nums.length - 1]`) which reduces the size of the array by 1. The player adds the chosen number to their score. The game ends when there are no more elements in the array.

Return `true` if Player 1 can win the game. If the scores of both players are equal, then player 1 is still the winner, and you should also return `true`. You may assume that both players are playing optimally.

**Example 1:**

- **Input:** nums = [1,5,2]
- **Output:** false
- **Explanation:**
  - Initially, player 1 can choose between 1 and 2.
  - If he chooses 2 (or 1), then player 2 can choose from 1 (or 2) and 5. If player 2 chooses 5, then player 1 will be left with 1 (or 2).
  - So, final score of player 1 is 1 + 2 = 3, and player 2 is 5.
  - Hence, player 1 will never be the winner, and you need to return false.

**Example 2:**

- **Input:** nums = [1,5,233,7]
- **Output:** true
- **Explanation:**
  - Player 1 first chooses 1. Then player 2 has to choose between 5 and 7. No matter which number player 2 choose, player 1 can choose 233.
  - Finally, player 1 has more score (234) than player 2 (12), so you need to return True representing player1 can win.

**Example 3:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** true

**Example 4:**

- **Input:** nums = [1,1,1,1,1]
- **Output:** true

**Example 5:**

- **Input:** nums = [10,1,1,10]
- **Output:** true

**Example 6:**

- **Input:** nums = [0,0,0,0]
- **Output:** true

**Example 7:**

- **Input:** nums = [1,1]
- **Output:** true

**Example 8:**

- **Input:** nums = [10,1]
- **Output:** true

**Example 9:**

- **Input:** nums = [1,2,3,4]
- **Output:** true

**Example 10:**

- **Input:** nums = [100,1,1,100]
- **Output:** true

**Constraints:**

- `1 <= nums.length <= 20`
- `0 <= nums[i] <= 10⁷`


**Similar Questions:**
1. [464. Can I Win](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000464-can-i-win)
2. [3222. Find the Winning Player in Coin Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003222-find-the-winning-player-in-coin-game)
3. [3238. Find the Number of Winning Players](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003238-find-the-number-of-winning-players)
4. [3320. Count The Number of Winning Sequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003320-count-the-number-of-winning-sequences)


**Solution:**

We implement a dynamic programming solution to determine if Player 1 can win the "Predict the Winner" game. Our approach computes the maximum score advantage Player 1 can achieve over Player 2 from any subarray, assuming both players play optimally. By building a 2D DP table where `dp[i][j]` represents the optimal score difference Player 1 can attain from subarray `nums[i..j]`, we can determine if Player 1's advantage from the entire array is non-negative, indicating a win or tie.

## Approach

- **Dynamic Programming State Definition**: We define `dp[i][j]` as the maximum score difference (Player 1's score minus Player 2's score) that the current player can achieve from the subarray `nums[i..j]` when both play optimally
- **Base Cases**: When there's only one element (`i == j`), the current player takes it, so `dp[i][i] = nums[i]`
- **Transition Logic**: For subarray length ≥ 2:
   - If Player 1 takes `nums[i]`, they gain `nums[i]` but then Player 2 becomes the "current player" for subarray `nums[i+1..j]`. Since Player 2 will minimize Player 1's advantage, we subtract `dp[i+1][j]`
   - If Player 1 takes `nums[j]`, similarly: `nums[j] - dp[i][j-1]`
   - Player 1 chooses the option that maximizes their advantage: `dp[i][j] = max(nums[i] - dp[i+1][j], nums[j] - dp[i][j-1])`
- **Bottom-Up Construction**: We fill the DP table by increasing subarray length, starting from length 2 up to the full array length
- **Final Decision**: If `dp[0][n-1] >= 0`, Player 1 can win or tie; otherwise Player 2 wins

Let's implement this solution in PHP: **[486. Predict the Winner](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000486-predict-the-winner/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function predictTheWinner(array $nums): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo predictTheWinner([1,5,2]) ? 'true' : 'false' .  "\n";              // Output: false
echo predictTheWinner([1,5,233,7]) ? 'true' : 'false' .  "\n";          // Output: true
echo predictTheWinner([1,2,3,4,5]) ? 'true' : 'false' .  "\n";          // Output: true
echo predictTheWinner([1,1,1,1,1]) ? 'true' : 'false' .  "\n";          // Output: true
echo predictTheWinner([10,1,1,10]) ? 'true' : 'false' .  "\n";          // Output: true
echo predictTheWinner([0,0,0,0]) ? 'true' : 'false' .  "\n";            // Output: true
echo predictTheWinner([1,1]) ? 'true' : 'false' .  "\n";                // Output: true
echo predictTheWinner([10,1]) ? 'true' : 'false' .  "\n";               // Output: true
echo predictTheWinner([1,2,3,4]) ? 'true' : 'false' .  "\n";            // Output: true
echo predictTheWinner([100,1,1,100]) ? 'true' : 'false' .  "\n";        // Output: true
?>
```

### Explanation:

- **Optimal Play Modeling**: The DP elegantly captures the turn-based nature where each player tries to maximize their own advantage while assuming the opponent will do the same
- **Score Difference Tracking**: Instead of tracking absolute scores, we track the difference, which simplifies the game to a `minimax` problem
- **Subproblem Reuse**: Each subarray problem depends only on smaller subarrays (with one element removed from either end), allowing efficient bottom-up computation
- **Symmetry in Game**: The equation `nums[i] - dp[i+1][j]` works because after Player 1 takes `nums[i]`, Player 2 becomes the "current player" whose optimal play yields a difference of `dp[i+1][j]` from Player 2's perspective
- **No Recursion Overhead**: Our iterative approach avoids the exponential time complexity of recursive `minimax` with memoization, despite using the same logical structure

## Complexity Analysis

- **Time Complexity**: _**O(n²)**_ where `n` is the length of the array. We fill an `n×n` `DP` table with each cell computed in _**O(1)**_ time
- **Space Complexity**: _**O(n²)**_ for the `DP` table. Could be optimized to _**O(n)**_ space since we only need the previous length layer, but we maintain clarity with the `2D` approach given `n ≤ 20`

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**