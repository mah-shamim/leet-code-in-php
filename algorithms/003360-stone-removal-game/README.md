3360\. Stone Removal Game

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Simulation`, `Biweekly Contest 144`

Alice and Bob are playing a game where they take turns removing stones from a pile, with _Alice going first_.

- Alice starts by removing **exactly** 10 stones on her first turn.
- For each subsequent turn, each player removes **exactly** 1 fewer stone than the previous opponent.

The player who cannot make a move loses the game.

Given a positive integer `n`, return `true` if Alice wins the game and `false` otherwise.

**Example 1:**

- **Input:** n = 12
- **Output:** true
- **Explanation:**
  - Alice removes 10 stones on her first turn, leaving 2 stones for Bob.
  - Bob cannot remove 9 stones, so Alice wins.


**Example 2:**

- **Input:** n = 1
- **Output:** false
- **Explanation:**
  - Alice cannot remove 10 stones, so Alice loses.


**Example 3:**

- **Input:** n = 10
- **Output:** true


**Example 4:**

- **Input:** n = 19
- **Output:** false


**Example 5:**

- **Input:** n = 27
- **Output:** true


**Example 6:**

- **Input:** n = 50
- **Output:** true


**Constraints:**

- `1 <= n <= 50`


**Hint:**

1. The constraints are small enough that a brute-force solution is feasible.


**Similar Questions:**

1. [1510. Stone Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001510-stone-game-iv)


**Solution:**

We simulate the stone-removal game directly. Since the first removal is 10 and each later removal decreases by 1, the game lasts at most 10 turns. We track whose turn it is and subtract stones until the current player cannot remove the required amount. If Alice is the player unable to move, she loses; otherwise, Bob cannot move, so Alice wins.

## Approach

- Start with `remove = 10`, representing Alice’s first required removal.
- Use a boolean `aliceTurn` to track whose turn it currently is.
- While the pile has at least `remove` stones:
  - Subtract `remove` from `n`.
  - Decrease `remove` by 1 for the next turn.
  - Switch the turn between Alice and Bob.
- After the loop:
  - If it is Alice’s turn, she cannot move, so return `false`.
  - If it is Bob’s turn, Bob cannot move, so Alice wins and return `true`.

Let's implement this solution in PHP: **[3360. Stone Removal Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003360-stone-removal-game/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function canAliceWin(int $n): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo (canAliceWin(12) ? "true" : "false") . "\n"; // Output: true
echo (canAliceWin(1)  ? "true" : "false") . "\n"; // Output: false
echo (canAliceWin(10) ? "true" : "false") . "\n"; // Output: true
echo (canAliceWin(19) ? "true" : "false") . "\n"; // Output: false
echo (canAliceWin(27) ? "true" : "false") . "\n"; // Output: true
echo (canAliceWin(50) ? "true" : "false") . "\n"; // Output: true

?>
```

## Explanation

- Alice always moves first and must remove exactly 10 stones.
- On each following turn, the required removal is one less than the previous turn.
- The sequence of required removals is `10, 9, 8, 7, ...`.
- If the current required removal is greater than the remaining stones, the current player loses immediately.
- Since `n <= 50`, simulation is simple and safe.

## Complexity Analysis

- **Time Complexity:** `O(1)` — the loop runs at most 10 times because removals start at 10 and decrease to 1.
- **Space Complexity:** `O(1)` — only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**