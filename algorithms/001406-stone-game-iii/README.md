1406\. Stone Game III

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Math`, `Dynamic Programming`, `Minimax`, `Game Theory`, `Zero-Sum Game`, `Weekly Contest 183`

Alice and Bob continue their games with piles of stones. There are several stones **arranged in a row**, and each stone has an associated value which is an integer given in the array `stoneValue`.

Alice and Bob take turns, with Alice starting first. On each player's turn, that player can take `1`, `2`, or `3` stones from the **first** remaining stones in the row.

The score of each player is the sum of the values of the stones taken. The score of each player is `0` initially.

The objective of the game is to end with the highest score, and the winner is the player with the highest score and there could be a tie. The game continues until all the stones have been taken.

Assume Alice and Bob **play optimally**.

Return _`"Alice"` if Alice will win, `"Bob"` if Bob will win, or `"Tie"` if they will end the game with the same score_.

**Example 1:**

- **Input:** stoneValue = [1,2,3,7]
- **Output:** "Bob"
- **Explanation:** Alice will always lose. Her best move will be to take three piles and the score become 6. Now the score of Bob is 7 and Bob wins.

**Example 2:**

- **Input:** stoneValue = [1,2,3,-9]
- **Output:** "Alice"
- **Explanation:** 
  - Alice must choose all the three piles at the first move to win and leave Bob with negative score.
  - If Alice chooses one pile her score will be 1 and the next move Bob's score becomes 5. In the next move, Alice will take the pile with value = -9 and lose.
  - If Alice chooses two piles her score will be 3 and the next move Bob's score becomes 3. In the next move, Alice will take the pile with value = -9 and also lose.
  - Remember that both play optimally so here Alice will choose the scenario that makes her win.

**Example 3:**

- **Input:** stoneValue = [1,2,3,6]
- **Output:** "Tie"
- **Explanation:** Alice cannot win this game. She can end the game in a draw if she decided to choose all the first three piles, otherwise she will lose.

**Example 4:**

- **Input:** stoneValue = [1]
- **Output:** "Alice"

**Example 5:**

- **Input:** stoneValue = [-1,-2,-3]
- **Output:** "Bob"

**Example 6:**

- **Input:** stoneValue = [0,0,0]
- **Output:** "Tie"

**Example 7:**

- **Input:** stoneValue = [1000,-1000,1000]
- **Output:** "Alice"

**Example 8:**

- **Input:** stoneValue = [10, -20, 30, -40, 50]
- **Output:** "Alice"

**Example 9:**

- **Input:** stoneValue = [-5, -5, -5, -5, -5]
- **Output:** "Bob"

**Example 10:**

- **Input:** stoneValue = [1,2,3,4,5,6,7,8,9,10]
- **Output:** "Alice"

**Constraints:**

- `1 <= stoneValue.length <= 5 * 10⁴`
- `-1000 <= stoneValue[i] <= 1000`


**Hint:**
1. The game can be mapped to minmax game. Alice tries to maximize the total score and Bob tries to minimize it.
2. Use dynamic programming to simulate the game. If the total score was 0 the game is "Tie", and if it has positive value then "Alice" wins, otherwise "Bob" wins.


**Similar Questions:**
1. [1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v)
2. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
3. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
4. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
5. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)


**Solution:**

We use a dynamic programming (DP) approach to model the minimax game. `dp[i]` represents the maximum **relative score difference** (current player's total − opponent's total) that the current player can achieve from index `i` onward.

## Approach

- We define `dp[i]` as the best advantage (score difference) the player whose turn it is can obtain from pile `i` to the end.
- Work **backwards** from the last pile to the first.
- At each position `i`, the current player can take `1`, `2`, or `3` stones.
- If they take `k` stones, their gain is `sum` of those stones, and the opponent will then get `dp[i+k]` advantage from the remaining piles.
- So the net difference for the current player becomes:  
  `sum − dp[i+k]`.
- We take the maximum over all valid `k` values (1 to 3).
- After filling `dp[0]`, the game result depends on its sign:
   - `> 0` → Alice wins
   - `< 0` → Bob wins
   - `== 0` → Tie

Let's implement this solution in PHP: **[1406. Stone Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001406-stone-game-iii/solution.php)**

```php
<?php
/**
 * @param Integer[] $stoneValue
 * @return String
 */
function stoneGameIII(array $stoneValue): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo stoneGameIII([1, 2, 3, 7]) . "\n";                 // Output: "Bob"
echo stoneGameIII([1, 2, 3, -9]) . "\n";                // Output: "Alice"
echo stoneGameIII([1, 2, 3, 6]) . "\n";                 // Output: "Tie"
echo stoneGameIII([1]) . "\n";                          // Output: "Alice"
echo stoneGameIII([-1,-2,-3]) . "\n";                   // Output: "Bob"
echo stoneGameIII([0,0,0]) . "\n";                      // Output: "Tie"
echo stoneGameIII([1000,-1000,1000]) . "\n";            // Output: "Alice"
echo stoneGameIII([10, -20, 30, -40, 50]) . "\n";       // Output: "Alice"
echo stoneGameIII([-5, -5, -5, -5, -5]) . "\n";         // Output: "Bob"
echo stoneGameIII([1,2,3,4,5,6,7,8,9,10]) . "\n";       // Output: "Alice"
?>
```

### Explanation:

- **Base case**: `dp[n] = 0`, because with no stones left, the advantage is 0.
- **Transition**:
   - At index `i`, initialize `dp[i]` to a very small number.
   - For `k = 1, 2, 3` (if valid), compute sum of `k` stones starting at `i`.
   - Then compute candidate: `sum − dp[i+k]`.
   - Keep the maximum candidate.
- `dp[i]` essentially stores the best **score difference** (current player's future total minus opponent's future total) from this state.
- At `i = 0`, Alice is the current player, so:
   - `dp[0] > 0` → Alice's total > Bob's total → Alice wins.
   - `dp[0] < 0` → Bob wins.
   - `dp[0] == 0` → Tie.

## Complexity Analysis

- **Time Complexity**: `O(n)`, We iterate through the array once and for each index, try at most 3 moves.
- **Space Complexity**: `O(n)`, We use an array `dp` of size `n + 1`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**