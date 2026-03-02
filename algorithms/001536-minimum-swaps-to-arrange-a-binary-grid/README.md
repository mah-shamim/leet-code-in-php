1536\. Minimum Swaps to Arrange a Binary Grid

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Greedy`, `Matrix`, `Weekly Contest 200`

Given an `n x n` binary `grid`, in one step you can choose two **adjacent rows** of the grid and swap them.

A grid is said to be **valid** if all the cells above the main diagonal are **zeros**.

Return _the minimum number of steps_ needed to make the grid valid, or **-1** if the grid cannot be valid.

The main diagonal of a grid is the diagonal that starts at cell `(1, 1)` and ends at cell `(n, n)`.

**Example 1:**

![fw](https://assets.leetcode.com/uploads/2020/07/28/fw.jpg)

- **Input:** grid = [[0,0,1],[1,1,0],[1,0,0]]
- **Output:** 3

**Example 2:**

![e2](https://assets.leetcode.com/uploads/2020/07/16/e2.jpg)

- **Input:** grid = [[0,1,1,0],[0,1,1,0],[0,1,1,0],[0,1,1,0]]
- **Output:** -1
- **Explanation:** All rows are similar, swaps have no effect on the grid.

**Example 3:**

![e3](https://assets.leetcode.com/uploads/2020/07/16/e3.jpg)

- **Input:** grid = [[1,0,0],[1,1,0],[1,1,1]]
- **Output:** 0

**Constraints:**

- `n == grid.length == grid[i].length`
- `1 <= n <= 200`
- `grid[i][j]` is either `0` or `1`


**Hint:**
1. For each row of the grid calculate the most right `1` in the grid in the array `maxRight`.
2. To check if there exist answer, sort maxRight and check if `maxRight[i] ≤ i` for all possible `i`'s.
3. If there exist an answer, simulate the swaps.






**Solution:**


- **Problem:** Given an n×n binary grid, we can swap adjacent rows. Goal is to arrange rows so all cells above the main diagonal are zero. Return minimum swaps, or `-1` if impossible.
- **Solution:** Compute for each row the column index of its rightmost `1` (or `-1` if none). Check feasibility by sorting these indices; if the `iᵗʰ` smallest is `> i`, impossible. Then simulate moving rows upward using a greedy algorithm, counting adjacent swaps needed to satisfy the condition row by row.

### Approach:

- For each row, find the rightmost `1`’s column (the highest column index containing a `1`). Store these in an array `rightmost`.
- Check if a valid arrangement exists:
   - Sort `rightmost`.
   - For i = 0 to n‑1, if `sorted[i] > i`, return -1 (because even after reordering, the `iᵗʰ` row would have a 1 above the diagonal).
- Simulate the swaps to achieve the required ordering:
   - Make a mutable copy `current` of the rightmost array (representing the current order of rows).
   - For each target position i from 0 to n‑1:
      - Find the first index `j ≥ i` where `current[j] ≤ i`.
      - Add the distance `j – i` to the swap count.
      - Move that row from index `j` to `i` by swapping adjacent rows (shift elements).
- Return total swaps.

Let's implement this solution in PHP: **[1536. Minimum Swaps to Arrange a Binary Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001536-minimum-swaps-to-arrange-a-binary-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minSwaps(array $grid): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minSwaps([[0,0,1],[1,1,0],[1,0,0]]) . "\n";                            // Output: 3
echo minSwaps([[0,1,1,0],[0,1,1,0],[0,1,1,0],[0,1,1,0]]) . "\n";            // Output: -1
echo minSwaps([[1,0,0],[1,1,0],[1,1,1]]) . "\n";                            // Output: 0
?>
```

### Explanation:

- The condition “all cells above the main diagonal are zeros” means for any row _**i**_ (0‑indexed) there must be no _**1**_ in a column > _**i**_. Hence the rightmost _**1**_ of that row must be at **_column ≤ i_**.
- Sorting the rightmost indices gives a necessary and sufficient feasibility condition: if we assign rows to target rows in non‑decreasing order of their rightmost **_1_**’s, the sorted list tells us the minimum possible rightmost for each target position. If any `sorted[i] > i`, no arrangement can satisfy the condition because a row would need to be placed at position i while having a 1 beyond column i.
- The greedy simulation works because we process rows from top to bottom. At each step i, we look for the nearest row that can legally be placed at i (its rightmost **_1 ≤ i_**). Bringing it up via adjacent swaps costs exactly the number of swaps equal to its distance. This yields the minimum total swaps, as any valid arrangement must place such a row at or above position i, and moving it earlier never hurts later steps.
- The shift operation mimics the actual adjacent swaps; the algorithm runs in **_O(n²)**_ because for each i we may scan and shift _**O(n)**_ elements, which is acceptable for **_n ≤ 200_**.

### Complexity
- **Time Complexity**: **_O(n²)_** – scanning for rightmost **_1_** is **_O(n²)_**; sorting is **_O(n log n)_**; the simulation loop (**_n_** iterations) each may shift up to **_O(n)_** elements, leading to **_O(n²)_** overall.
- **Space Complexity**: **_O(n)_** – storing the rightmost array and its working copy.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**