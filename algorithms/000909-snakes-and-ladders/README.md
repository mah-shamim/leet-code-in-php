909\. Snakes and Ladders

**Difficulty:** Medium

**Topics:** `Array`, `Breadth-First Search`, `Matrix`

You are given an `n x n` integer matrix `board` where the cells are labeled from `1` to <code>n<sup>2</sup></code> in a [**Boustrophedon style**](https://en.wikipedia.org/wiki/Boustrophedon) starting from the bottom left of the board (i.e. `board[n - 1][0]`) and alternating direction each row.

You start on square `1` of the board. In each move, starting from square `curr`, do the following:

- Choose a destination square `next` with a label in the range <code>[curr + 1, min(curr + 6, n<sup>2</sup>)]</code>.
  - This choice simulates the result of a standard **6-sided die roll**: i.e., there are always at most 6 destinations, regardless of the size of the board.
- If `next` has a snake or ladder, you **must** move to the destination of that snake or ladder. Otherwise, you move to `next`.
- The game ends when you reach the square <code>n<sup>2</sup></code>.

A board square on row `r` and column `c` has a snake or ladder if `board[r][c] != -1`. The destination of that snake or ladder is `board[r][c]`. Squares `1` and <code>n<sup>2</sup></code> are not the starting points of any snake or ladder.

Note that you only take a snake or ladder at most once per dice roll. If the destination to a snake or ladder is the start of another snake or ladder, you do **not** follow the subsequent snake or ladder.

- For example, suppose the board is `[[-1,4],[-1,3]]`, and on the first move, your destination square is `2`. You follow the ladder to square `3`, but do **not** follow the subsequent ladder to `4`.

Return _the least number of dice rolls required to reach the square <code>n<sup>2</sup></code>. If it is not possible to reach the square, return `-1`_.

**Example 1:**

![snakes](https://assets.leetcode.com/uploads/2018/09/23/snakes.png)

- **Input:** board = [[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,35,-1,-1,13,-1],[-1,-1,-1,-1,-1,-1],[-1,15,-1,-1,-1,-1]]
- **Output:** 4
- **Explanation:**
  In the beginning, you start at square 1 (at row 5, column 0).
  You decide to move to square 2 and must take the ladder to square 15.
  You then decide to move to square 17 and must take the snake to square 13.
  You then decide to move to square 14 and must take the ladder to square 35.
  You then decide to move to square 36, ending the game.
  This is the lowest possible number of moves to reach the last square, so return 4.

**Example 2:**

- **Input:** board = [[-1,-1],[-1,3]]
- **Output:** 1



**Constraints:**

- `n == board.length == board[i].length`
- `2 <= n <= 20`
- `board[i][j]` is either `-1` or in the range <code>[1, n<sup>2</sup>]</code>.
- The squares labeled `1` and <code>n<sup>2</sup></code> are not the starting points of any snake or ladder.

**Similar Questions**

- [2467. Most Profitable Path in a Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002467-most-profitable-path-in-a-tree)


**Solution:**

We need to find the minimum number of dice rolls required to reach the last square (n²) in a Snakes and Ladders game. The board is labeled in a Boustrophedon style, meaning the labeling alternates direction each row starting from the bottom left. The solution involves simulating the game using Breadth-First Search (BFS) to explore all possible paths level by level, ensuring the shortest path is found efficiently.

### Approach
1. **Problem Analysis**: The game involves moving from square 1 to square n² on an n x n board. Each move consists of rolling a 6-sided die, moving to one of the next 6 squares (if available), and following any snake or ladder encountered. The challenge is to compute the least number of moves required to reach the final square.

2. **Key Insight**: BFS is suitable here because it explores all possible moves level by level, ensuring the first time we reach the destination square is via the shortest path. Each level in BFS corresponds to one dice roll.

3. **Board Conversion**: Convert the square number to its corresponding board coordinates (row, column) considering the Boustrophedon labeling. The bottom row is labeled left to right, the next row right to left, and so on.

4. **Snake/Ladder Handling**: If a square (after the die roll) has a snake or ladder, the player must move to the destination square specified by the board value. This is part of the same move.

5. **Visited Tracking**: Maintain a visited array to avoid reprocessing the same square, which optimizes the solution and prevents cycles.

Let's implement this solution in PHP: **[909. Snakes and Ladders](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000909-snakes-and-ladders/solution.php)**

```php
<?php
/**
 * @param Integer[][] $board
 * @return Integer
 */
function snakesAndLadders($board) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$board1 = [
    [-1,-1,-1,-1,-1,-1],
    [-1,-1,-1,-1,-1,-1],
    [-1,-1,-1,-1,-1,-1],
    [-1,35,-1,-1,13,-1],
    [-1,-1,-1,-1,-1,-1],
    [-1,15,-1,-1,-1,-1]
];
echo snakesAndLadders($board1); // Output: 4

$board2 = [
    [-1, -1],
    [-1, 3]
];
echo "\n" . snakesAndLadders($board2); // Output: 1
?>
```

### Explanation:

1. **Initialization**: The BFS starts from square 1 with 0 moves. A queue is used to manage the squares to be processed, and a visited array tracks processed squares to avoid cycles.
2. **Processing Moves**: For each square dequeued, the algorithm checks if it's the target square (n²). If so, it returns the current move count.
3. **Die Roll Simulation**: For each possible die roll (1 to 6), the next square is calculated. If this square exceeds n², the loop breaks early.
4. **Board Conversion**: The next square is converted to board coordinates (row, column) considering the alternating row directions (Boustrophedon style).
5. **Snake/Ladder Check**: If the converted square has a snake or ladder, the next square is updated to the destination value.
6. **Enqueueing Valid Moves**: If the next square (after handling snakes/ladders) hasn't been visited, it is marked as visited and enqueued with an incremented move count.
7. **Termination**: If the queue is exhausted without reaching the target square, -1 is returned, indicating it's unreachable.

This approach efficiently explores all possible paths using BFS, ensuring the shortest path is found while handling the game's rules for snakes and ladders. The complexity is O(n²) as each square is processed at most once.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**