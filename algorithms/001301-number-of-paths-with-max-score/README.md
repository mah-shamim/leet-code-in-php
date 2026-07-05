1301\. Number of Paths with Max Score

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Dynamic Programming`, `Matrix`, `Biweekly Contest 16`

You are given a square `board` of characters. You can move on the board starting at the bottom right square marked with the character `'S'`.

You need to reach the top left square marked with the character `'E'`. The rest of the squares are labeled either with a numeric character `1, 2, ..., 9` or with an obstacle `'X'`. In one move you can go up, left or up-left (diagonally) only if there is no obstacle there.

Return a list of two integers: the first integer is the maximum sum of numeric characters you can collect, and the second is the number of such paths that you can take to get that maximum sum, **taken modulo** `10⁹ + 7`.

In case there is no path, return `[0, 0]`.

**Example 1:**

- **Input:** board = ["E23","2X2","12S"]
- **Output:** [7,1]

**Example 2:**

- **Input:** board = ["E12","1X1","21S"]
- **Output:** [4,2]

**Example 3:**

- **Input:** board = ["E11","XXX","11S"]
- **Output:** [0,0]

**Example 4:**

- **Input:** board = ["E99","999","99S"]
- **Output:** [36,1]

**Example 5:**

- **Input:** board = ["E11","111","11S"]
- **Output:** [4,6]

**Example 6:**

- **Input:** board = ["E1","1S"]
- **Output:** [1,2]

**Example 7:**

- **Input:** board = ["EX","XS"]
- **Output:** [0,0]

**Example 8:**

- **Input:** board = ["E99","9X9","999"]
- **Output:** [36,2]

**Constraints:**

- `2 <= board.length == board[i].length <= 100`


**Hint:**
1. Use dynamic programming to find the path with the max score.
2. Use another dynamic programming array to count the number of paths with max score.


**Solution:**

We implement a dynamic programming (DP) solution that traverses the board from bottom‑right (`'S'`) to top‑left (`'E'`) using only up, left, and up‑left moves. For each cell, we track two values: the maximum numeric sum achievable from that cell to the start, and the number of distinct paths that yield that maximum sum. By processing cells in reverse order (bottom‑right to top‑left) and combining results from the three possible predecessors, we efficiently compute the answer. The solution handles obstacles (`'X'`), ignores numeric values on `'E'` and `'S'`, and applies modulo `10⁹+7` for path counts.

## Approach

- **Reverse DP traversal** – Start from `'S'` at `(n-1, m-1)` with score `0` and path count `1`. Process all other cells in reverse row‑major order (bottom‑right to top‑left).
- **Three possible moves** – From current cell `(i,j)`, we can come from:
   - Down (`i+1, j`)
   - Right (`i, j+1`)
   - Down‑right (`i+1, j+1`)
- **Score calculation** – For each valid predecessor, add the numeric value of the current cell (unless it is `'E'`, which contributes `0`).
- **Selection logic** – For each cell:
   - Compare the three candidate scores.
   - Keep the maximum score and sum the path counts of all predecessors that achieve that maximum.
- **Modulo handling** – Path counts are stored modulo `10⁹+7`.
- **Final check** – If `dp[0][0]` remains `NEG`, no path exists → return `[0,0]`.

Let's implement this solution in PHP: **[1301. Number of Paths with Max Score](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001301-number-of-paths-with-max-score/solution.php)**

```php
<?php
/**
 * @param String[] $board
 * @return Integer[]
 */
function pathsWithMaxScore(array $board): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(pathsWithMaxScore(["E23","2X2","12S"])) .  "\n";        // Output: [7,1]
print_r(pathsWithMaxScore(["E12","1X1","21S"])) .  "\n";        // Output: [4,2]
print_r(pathsWithMaxScore(["E11","XXX","11S"])) .  "\n";        // Output: [0,0]
print_r(pathsWithMaxScore(["E99","999","99S"])) .  "\n";        // Output: [36,1]
print_r(pathsWithMaxScore(["E11","111","11S"])) .  "\n";        // Output: [4,6]
print_r(pathsWithMaxScore(["E1","1S"])) .  "\n";                // Output: [1,2]
print_r(pathsWithMaxScore(["EX","XS"])) .  "\n";                // Output: [0,0]
print_r(pathsWithMaxScore(["E99","9X9","999"])) .  "\n";        // Output: [36,2]
?>
```

### Explanation:

- **DP table `dp[i][j]`** stores the maximum sum collected from `(i,j)` to `'S'`.
- **Ways table `ways[i][j]`** stores the number of paths that achieve `dp[i][j]` from `(i,j)` to `'S'`.
- **Initialisation** – `dp[n-1][m-1] = 0`, `ways[n-1][m-1] = 1` because starting at `'S'` collects no numbers and there is exactly one way (being already there).
- **Obstacle skipping** – Cells with `'X'` are ignored; they cannot be part of any valid path.
- **Numeric contribution** – When moving *to* a cell, we add that cell’s digit to the score. For `'E'`, we add `0` so that the score only includes digits from intermediate cells.
- **Count aggregation** – If a new maximum is found, the count resets to that predecessor’s count. If another predecessor ties the maximum, its count is added.
- **No‑path detection** – If a cell cannot be reached from any valid predecessor, `dp[i][j]` stays `NEG` and `ways[i][j]` stays `0`.

## Complexity Analysis

- **Time complexity:** _**O(n²)**_ – We iterate over all _**n×n**_ cells exactly once, and for each we check at most three predecessors.
- **Space complexity:** _**O(n²)**_ – Two 2D arrays of size _**n×n**_ are used to store DP scores and path counts.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**