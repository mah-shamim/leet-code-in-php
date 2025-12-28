1351\. Count Negative Numbers in a Sorted Matrix

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Matrix`, `Weekly Contest 176`

Given a `m x n` matrix `grid` which is sorted in non-increasing order both row-wise and column-wise, return _the number of **negative** numbers in `grid`_.

**Example 1:**

- **Input:** grid = [[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]]
- **Output:** 8
- **Explanation:** There are 8 negatives number in the matrix.

**Example 2:**

- **Input:** grid = [[3,2],[1,0]]
- **Output:** 0

**Constraints:**

- `m == grid.length`     
- `n == grid[i].length`
- `1 <= m, n <= 100` 
- `-100 <= grid[i][j] <= 100`


**Follow up:** Could you find an `O(n + m)` solution?



**Hint:**
1. Use binary search for optimization or simply brute force.



**Similar Questions:**
1. [2529. Maximum Count of Positive Integer and Negative Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002529-maximum-count-of-positive-integer-and-negative-integer)






**Solution:**

We can leverage the sorted properties of the matrix. Since the matrix is sorted in non-increasing order both row-wise and column-wise, negative numbers are clustered in the bottom-right corner.

## Approach:

We start from the **top-right corner** and traverse towards the **bottom-left**:
- If the current element is negative, then all elements below it in the same column are also negative (due to column-wise sorting).
- Move left to check previous columns.
- If the current element is non-negative, move down to check the next row.

Let's implement this solution in PHP: **[1351. Count Negative Numbers in a Sorted Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001351-count-negative-numbers-in-a-sorted-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function countNegatives($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countNegatives([[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]]) . "\n";      // Output: 8
echo countNegatives([[3,2],[1,0]]) . "\n";                                          // Output: 0
?>
```

### Explanation:

1. **Start at top-right corner** (0, n-1)
2. **If current element is negative**:
   - All elements below it are also negative (due to column-wise sorting)
   - Add `(m - row)` to count (all remaining rows in this column)
   - Move left to check previous column
3. **If current element is non-negative**:
   - Move down to check if elements in next row are negative
4. **Repeat** until we go out of bounds

## Complexity Analysis:
- **Time Complexity**: O(m + n) - Each step moves either down or left
- **Space Complexity**: O(1) - Only using a few variables

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**