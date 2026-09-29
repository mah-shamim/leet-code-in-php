2267\. Check if There Is a Valid Parentheses String Path

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Bracket Sequences`, `Weekly Contest 292`

A parentheses string is a **non-empty** string consisting only of `'('` and `')'`. It is **valid** if **any** of the following conditions is **true**:

- It is `()`.
- It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are valid parentheses strings.
- It can be written as `(A)`, where `A` is a valid parentheses string.

You are given an `m x n` matrix of parentheses `grid`. A **valid parentheses string path** in the grid is a path satisfying **all** of the following conditions:

- The path starts from the upper left cell `(0, 0)`.
- The path ends at the bottom-right cell `(m - 1, n - 1)`.
- The path only ever moves **down** or **right**.
- The resulting parentheses string formed by the path is **valid**.

Return `true` _if there exists a **valid parentheses string path** in the grid_. Otherwise, return `false`.

**Example 1:**

![example1drawio](https://assets.leetcode.com/uploads/2022/03/15/example1drawio.png)

- **Input:** grid = [["(","(","("],[")","(",")"],["(","(",")"],["(","(",")"]]
- **Output:** true
- **Explanation:** 
  - The above diagram shows two possible paths that form valid parentheses strings.
  - The first path shown results in the valid parentheses string "()(())".
  - The second path shown results in the valid parentheses string "((()))".
  - Note that there may be other valid parentheses string paths.

**Example 2:**

![example2drawio](https://assets.leetcode.com/uploads/2022/03/15/example2drawio.png)

- **Input:** grid = [[")",")"],["(","("]]
- **Output:** false
- **Explanation:** The two possible paths form the parentheses strings "))(" and ")((". Since neither of them are valid parentheses strings, we return false.

**Example 3:**

- **Input:** grid = [["(",")"]]
- **Output:** true

**Example 4:**

- **Input:** grid = [["("],[")"]]
- **Output:** true

**Example 5:**

- **Input:** grid = [["("]]
- **Output:** false

**Example 6:**

- **Input:** grid = [[")"]]
- **Output:** false

**Example 7:**

- **Input:** grid = [["(","("],[")",")"]]
- **Output:** false

**Example 8:**

- **Input:** grid = [["(","("],[")",")"],["(","(",")"]]
- **Output:** false

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m, n <= 100`
- `grid[i][j]` is either `'('` or `')'`.


**Hint:**

1. What observations can you make about the number of open brackets and close brackets for any prefix of a valid bracket sequence?
2. The number of open brackets must always be greater than or equal to the number of close brackets.
3. Could you use dynamic programming?


**Similar Questions:**

1. [1391. Check if There is a Valid Path in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001391-check-if-there-is-a-valid-path-in-a-grid)
2. [2116. Check if a Parentheses String Can Be Valid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002116-check-if-a-parentheses-string-can-be-valid)


**Solution:**

we use dynamic programming over the grid, tracking all possible parenthesis balances at each cell. A balance is `open_count - close_count`. The path is valid only if every prefix has balance `>= 0` and the final cell has balance `0`.

## Approach

- Treat `'('` as `+1` and `')'` as `-1`.
- A valid parentheses string must have even length, so `m + n - 1` must be even.
- The first cell cannot be `')'`.
- For each cell, store all reachable balances after including that cell.
- Transition from the top cell and left cell only.
- Prune invalid balances:
    - Balance cannot become negative.
    - Balance cannot exceed the number of remaining steps, because it must return to `0` at the end.
- Return whether the bottom-right cell can have balance `0`.

Let's implement this solution in PHP: **[2267. Check if There Is a Valid Parentheses String Path](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002267-check-if-there-is-a-valid-parentheses-string-path/solution.php)**

```php
<?php
/**
 * @param String[][] $grid
 * @return Boolean
 */
function hasValidPath(array $grid): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo hasValidPath([["(","(","("],[")","(",")"],["(","(",")"],["(","(",")"]]) ? 'true' : 'false';    // Output: true
echo hasValidPath([[")",")"],["(","("]]) ? 'true' : 'false';                                        // Output: false
echo hasValidPath([["(",")"]]) ? 'true' : 'false';                                                  // Output: true
echo hasValidPath([["("],[")"]]) ? 'true' : 'false';                                                // Output: true
echo hasValidPath([["("]]) ? 'true' : 'false';                                                      // Output: false
echo hasValidPath([[")"]]) ? 'true' : 'false';                                                      // Output: false
echo hasValidPath([["(","("],[")",")"]]) ? 'true' : 'false';                                        // Output: false
echo hasValidPath([["(","("],[")",")"],["(","(",")"]]) ? 'true' : 'false';                          // Output: false
?>
```

### Explanation:

- Initialize `(0, 0)` with balance `1` if `grid[0][0] == '('`.
- For every other cell, compute its `delta` from the bracket.
- For each reachable balance from the top or left, add `delta`.
- Store only valid resulting balances in a set-like associative array.
- Use two rolling rows to reduce space from `O(m * n * (m + n))` to `O(n * (m + n))`.
- At the end, check if balance `0` exists at `(m - 1, n - 1)`.

## Complexity Analysis

- **Time Complexity:** `O(m * n * (m + n))` - Each cell may contain up to `O(m + n)` possible balances, and each is processed from top/left transitions.
- **Space Complexity:** `O(n * (m + n))` - Two rows are stored, and each column can hold up to `O(m + n)` balances.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**