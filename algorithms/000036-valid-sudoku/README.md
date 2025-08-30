36\. Valid Sudok

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Matrix`

Determine if a `9 x 9` Sudoku board is valid. Only the filled cells need to be validated **according to the following rules**:

1. Each row must contain the digits `1-9` without repetition.
2. Each column must contain the digits `1-9` without repetition.
3. Each of the nine `3 x 3` sub-boxes of the grid must contain the digits `1-9` without repetition.

**Note:**

- A Sudoku board (partially filled) could be valid but is not necessarily solvable.
- Only the filled cells need to be validated according to the mentioned rules.


**Example 1:**

![250px-Sudoku-by-L2G-20050714](https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Sudoku-by-L2G-20050714.svg/250px-Sudoku-by-L2G-20050714.svg.png)

- **Input:** board =
  [["5","3",".",".","7",".",".",".","."]
  ,["6",".",".","1","9","5",".",".","."]
  ,[".","9","8",".",".",".",".","6","."]
  ,["8",".",".",".","6",".",".",".","3"]
  ,["4",".",".","8",".","3",".",".","1"]
  ,["7",".",".",".","2",".",".",".","6"]
  ,[".","6",".",".",".",".","2","8","."]
  ,[".",".",".","4","1","9",".",".","5"]
  ,[".",".",".",".","8",".",".","7","9"]]
- **Output:** true

**Example 2:**

- **Input:** board =
  [["8","3",".",".","7",".",".",".","."]
  ,["6",".",".","1","9","5",".",".","."]
  ,[".","9","8",".",".",".",".","6","."]
  ,["8",".",".",".","6",".",".",".","3"]
  ,["4",".",".","8",".","3",".",".","1"]
  ,["7",".",".",".","2",".",".",".","6"]
  ,[".","6",".",".",".",".","2","8","."]
  ,[".",".",".","4","1","9",".",".","5"]
  ,[".",".",".",".","8",".",".","7","9"]]
- **Output:** false
- **Explanation:** Same as Example 1, except with the **5** in the top left corner being modified to **8**. Since there are two 8's in the top left 3x3 sub-box, it is invalid

**Constraints:**

- `board.length == 9`
- `board[i].length == 9`
- `board[i][j]` is a digit `1-9` or `'.'`.



**Similar Questions:**
1. [37. Sudoku Solver](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000037-sudoku-solver)
2. [2133. Check if Every Row and Column Contains All Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002133-check-if-every-row-and-column-contains-all-numbers)






**Solution:**

We need to determine if a given 9x9 Sudoku board is valid according to the standard Sudoku rules. The rules require that each row, each column, and each of the nine 3x3 sub-boxes contains unique digits from 1 to 9, ignoring any empty cells (represented by '.').

### Approach
The approach involves checking three main conditions:
1. **Rows Check**: Each row must have unique digits (1-9) without repetition.
2. **Columns Check**: Each column must have unique digits (1-9) without repetition.
3. **Sub-boxes Check**: Each of the nine 3x3 sub-boxes must have unique digits (1-9) without repetition.

To efficiently check these conditions, we use arrays to keep track of digits encountered in each row, column, and sub-box. For each non-empty cell in the board, we check if the digit has already been seen in the current row, column, or sub-box. If it has, the board is invalid. Otherwise, we mark the digit as seen in the respective row, column, and sub-box.

The key insight is to compute the index of the sub-box for any given cell. The sub-box index can be calculated using the formula: `(row // 3) * 3 + (col // 3)`, where `//` denotes integer division.

Let's implement this solution in PHP: **[36. Valid Sudok](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000036-valid-sudoku/solution.php)**

```php
<?php
/**
 * @param String[][] $board
 * @return Boolean
 */
function isValidSudoku($board) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// --------------------
// Example 1: Valid board
// --------------------
$board1 = array(
  array("5","3",".",".","7",".",".",".","."),
  array("6",".",".","1","9","5",".",".","."),
  array(".","9","8",".",".",".",".","6","."),
  array("8",".",".",".","6",".",".",".","3"),
  array("4",".",".","8",".","3",".",".","1"),
  array("7",".",".",".","2",".",".",".","6"),
  array(".","6",".",".",".",".","2","8","."),
  array(".",".",".","4","1","9",".",".","5"),
  array(".",".",".",".","8",".",".","7","9")
);

echo "Example 1: " . (isValidSudoku($board1) ? "true" : "false") . "\n";

// --------------------
// Example 2: Invalid board
// --------------------
$board2 = array(
  array("8","3",".",".","7",".",".",".","."),
  array("6",".",".","1","9","5",".",".","."),
  array(".","9","8",".",".",".",".","6","."),
  array("8",".",".",".","6",".",".",".","3"),
  array("4",".",".","8",".","3",".",".","1"),
  array("7",".",".",".","2",".",".",".","6"),
  array(".","6",".",".",".",".","2","8","."),
  array(".",".",".","4","1","9",".",".","5"),
  array(".",".",".",".","8",".",".","7","9")
);

echo "Example 2: " . (isValidSudoku($board2) ? "true" : "false") . "\n";
?>
```

### Explanation:

1. **Initialization**: We initialize three arrays, `$rows`, `$columns`, and `$boxes`, each with 9 elements. Each element is an associative array (or dictionary) to keep track of digits encountered in the corresponding row, column, or sub-box.
2. **Iteration**: We iterate through each cell in the 9x9 board. For each non-empty cell (digit other than '.'), we check if the digit has already been recorded in the current row, column, or sub-box.
3. **Sub-box Index Calculation**: The sub-box index for a cell at (`$i`, `$j`) is calculated as `(int)($i / 3) * 3 + (int)($j / 3)`. This formula maps each cell to one of the nine sub-boxes.
4. **Validation Check**: If the digit is found in any of the tracked arrays (`$rows`, `$columns`, or `$boxes`), the function immediately returns `false`, indicating an invalid board.
5. **Marking Digits**: If the digit is not found, it is added to the corresponding arrays to mark its presence in the current row, column, and sub-box.
6. **Completion**: If all cells are processed without finding any duplicates, the function returns `true`, indicating a valid board.

This approach efficiently checks the validity of the Sudoku board by leveraging arrays to track seen digits, ensuring optimal performance with a time complexity of O(1) per cell check, leading to an overall O(81) or constant time complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**