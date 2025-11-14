2536\. Increment Submatrices by One

**Difficulty:** Medium

**Topics:** `Array`, `Matrix`, `Prefix Sum`, `Weekly Contest 328`

You are given a positive integer `n`, indicating that we initially have an `n x n` **0-indexed** integer matrix `mat` filled with zeroes.

You are also given a 2D integer array `query`. For each `query[i] = [row1ᵢ, col1ᵢ, row2ᵢ, col2ᵢ]`, you should do the following operation:

- Add `1` to **every element** in the submatrix with the **top left** corner `(row1ᵢ, col1ᵢ)` and the **bottom right** corner `(row2ᵢ, col2ᵢ)`. That is, add `1` to `mat[x][y]` for all `row1ᵢ <= x <= row2ᵢ` and `col1ᵢ <= y <= col2ᵢ`.

Return _the matrix `mat` after performing every query_.

**Example 1:**

![p2example11](https://assets.leetcode.com/uploads/2022/11/24/p2example11.png)

- **Input:** n = 3, queries = [[1,1,2,2],[0,0,1,1]]
- **Output:** [[1,1,0],[1,2,1],[0,1,1]]
- **Explanation:** The diagram above shows the initial matrix, the matrix after the first query, and the matrix after the second query.
  - In the first query, we add 1 to every element in the submatrix with the top left corner (1, 1) and bottom right corner (2, 2).
  - In the second query, we add 1 to every element in the submatrix with the top left corner (0, 0) and bottom right corner (1, 1).

**Example 2:**

![p2example22](https://assets.leetcode.com/uploads/2022/11/24/p2example22.png)

- **Input:** n = 2, queries = [[0,0,1,1]]
- **Output:** [[1,1],[1,1]]
- **Explanation:** The diagram above shows the initial matrix and the matrix after the first query.
  - In the first query we add 1 to every element in the matrix.

**Constraints:**

- `1 <= n <= 500`
- `1 <= queries.length <= 10⁴`
- `0 <= row1ᵢ <= row2ᵢ < n`
- `0 <= col1ᵢ <= col2ᵢ < n`



**Hint:**
1. Imagine each row as a separate array. Instead of updating the whole submatrix together, we can use prefix sum to update each row separately.
2. For each query, iterate over the rows i in the range `[row1, row2]` and add 1 to prefix sum `S[i][col1]`, and subtract `1` from `S[i][col2 + 1]`.
3. After doing this operation for all the queries, update each row separately with `S[i][j] = S[i][j] + S[i][j - 1]`.



**Similar Questions:**
1. [308. Range Sum Query 2D - Mutable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000308-range-sum-query-2d-mutable)
2. [2237. Count Positions on Street With Required Brightness](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002237-count-positions-on-street-with-required-brightness)






**Solution:**

We need to efficiently update a matrix by incrementing all elements in specified submatrices by one for each query. The challenge is to perform these updates optimally without resorting to a brute-force approach, which would be computationally expensive given the constraints.

### Approach

1. **Problem Analysis**: The problem requires updating submatrices defined by each query. A brute-force approach would involve updating each cell in the submatrix for every query, leading to a time complexity of O(q * n²), where q is the number of queries and n is the matrix size. This is inefficient for large n and q.

2. **Key Insight**: Instead of updating each cell directly, we can use a difference array for each row. This technique allows us to mark the start and end of increments for each row efficiently. For each query, we update the difference array only at the boundaries of the submatrix.

3. **Algorithm Selection**:
   - **Difference Array**: For each row, maintain an array that tracks the net change at each column. For a query `[r1, c1, r2, c2]`, we increment the start of the range `c1` by 1 and decrement the position immediately after the end `c2 + 1` by 1 for each row from `r1` to `r2`.
   - **Prefix Sum Calculation**: After processing all queries, compute the prefix sum for each row to determine the actual values of each cell in the matrix.

4. **Complexity Analysis**:
   - **Time Complexity**: O(q * n + n²), where q is the number of queries. Each query processes up to n rows, and computing the prefix sum for each row takes O(n) per row.
   - **Space Complexity**: O(n²) for storing the matrix and the difference array.

Let's implement this solution in PHP: **[2536. Increment Submatrices by One](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002536-increment-submatrices-by-one/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $queries
 * @return Integer[][]
 */
function rangeAddQueries($n, $queries) {
    $mat = array_fill(0, $n, array_fill(0, $n, 0));
    $diff = array_fill(0, $n, array_fill(0, $n + 1, 0));

    foreach ($queries as $q) {
        list($r1, $c1, $r2, $c2) = $q;
        for ($i = $r1; $i <= $r2; $i++) {
            $diff[$i][$c1] += 1;
            if ($c2 + 1 < $n) {
                $diff[$i][$c2 + 1] -= 1;
            }
        }
    }

    for ($i = 0; $i < $n; $i++) {
        $current = 0;
        for ($j = 0; $j < $n; $j++) {
            $current += $diff[$i][$j];
            $mat[$i][$j] = $current;
        }
    }

    return $mat;
}

// Test cases
// Example 1
$n = 3;
$queries = [[1,1,2,2],[0,0,1,1]];
print_r(rangeAddQueries($n, $queries));

// Example 2
$n = 2;
$queries = [[0,0,1,1]];
print_r(rangeAddQueries($n, $queries));
?>
```

### Explanation:

1. **Initialization**: Initialize the result matrix `mat` with zeros and a difference array `diff` with dimensions `n x (n + 1)` to handle increments and decrements.

2. **Processing Queries**: For each query, update the difference array by incrementing the start column `c1` and decrementing the column after the end `c2 + 1` for each row in the range `r1` to `r2`.

3. **Building Result Matrix**: For each row, compute the prefix sum of the difference array to get the actual values for each cell in the matrix. This step transforms the difference array into the final matrix values.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**