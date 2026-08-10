1510\. Stone Game IV

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Math`, `Dynamic Programming`, `Minimax`, `Game Theory`, `Nim Game`, `Sprague–Grundy Theorem`, `Zero-Sum Game`, `Biweekly Contest 30`

Alice and Bob take turns playing a game, with Alice starting first.

Initially, there are `n` stones in a pile. On each player's turn, that player makes a _move_ consisting of removing **any** non-zero square **number** of stones in the pile.

Also, if a player cannot make a move, he/she loses the game.

Given a positive integer `n`, return `true` if and only if Alice wins the game otherwise return `false`, assuming both players play optimally.

**Example 1:**

- **Input:** n = 1
- **Output:** true
- **Explanation:** Alice can remove 1 stone winning the game because Bob doesn't have any moves.

**Example 2:**

- **Input:** n = 2
- **Output:** false
- **Explanation:** Alice can only remove 1 stone, after that Bob removes the last one winning the game (2 → 1 → 0).

**Example 3:**

- **Input:** n = 4
- **Output:** true
- **Explanation:** n is already a perfect square, Alice can win with one move, removing 4 stones (4 → 0).

**Example 4:**

- **Input:** n = 3
- **Output:** true

**Example 5:**

- **Input:** n = 5
- **Output:** true

**Example 6:**

- **Input:** n = 6
- **Output:** true

**Example 7:**

- **Input:** n = 7
- **Output:** true

**Example 8:**

- **Input:** n = 8
- **Output:** true

**Example 9:**

- **Input:** n = 9
- **Output:** true

**Example 10:**

- **Input:** n = 10
- **Output:** true

**Example 11:**

- **Input:** n = 11
- **Output:** true

**Example 12:**

- **Input:** n = 12
- **Output:** true

**Example 13:**

- **Input:** n = 13
- **Output:** true

**Example 14:**

- **Input:** n = 14
- **Output:** true

**Constraints:**

- `1 <= n <= 10⁵`


**Hint:**
1. Use dynamic programming to keep track of winning and losing states. Given some number of stones, Alice can win if she can force Bob onto a losing state.


**Similar Questions:**
1. [1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v)
2. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
3. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
4. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
5. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)
6. [3360. Stone Removal Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003360-stone-removal-game)


**Solution:**

We implement a dynamic programming solution to determine if Alice can win the stone game where players can only remove perfect square numbers of stones. The solution uses bottom-up DP to evaluate winning/losing states, where a state is winning if there exists any move that leads to a losing state for the opponent. This approach efficiently handles the constraint `n ≤ 10⁵` by computing each state only once.

## Approach

• **Dynamic Programming State Definition**: `dp[i]` represents whether the current player can force a win with `i` stones remaining
• **Base Case**: `dp[0] = false` (no stones means current player loses)
• **Transition**: For each state `i`, try removing all possible perfect squares `(1², 2², 3², ..., k²)` where `k² ≤ i`
• **Winning Condition**: If any move `j²` leads to a losing state `dp[i - j²] == false`, then `dp[i] = true`
• **Losing Condition**: If all possible moves lead to winning states for the opponent, then `dp[i] = false`
• **Optimization**: Break early when a winning move is found to save computation

Let's implement this solution in PHP: **[1510. Stone Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001510-stone-game-iv/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function winnerSquareGame(int $n): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo winnerSquareGame(1) .  "\n";   // Output: true
echo winnerSquareGame(2) .  "\n";   // Output: false
echo winnerSquareGame(4) .  "\n";   // Output: true
echo winnerSquareGame(3) .  "\n";   // Output: true
echo winnerSquareGame(5) .  "\n";   // Output: true
echo winnerSquareGame(6) .  "\n";   // Output: true
echo winnerSquareGame(7) .  "\n";   // Output: true
echo winnerSquareGame(8) .  "\n";   // Output: true
echo winnerSquareGame(9) .  "\n";   // Output: true
echo winnerSquareGame(10) .  "\n";  // Output: true
echo winnerSquareGame(11) .  "\n";  // Output: true
echo winnerSquareGame(12) .  "\n";  // Output: true
echo winnerSquareGame(13) .  "\n";  // Output: true
echo winnerSquareGame(14) .  "\n";  // Output: true
?>
```

### Explanation:

• **Game Theory Foundation**: This is an impartial combinatorial game where both players have the same moves available from any state
• **Optimal Play**: A player always chooses a move that guarantees eventual victory if one exists
• **State Evaluation**: With `i` stones, the current player can remove any perfect square `≤ i`, leaving `i - square` stones
• **Recursive Relationship**: The current player wins if they can move to any losing state; otherwise they lose
• **Bottom-up Computation**: Starting from `0` stones up to `n`, we can determine all states' outcomes
• **Perfect Square Generation**: Generate squares incrementally using `j * j` until exceeding current stone count
• **Memory Efficiency**: Only need _**O(n)**_ space for the DP array

## Complexity Analysis

• **Time Complexity**: _**O(n√n)**_ - For each state up to `n`, we try all perfect squares up to `√i`, resulting in approximately `n√n` operations
• **Space Complexity**: _**O(n)**_ - We maintain a DP array of size `n+1` to store boolean values
• **Optimization Potential**: The early break when finding a winning move reduces practical runtime significantly

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**