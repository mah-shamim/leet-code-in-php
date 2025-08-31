37\. Sudoku Solver

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Backtracking`, `Matrix`

Write a program to solve a Sudoku puzzle by filling the empty cells.

A sudoku solution must satisfy **all of the following rules**:

1. Each of the digits `1-9` must occur exactly once in each row.
2. Each of the digits `1-9` must occur exactly once in each column.
3. Each of the digits `1-9` must occur exactly once in each of the 9 `3x3` sub-boxes of the grid.

The `'.'` character indicates empty cells.

**Example 1:**

![250px-Sudoku-by-L2G-20050714](https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Sudoku-by-L2G-20050714.svg/250px-Sudoku-by-L2G-20050714.svg.png)

- **Input:** board = [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]]
- **Output:** [["5","3","4","6","7","8","9","1","2"],["6","7","2","1","9","5","3","4","8"],["1","9","8","3","4","2","5","6","7"],["8","5","9","7","6","1","4","2","3"],["4","2","6","8","5","3","7","9","1"],["7","1","3","9","2","4","8","5","6"],["9","6","1","5","3","7","2","8","4"],["2","8","7","4","1","9","6","3","5"],["3","4","5","2","8","6","1","7","9"]]
- **Explanation:** The input board is shown above and the only valid solution is shown below:

![250px-Sudoku-by-L2G-20050714_solution](https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Sudoku-by-L2G-20050714_solution.svg/250px-Sudoku-by-L2G-20050714_solution.svg.png)

**Example 2:**

- **Input:** board = [[".",".",".",".",".",".",".",".","."],[".","9",".",".","1",".",".","3","."],[".",".","6",".","2",".","7",".","."],[".",".",".","3",".","4",".",".","."],["2","1",".",".",".",".",".","9","8"],[".",".",".",".",".",".",".",".","."],[".",".","2","5",".","6","4",".","."],[".","8",".",".",".",".",".","1","."],[".",".",".",".",".",".",".",".","."]]
- **Output:** [["5","3","4","6","7","8","9","1","2"],["6","7","2","1","9","5","3","4","8"],["1","9","8","3","4","2","5","6","7"],["8","5","9","7","6","1","4","2","3"],["4","2","6","8","5","3","7","9","1"],["7","1","3","9","2","4","8","5","6"],["9","6","1","5","3","7","2","8","4"],["2","8","7","4","1","9","6","3","5"],["3","4","5","2","8","6","1","7","9"]]

**Constraints:**

- `board.length == 9`
- `board[i].length == 9`
- `board[i][j] is a digit or '.'`.
- It is **guaranteed** that the input board has only one solution.



**Similar Questions:**
1. [36. Valid Sudoku](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000036-valid-sudoku)
2. [980. Unique Paths III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000980-unique-paths-iii)






**Solution:**

We need to optimize the Sudoku solver by reducing the time complexity of validity checks. The previous approach checked each digit's validity by scanning the entire row, column, and 3x3 box, which is inefficient. Instead, we can use arrays to keep track of which digits are already present in each row, column, and box. This allows us to check the validity of a digit in constant time.

### Approaches
1. **Initialization**: Initialize three arrays (`$rows`, `$cols`, `$boxes`) to keep track of digits present in each row, column, and 3x3 box.
2. **Preprocessing**: Populate these arrays based on the initial board configuration.
3. **Backtracking with Memoization**: Use backtracking to try digits 1-9 for each empty cell, but now use the precomputed arrays to check validity in constant time.
4. **Recursion**: Recursively attempt to fill empty cells, backtracking when no valid digit is found.

Let's implement this solution in PHP: **[37. Sudoku Solver](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000037-sudoku-solver/solution.php)**

```php
<?php
/**
 * @param String[][] $board
 * @return NULL
 */
function solveSudoku(&$board) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $board
 * @param $index
 * @param $rows
 * @param $cols
 * @param $boxes
 * @return bool
 */
private function solve(&$board, $index, &$rows, &$cols, &$boxes) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

solveSudoku($board);

// Print solved board
foreach ($board as $row) {
    echo implode(" ", $row) . PHP_EOL;
}

// Example 2
$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

solveSudoku($board);

// Print solved board
foreach ($board as $row) {
    echo implode(" ", $row) . PHP_EOL;
}
?>
```

### Explanation:

1. **Initialization**: We initialize three arrays (`$rows`, `$cols`, `$boxes`) to keep track of digits present in each row, column, and 3x3 box.
2. **Preprocessing**: We populate these arrays by iterating through the initial board, marking digits that are already present.
3. **Backtracking**: The `solve` function uses backtracking to fill empty cells. For each cell, it checks digits 1-9 using the precomputed arrays to ensure validity in constant time.
4. **Recursion**: If a digit is valid, it is placed in the cell, and the function recurses to the next cell. If the recursion fails, the digit is removed, and the next digit is tried.
5. **Termination**: The function returns `true` when all cells are filled correctly, ensuring the solution meets all Sudoku rules.

This optimized approach significantly reduces the time complexity of validity checks, making the solution efficient enough to handle the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**