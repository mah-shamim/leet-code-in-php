773\. Sliding Puzzle

**Difficulty:** Hard

**Topics:** `Array`, `Breadth-First Search`, `Matrix`

On an `2 x 3` board, there are five tiles labeled from `1` to `5`, and an empty square represented by `0`. A **move** consists of choosing `0` and a 4-directionally adjacent number and swapping it.

The state of the board is solved if and only if the board is `[[1,2,3],[4,5,0]]`.

Given the puzzle board `board`, return _the least number of moves required so that the state of the board is solved_. If it is impossible for the state of the board to be solved, return `-1`.

**Example 1:**

![slide1-grid](https://assets.leetcode.com/uploads/2021/06/29/slide1-grid.jpg)

- **Input:** board = [[1,2,3],[4,0,5]]
- **Output:** 1
- **Explanation:** Swap the 0 and the 5 in one move.

**Example 2:**

![slide2-grid](https://assets.leetcode.com/uploads/2021/06/29/slide2-grid.jpg)

- **Input:** board = [[1,2,3],[5,4,0]]
- **Output:** -1
- **Explanation:** No number of moves will make the board solved.


**Example 3:**

![slide3-grid](https://assets.leetcode.com/uploads/2021/06/29/slide3-grid.jpg)

- **Input:** board = [[4,1,2],[5,0,3]]
- **Output:** 5
- **Explanation:** 5 is the smallest number of moves that solves the board.
  An example path:
  After move 0: [[4,1,2],[5,0,3]]
  After move 1: [[4,1,2],[0,5,3]]
  After move 2: [[0,1,2],[4,5,3]]
  After move 3: [[1,0,2],[4,5,3]]
  After move 4: [[1,2,0],[4,5,3]]
  After move 5: [[1,2,3],[4,5,0]]


**Constraints:**

- `board.length == 2`
- `board[i].length == 3`
- `0 <= board[i][j] <= 5`
- Each value `board[i][j]` is **unique**.


**Hint:**
1. Perform a breadth-first-search, where the nodes are the puzzle boards and edges are if two puzzle boards can be transformed into one another with one move.



**Solution:**

We can apply the Breadth-First Search (BFS) algorithm. The idea is to explore all possible configurations of the board starting from the given initial state, one move at a time, until we reach the solved state.

### Approach:
1. **Breadth-First Search (BFS):**
   - BFS is ideal here because we are looking for the shortest path to the solved state.
   - Each board configuration can be considered a node, and the edges between nodes represent valid moves where the `0` tile is swapped with an adjacent tile.
   - The BFS will explore the board configurations level by level, ensuring that we reach the solved state with the minimum number of moves.

2. **State Representation:**
   - We will represent the board as a string (for easier comparison and storage).
   - The solved state is `"123450"` because it's a linear representation of the board `[[1,2,3],[4,5,0]]`.

3. **State Transitions:**
   - From each state, the `0` tile can swap with one of its 4 neighbors (up, down, left, right), if it's within the bounds of the board.

4. **Tracking Visited States:**
   - We need to keep track of visited states to avoid cycles and redundant calculations.

5. **Checking for the Solved State:**
   - If at any point the board configuration matches the solved state, we return the number of moves it took to get there.

6. **Handling Impossible Cases:**
   - If BFS completes and we don't find the solved state, it means it's impossible to solve the puzzle, and we return `-1`.

Let's implement this solution in PHP: **[773. Sliding Puzzle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000773-sliding-puzzle/solution.php)**

```php
<?php
/**
 * @param Integer[][] $board
 * @return Integer
 */
function slidingPuzzle($board) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$board1 = [[1, 2, 3], [4, 0, 5]];
echo slidingPuzzle($board1);  // Output: 1

$board2 = [[1, 2, 3], [5, 4, 0]];
echo slidingPuzzle($board2);  // Output: -1

$board3 = [[4, 1, 2], [5, 0, 3]];
echo slidingPuzzle($board3);  // Output: 5
?>
```

### Explanation:

- **Initial Setup:** We start by converting the 2D board into a 1D string for easier manipulation.
- **BFS Execution:** We enqueue the initial state of the board along with the move count (starting from 0). In each BFS iteration, we explore the possible moves (based on the `0` tile's position), swap `0` with adjacent tiles, and enqueue the new states.
- **Visited States:** We use a dictionary to keep track of visited board states to avoid revisiting and looping back to the same states.
- **Edge Validation:** We check that any move remains within the bounds of the 2x3 grid, especially ensuring no illegal moves that wrap around the grid (such as moving left at the left edge or right at the right edge).
- **Return Result:** If we reach the target state, we return the number of moves. If BFS completes and we don’t reach the target, we return `-1`.

### Time Complexity:
- **BFS Complexity:** The time complexity of BFS is `O(N)`, where `N` is the number of unique board states. For this puzzle, there are at most `6!` (720) possible configurations.

### Space Complexity:
- The space complexity is also `O(N)` due to the storage required for the queue and visited states.

This solution should be efficient enough given the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



