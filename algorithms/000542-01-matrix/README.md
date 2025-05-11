542\. 01 Matrix

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Breadth-First Search`, `Matrix`

Given an `m x n` binary matrix `mat`, return _the distance of the nearest `0` for each cell_.

The distance between two cells sharing a common edge is `1`.

**Example 1:**

![01-1-grid](https://assets.leetcode.com/uploads/2021/04/24/01-1-grid.jpg)

- **Input:** mat = [[0,0,0],[0,1,0],[0,0,0]]
- **Output:** [[0,0,0],[0,1,0],[0,0,0]]

**Example 2:**

![01-2-grid](https://assets.leetcode.com/uploads/2021/04/24/01-2-grid.jpg)

- **Input:** mat = [[0,0,0],[0,1,0],[1,1,1]]
- **Output:** [[0,0,0],[0,1,0],[1,2,1]]



**Constraints:**

- `m == mat.length`
- `n == mat[i].length`
- <code>1 <= m, n <= 10<sup>4</sup></code>
- <code>1 <= m * n <= 10<sup>4</sup></code>
- `mat[i][j]` is either `0` or `1`.
- There is at least one `0` in `mat`.

**Note:** This question is the same as [1765. Map of Highest Peak](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001765-map-of-highest-peak)


**Solution:**

We will use **multi-source Breadth-First Search (BFS)**, where all the `0` cells are treated as starting points (sources). For every `1` cell, we calculate the minimum distance to the nearest `0`.

Let's implement this solution in PHP: **[542\. 01 Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000542-01-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @return Integer[][]
 */
function updateMatrix($mat) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$mat1 = [[0,0,0],[0,1,0],[0,0,0]];
$mat2 = [[0,0,0],[0,1,0],[1,1,1]];

echo updateMatrix($mat1) . "\n"; // Output: [[0,0,0],[0,1,0],[0,0,0]]
echo updateMatrix($mat2) . "\n"; // Output: [[0,0,0],[0,1,0],[1,2,1]]
?>
```

### Explanation:

1. **Initialization:**
   - `distance` array is initialized with `PHP_INT_MAX` for all cells initially.
   - All `0` cells are set to `0` in the `distance` array and added to the BFS queue.

2. **Multi-Source BFS:**
   - Using a queue, we perform BFS from all `0` cells simultaneously.
   - For each cell in the queue, check its neighbors (up, down, left, right).
   - If the neighbor's distance can be reduced (`distance[newRow][newCol] > currentDistance + 1`), update its distance and enqueue it.

3. **Output:**
   - The `distance` array is updated with the minimum distances to the nearest `0` for all cells.

### Input and Output:

**Input 1:**
```php
$mat1 = [
    [0, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
];
```

**Output 1:**
```
Array
(
    [0] => Array
        (
            [0] => 0
            [1] => 0
            [2] => 0
        )

    [1] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 0
        )

    [2] => Array
        (
            [0] => 0
            [1] => 0
            [2] => 0
        )
)
```

**Input 2:**
```php
$mat2 = [
    [0, 0, 0],
    [0, 1, 0],
    [1, 1, 1]
];
```

**Output 2:**
```
Array
(
    [0] => Array
        (
            [0] => 0
            [1] => 0
            [2] => 0
        )

    [1] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 0
        )

    [2] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 1
        )
)
```

This solution is efficient with a time complexity of _**O(m × n)**_, as each cell is processed once. The space complexity is also _**O(m × n)**_ due to the `distance` array and the BFS queue.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**