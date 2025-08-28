3446\. Sort Matrix by Diagonals

**Difficulty:** Medium

**Topics:** `Array`, `Sorting`, `Matrix`, `Weekly Contest 436`

You are given an `n x n` square matrix of integers `grid`. Return the matrix such that:

- The diagonals in the `bottom-left triangle` (including the middle diagonal) are sorted in `non-increasing order`.
- The diagonals in the `top-right triangle` are sorted in `non-decreasing order`.


**Example 1:**

- **Input:** grid = [[1,7,3],[9,8,2],[4,5,6]]
- **Output:** [[8,2,3],[9,6,7],[4,5,1]]
- **Explanation:**
    ![4052example1drawio](https://assets.leetcode.com/uploads/2024/12/29/4052example1drawio.png)
    - The diagonals with a black arrow (bottom-left triangle) should be sorted in non-increasing order:
        - `[1, 8, 6]` becomes `[8, 6, 1]`.
        - `[9, 5]` and `[4]` remain unchanged.
    - The diagonals with a blue arrow (top-right triangle) should be sorted in non-decreasing order:
        - `[7, 2]` becomes `[2, 7]`.
        - `[3]` remains unchanged.


**Example 2:**

- **Input:** grid = [[0,1],[1,2]]
- **Output:** [[2,1],[1,0]]
- **Explanation:**

    ![4052example2adrawio](https://assets.leetcode.com/uploads/2024/12/29/4052example2adrawio.png)
    - The diagonals with a black arrow must be non-increasing, so `[0, 2]` is changed to `[2, 0]`. The other diagonals are already in the correct order.

**Example 3:**

- **Input:** grid = [[1]]
- **Output:** [[1]]
- **Explanation:** Diagonals with exactly one element are already in order, so no changes are needed.

**Constraints:**

- `grid.length == grid[i].length == n`
- `1 <= n <= 10`
- <code>-10<sup>5</sup> <= grid[i][j] <= 10<sup>5</sup></code>



**Hint:**
1. Use a data structure to store all values in each diagonal.
2. Sort and replace them in the matrix.



**Similar Questions:**
1. [1329. Sort the Matrix Diagonally](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001329-sort-the-matrix-diagonally)






**Solution:**

We need to sort the diagonals of a square matrix in two different ways based on their position relative to the main diagonal. The diagonals in the bottom-left triangle (including the main diagonal) should be sorted in non-increasing order, while the diagonals in the top-right triangle should be sorted in non-decreasing order.

### Approach
1. **Group Elements by Diagonal**: Each diagonal in the matrix can be identified by the difference `d = i - j`, where `i` is the row index and `j` is the column index. Diagonals with `d >= 0` belong to the bottom-left triangle, and those with `d < 0` belong to the top-right triangle.
2. **Sort Each Group**: For each diagonal group:
    - If `d >= 0`, sort the elements in non-increasing order (descending).
    - If `d < 0`, sort the elements in non-decreasing order (ascending).
3. **Reconstruct the Matrix**: After sorting each diagonal group, place the sorted elements back into their original positions in the matrix.

Let's implement this solution in PHP: **[3446. Sort Matrix by Diagonals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003446-sort-matrix-by-diagonals/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer[][]
 */
function sortMatrix($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$grid1 = [[1,7,3],[9,8,2],[4,5,6]];
print_r(sortMatrix($grid1));
// Expected: [[8,2,3],[9,6,7],[4,5,1]]

$grid2 = [[0,1],[1,2]];
print_r(sortMatrix($grid2));
// Expected: [[2,1],[1,0]]

$grid3 = [[1]];
print_r(sortMatrix($grid3));
// Expected: [[1]]
?>
```

### Explanation:

1. **Grouping Elements**: The code first iterates through each element in the matrix, calculating the diagonal difference `d = i - j`. Elements are grouped into arrays based on their `d` value.
2. **Sorting Groups**: Each group is sorted based on the value of `d`. Groups with `d >= 0` are sorted in descending order, while groups with `d < 0` are sorted in ascending order.
3. **Reconstructing Matrix**: The sorted groups are then used to reconstruct the matrix. For each position `(i, j)`, the next element from the corresponding sorted group is placed back into the matrix. This ensures that each diagonal is sorted as required.

This approach efficiently groups, sorts, and reassembles the matrix diagonals, meeting the problem's requirements with clarity and simplicity. The complexity is manageable given the constraints, making it a practical solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**