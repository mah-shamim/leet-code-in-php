840\. Magic Squares In Grid

Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Matrix`

A `3 x 3` **magic square** is a` 3 x 3` grid filled with distinct numbers **from** `1` **to** `9` such that each row, column, and both diagonals all have the same sum.

Given a `row x col` `grid` of integers, how many `3 x 3` contiguous magic square subgrids are there?

**Note:** while a magic square can only contain numbers from `1` to `9`, `grid` may contain numbers up to `15`.

**Example 1:**

![magic_main](https://assets.leetcode.com/uploads/2020/09/11/magic_main.jpg)

- **Input:** grid = [[4,3,8,4],[9,5,1,9],[2,7,6,2]]
- **Output:** 1
- **Explanation:**\
  The following subgrid is a 3 x 3 magic square:\
  ![magic_valid](https://assets.leetcode.com/uploads/2020/09/11/magic_valid.jpg)\
  while this one is not:\
  ![magic_invalid](https://assets.leetcode.com/uploads/2020/09/11/magic_invalid.jpg)\
  In total, there is only one magic square inside the given grid.

**Example 2:**

- **Input:** grid = [[8]]
- **Output:** 0

**Constraints:**

- `row == grid.length`.
- `col == grid[i].length`
- `1 <= row, col <= 10`
- `0 <= grid[i][j] <= 15`



**Solution:**

We need to count how many `3x3` contiguous subgrids in the given grid form a magic square. A magic square is a `3x3` grid where all rows, columns, and both diagonals sum to the same value, and it contains the distinct numbers from `1` to `9`.

To solve this problem, we can follow these steps:

1. **Check if a Subgrid is Magic:**
    - The subgrid must contain all distinct numbers from `1` to `9`.
    - The sum of each row, column, and diagonal should be `15`.

2. **Iterate through the Grid:**
    - Since we need to check `3x3` subgrids, we will iterate from `0` to `row-2` for rows and from `0` to `col-2` for columns.
    - For each top-left corner of the `3x3` subgrid, extract the subgrid and check if it's a magic square.

Let's implement this solution in PHP: **[840. Magic Squares In Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000840-magic-squares-in-grid/solution.php)**

```php
<?php
// Example usage:
$grid1 = [
    [4, 3, 8, 4],
    [9, 5, 1, 9],
    [2, 7, 6, 2]
];

echo numMagicSquaresInside($grid1); // Output: 1

$grid2 = [
    [18]
];

echo numMagicSquaresInside($grid2); // Output: 0
?>
```

### Explanation:

1. **isMagic function:**
    - Extracts the `3x3` subgrid.
    - Checks if all numbers are distinct and between `1` to `9`.
    - Verifies that the sums of the rows, columns, and diagonals are all `15`.

2. **numMagicSquaresInside function:**
    - Iterates over all possible `3x3` subgrids in the given grid.
    - Counts how many of those subgrids are magic squares.

This code works efficiently within the constraints, counting all `3x3` magic square subgrids in the given grid.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
