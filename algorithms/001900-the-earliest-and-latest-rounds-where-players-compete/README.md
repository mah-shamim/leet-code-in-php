1900\. The Earliest and Latest Rounds Where Players Compete

**Difficulty:** Hard

**Topics:** `Dynamic Programming`, `Memoization`

There is a tournament where `n` players are participating. The players are standing in a single row and are numbered from `1` to `n` based on their **initial** standing position (player `1` is the first player in the row, player `2` is the second player in the row, etc.).

The tournament consists of multiple rounds (starting from round number `1`). In each round, the <code>i<sup>th</sup></code> player from the front of the row competes against the <code>i<sup>th</sup></code> player from the end of the row, and the winner advances to the next round. When the number of players is odd for the current round, the player in the middle automatically advances to the next round.

- For example, if the row consists of players `1, 2, 4, 6, 7`
  - Player `1` competes against player `7`.
  - Player `2` competes against player `6`.
  - Player `4` automatically advances to the next round.

After each round is over, the winners are lined back up in the row based on the **original ordering** assigned to them initially (ascending order).

The players numbered `firstPlayer` and `secondPlayer` are the best in the tournament. They can win against any other player before they compete against each other. If any two other players compete against each other, either of them might win, and thus you may **choose** the outcome of this round.

Given the integers `n`, `firstPlayer`, and `secondPlayer`, return _an integer array containing two values, the **earliest** possible round number and the **latest** possible round number in which these two players will compete against each other, respectively_.

**Example 1:**

- **Input:** n = 11, firstPlayer = 2, secondPlayer = 4
- **Output:** [3,4]
- **Explanation:**
  One possible scenario which leads to the earliest round number:
  First round: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
  Second round: 2, 3, 4, 5, 6, 11
  Third round: 2, 3, 4
  One possible scenario which leads to the latest round number:
  First round: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
  Second round: 1, 2, 3, 4, 5, 6
  Third round: 1, 2, 4
  Fourth round: 2, 4

**Example 2:**

- **Input:** n = 5, firstPlayer = 1, secondPlayer = 5
- **Output:** [1,1]
- **Explanation:** 
  The players numbered 1 and 5 compete in the first round.
  There is no way to make them compete in any other round.

**Constraints:**

- `2 <= n <= 28`
- `1 <= firstPlayer < secondPlayer <= n`


**Hint:**
1. Brute force using bitmasks and simulate the rounds.
2. Calculate each state one time and save its solution.






**Solution:**

We need to determine the earliest and latest rounds in which two given players (firstPlayer and secondPlayer) will compete against each other in a tournament. The tournament involves multiple rounds where players are paired in a specific manner, and the outcomes of matches not involving the two best players can be chosen arbitrarily to either expedite or delay their meeting.

### Approach
1. **Problem Analysis**: The tournament consists of rounds where players are paired from the front and end of a sorted list. The two best players (firstPlayer and secondPlayer) always win their matches until they face each other. The goal is to find the earliest and latest rounds in which they can meet by controlling the outcomes of other matches.
2. **Key Insight**: The two players will meet in a round if, in the sorted list of current players, their positions are symmetric (i.e., the position of the second player from the end matches the position of the first player from the start). This symmetry condition is checked each round.
3. **Breadth-First Search (BFS)**: We use BFS to simulate each round. For each state (represented by a bitmask of current players), we:
   - **Check if players meet**: Verify if their positions in the sorted list satisfy the symmetry condition.
   - **Generate next states**: For matches not involving the best players, consider both possible winners. For matches involving the best players, the winner is fixed.
4. **State Management**: Use a bitset to efficiently track visited states per round to avoid redundant processing. The BFS processes each round level by level, updating the earliest and latest meeting rounds as soon as they are found.

Let's implement this solution in PHP: **[1900. The Earliest and Latest Rounds Where Players Compete](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001900-the-earliest-and-latest-rounds-where-players-compete/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $firstPlayer
 * @param Integer $secondPlayer
 * @return Integer[]
 */
function earliestAndLatest($n, $firstPlayer, $secondPlayer) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $round
 * @param $mask
 * @param $visited
 * @param $int_len
 * @return false|int
 */
function isVisited($round, $mask, &$visited, $int_len) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $round
 * @param $mask
 * @param $visited
 * @param $int_len
 * @return void
 */
function setVisited($round, $mask, &$visited, $int_len) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(earliestAndLatest(11, 2, 4)); // Output: [3, 4]
print_r(earliestAndLatest(5, 1, 5));  // Output: [1, 1]
?>
```

### Explanation:

1. **Initialization**: The solution initializes the maximum rounds (6 for up to 28 players) and a bitset to track visited states per round.
2. **BFS Setup**: The BFS starts with all players (bitmask `(1 << n) - 1`) in round 1.
3. **Round Processing**: For each round:
   - **Player List Extraction**: Converts the current bitmask into a sorted list of players.
   - **Symmetry Check**: Checks if the positions of the two best players in the list are symmetric (indicating they meet this round).
   - **Next State Generation**: For each match:
      - Fixed winners for matches involving the best players.
      - Both outcomes considered for other matches, generating new states (bitmasks) for the next round.
4. **State Tracking**: Uses a bitset to efficiently mark and check visited states to avoid redundant processing.
5. **Result Update**: Updates the earliest and latest meeting rounds whenever the symmetry condition is met during BFS traversal.

This approach efficiently explores all possible tournament paths while leveraging bit manipulation for state management, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**