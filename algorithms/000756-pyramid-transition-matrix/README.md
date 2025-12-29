756\. Pyramid Transition Matrix

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Backtracking`, `Bit Manipulation`, `Weekly Contest 65`

You are stacking blocks to form a pyramid. Each block has a color, which is represented by a single letter. Each row of blocks contains **one less block** than the row beneath it and is centered on top.

To make the pyramid aesthetically pleasing, there are only specific **triangular patterns** that are allowed. A triangular pattern consists of a **single block** stacked on top of **two blocks**. The patterns are given as a list of three-letter strings `allowed`, where the first two characters of a pattern represent the left and right bottom blocks respectively, and the third character is the top block.

- For example, `"ABC"` represents a triangular pattern with a `'C'` block stacked on top of an `'A'` (left) and `'B'` (right) block. Note that this is different from `"BAC"` where `'B'` is on the left bottom and `'A'` is on the right bottom.

You start with a bottom row of blocks `bottom`, given as a single string, that you **must** use as the base of the pyramid.

Given `bottom` and `allowed`, return _`true` if you can build the pyramid all the way to the top such that **every triangular pattern** in the pyramid is in `allowed`, or `false` otherwise_.

**Example 1:**

![pyramid1-grid](https://assets.leetcode.com/uploads/2021/08/26/pyramid1-grid.jpg)

- **Input:** bottom = "BCD", allowed = ["BCC","CDE","CEA","FFF"]
- **Output:** true
- **Explanation:** The allowed triangular patterns are shown on the right.
  Starting from the bottom (level 3), we can build "CE" on level 2 and then build "A" on level 1.
  There are three triangular patterns in the pyramid, which are "BCC", "CDE", and "CEA". All are allowed.

**Example 2:**

![pyramid2-grid](https://assets.leetcode.com/uploads/2021/08/26/pyramid2-grid.jpg)

- **Input:** bottom = "AAAA", allowed = ["AAB","AAC","BCD","BBE","DEF"]
- **Output:** false
- **Explanation:** The allowed triangular patterns are shown on the right.
  Starting from the bottom (level 4), there are multiple ways to build level 3, but trying all the possibilites, you will get always stuck before building level 1.

**Constraints:**

- `2 <= bottom.length <= 6`
- `0 <= allowed.length <= 216`
- `allowed[i].length == 3`
- The letters in all input strings are from the set `{'A', 'B', 'C', 'D', 'E', 'F'}`.
- All the values of `allowed` are **unique**.







**Solution:**

We are given a bottom row and a list of allowed patterns for triangular blocks. Each pattern is a string of three letters: the first two are the left and right bottom blocks, and the third is the top block. We need to build a pyramid where each row has one less block than the row below, and every triangular pattern (three blocks forming a triangle) must be in the allowed list.

### Approach:

1. **Preprocess Allowed Patterns:**
   - Build a hash map (`allowedMap`) where the key is a two-character base string (representing the left and right bottom blocks) and the value is an array of possible top blocks that can be placed above that base.

2. **Depth-First Search (DFS) with Memoization:**
   - Use a recursive function `dfs($row)` to check if we can build the pyramid starting from the current row.
   - **Base case:** If the row length is 1, we've reached the top of the pyramid → return `true`.
   - **Memoization:** Use a memo hash map (`memo`) to store results for previously computed rows to avoid redundant calculations.
   - **Generate all possible next rows:** For the current row, generate all valid rows that could be placed above it based on the allowed patterns.
   - **Recursively check each next row:** For each possible next row, recursively call `dfs()`. If any path leads to the top (returns `true`), return `true` for the current row.

3. **Generate Next Rows:**
   - For a given row of length `n`, there are `n-1` adjacent pairs.
   - For each pair, retrieve the list of allowed top blocks from `allowedMap`. If any pair has no allowed tops, no valid next row exists.
   - Use backtracking to generate all combinations of top blocks for each pair, forming strings of length `n-1`.

4. **Optimizations:**
   - **Memoization** prevents re-computation for the same row string.
   - **Early termination** if a pair has no allowed tops, or if a valid path to the top is found.

Let's implement this solution in PHP: **[0756. Remove Max Number of Edges to Keep Graph Fully Traversable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000756-pyramid-transition-matrix/solution.php)**

```php
<?php
class Solution {
    private array $allowedMap;
    private array $memo;

    /**
     * @param String $bottom
     * @param String[] $allowed
     * @return Boolean
     */
    function pyramidTransition($bottom, $allowed) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $row
     * @return bool|mixed
     */
    private function dfs($row) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $current
     * @param $index
     * @param $path
     * @param $result
     * @return void
     */
    private function generateNextRows($current, $index, $path, &$result) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases
$pyramidTransitionMatrix = new Solution();
var_dump($pyramidTransitionMatrix->pyramidTransition("BCD", ["BCC","CDE","CEA","FFF"])) . "\n";             // true
var_dump($pyramidTransitionMatrix->pyramidTransition("AAAA", ["AAB","AAC","BCD","BBE","DEF"])) . "\n";      // false 
?>
```

### Explanation:

1. **Preprocessing**: First, we convert the `allowed` array into a more efficient lookup structure. For each pattern like `"ABC"`, we map the base `"AB"` to the possible top `'C'`. This allows O(1) lookup of all possible top blocks for any pair of bottom blocks.

2. **Depth-First Search (DFS)**: The main logic uses DFS to explore possible pyramid constructions:
   - Base case: When the current row has only 1 block, we've successfully built the pyramid.
   - For each adjacent pair in the current row, we get all possible top blocks from `allowedMap`.
   - We generate all possible next rows by combining these possibilities.
   - Recursively check if we can build the pyramid from each possible next row.

3. **Memoization**: We use memoization to avoid redundant computations. If we've already determined whether a particular row configuration can lead to a successful pyramid, we store and reuse that result.

4. **Backtracking**: The `generateNextRows` function generates all possible next rows by exploring all combinations of top blocks for each adjacent pair.

### Complexity Analysis:
- **Time Complexity**: In the worst case, we might explore all combinations. For a bottom of length `n`, we generate `k⁽ⁿ⁻¹⁾` next rows where `k` is the average number of allowed tops per pair. With constraints (bottom length ≤ 6, letters from A-F), this is manageable.
- **Space Complexity**: O(n) for the recursion stack plus O(2ⁿ) for memoization in the worst case.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**