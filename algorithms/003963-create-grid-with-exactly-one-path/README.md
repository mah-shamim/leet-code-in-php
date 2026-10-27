3963\. Create Grid With Exactly One Path

**Difficulty:** Easy

**Topics:** `Mid Level`, `Biweekly Contest 185`

You are given two integers `m` and `n`, representing the number of rows and columns of a grid.

Construct **any** `m x n` grid consisting only of the characters `'.'` and `'#'`, where:

- `'.'` represents a free cell.
- `'#'` represents an obstacle cell.

A **valid path** is a sequence of free cells that:

- Starts at the top-left cell `(0, 0)`.
- Ends at the bottom-right cell `(m - 1, n - 1)`.
- Moves only:
    - Right, from `(i, j)` to `(i, j + 1)`, or
    - Down, from `(i, j)` to `(i + 1, j)`.

Return any grid such that there is **exactly one valid path** from the top-left cell to the bottom-right cell.

**Example 1:**

- **Input:** m = 2, n = 3
- **Output:** ["..#","#.."]
  - **Explanation:**
  ![screenshot-2026-05-26-at-61005pm](https://assets.leetcode.com/uploads/2026/05/26/screenshot-2026-05-26-at-61005pm.png)
  - The only valid path is: `(0,0) → (0,1) → (1,1) → (1,2)`

**Example 2:**

- **Input:** m = 3, n = 3
- **Output:** ["..#","#..","##."]
  - **Explanation:**
  ![screenshot-2026-05-26-at-61129pm](https://assets.leetcode.com/uploads/2026/05/26/screenshot-2026-05-26-at-61129pm.png)
  - The only valid path is: `(0,0) → (0,1) → (1,1) → (1,2) → (2,2)`

**Example 3:**

- **Input:** m = 1, n = 4
- **Output:** ["...."]
  - **Explanation:** The only valid path is: `(0,0) → (0,1) → (0,2) → (0,3)`

**Example 4:**

- **Input:** m = 4, n = 1
- **Output:** [".",".",".","."]
  - **Explanation:** Single column; the only valid path is: `(0,0) → (1,0) → (2,0) → (3,0)`

**Example 5:**

- **Input:** m = 1, n = 1
- **Output:** ["."]
  - **Explanation:** Minimal grid; the only valid path is: `(0,0)`

**Example 6:**

- **Input:** m = 2, n = 2
- **Output:** [".#",".."]
  - **Explanation:** Smallest 2D case; the only valid path is: `(0,0) → (1,0) → (1,1)`

**Example 7:**

- **Input:** m = 25, n = 25
- **Output:** Top row all `'.'`, rightmost column all `'.'`, every other cell `'#'`
  - **Explanation:** The only valid path is: go right 24 times along the top row, then down 24 times along the rightmost column — `(0,0) → (0,1) → … → (0,24) → (1,24) → … → (24,24)`. Demonstrates the maximum constraint.

**Example 8:**

- **Input:** m = 5, n = 2
- **Output:** [".#",".#",".#",".#",".."]
  - **Explanation:** Narrow grid (2 columns); the top-right cell `(0,1)` is blocked, so the only valid path is: `(0,0) → (1,0) → (2,0) → (3,0) → (4,0) → (4,1)`

**Constraints:**

- `1 <= m, n <= 25`


**Hint:**

1. It is enough to leave one simple route made of free cells and block every other cell.
2. There are many routes to choose from. What is the simplest one you can think of?
3. One possible route: Go right while possible, then go down till you reach the destination.


**Similar Questions:**

1. [3988. Create Grid With Exactly K Paths I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003988-create-grid-with-exactly-k-paths-i)


**Solution:**

We construct an `m × n` grid where exactly one valid path exists by keeping only the **top row** and the **rightmost column** as free cells (`.`) and blocking every other cell (`#`). This forces a single path: traverse right along the top row to the top-right corner, then down the rightmost column to the bottom-right corner. Since every other route is walled off, exactly one valid path remains.

## Approach

- **Choose the simplest route:** Go right as far as possible (top row), then down to the destination (rightmost column) — exactly as suggested by Hint #3.
- **Free cells on this route only:** Cells `(0, j)` for all `j` and `(i, n-1)` for all `i` are `.`.
- **Block everything else:** Any cell with `i > 0` and `j < n-1` becomes `#`.
- **Handle degenerate cases automatically:** For `m = 1` or `n = 1`, the "top row" or "rightmost column" covers the entire grid, so the row/column is naturally all `.` — still exactly one path.
- **No overlap issue:** The top row and rightmost column intersect at `(0, n-1)`, which is `.` either way, so no conflict.

Let's implement this solution in PHP: **[3963. Create Grid With Exactly One Path](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003963-create-grid-with-exactly-one-path/solution.php)**

```php
<?php
/**
 * @param Integer $m
 * @param Integer $n
 * @return String[]
 */
function createGrid(int $m, int $n): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo json_encode(createGrid(2, 3)) . "\n"; // Output: ["..#","#.."]
echo json_encode(createGrid(3, 3)) . "\n"; // Output: ["..#","#..","##."]
echo json_encode(createGrid(1, 4)) . "\n"; // Output: ["...."]
echo json_encode(createGrid(4, 1)) . "\n"; // Output: [".",".",".","."]
echo json_encode(createGrid(1, 1)) . "\n"; // Output: ["."]
echo json_encode(createGrid(2, 2)) . "\n"; // Output: [".#",".."]
echo json_encode(createGrid(5, 2)) . "\n"; // Output: [".#",".#",".#",".#",".."]
// For (25, 25), the output is a long array; use json_encode to print it.
echo json_encode(createGrid(25, 25)) . "\n"; // Output: [".........................", ".#.......................#", ...] (full grid)
?>
```

## Explanation:

- **Path construction:** The unique path is `(0,0) → (0,1) → … → (0,n-1) → (1,n-1) → … → (m-1,n-1)`.
- **Why no other path exists:**
  - To leave the top row downward, you must be at column `n-1` (only free cells below the top row are in the rightmost column).
  - Any step down before reaching column `n-1` lands on a `#` cell.
  - Once on the rightmost column, you cannot move left (only right/down moves allowed), so you must go straight down.
- **Uniqueness:** There is exactly one sequence of right/down moves that stays on free cells — so exactly one valid path.
- **Reachability:** Both start `(0,0)` and end `(m-1,n-1)` lie on this route; `(0,0)` is in the top row and `(m-1,n-1)` is in the rightmost column, so both are `.`.
- **Edge cases:** `m = 1` → single row all `.` (one path). `n = 1` → single column all `.` (one path).

## Complexity Analysis

- **Time Complexity:** `O(m × n)` — we visit each cell once to decide its character.
- **Space Complexity:** `O(m × n)` — storing the output grid of `m` strings, each of length `n` (excluding output space, the auxiliary space is `O(1)`).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**