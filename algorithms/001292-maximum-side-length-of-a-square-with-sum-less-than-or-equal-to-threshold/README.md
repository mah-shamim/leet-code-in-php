1292\. Maximum Side Length of a Square with Sum Less than or Equal to Threshold

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Matrix`, `Prefix Sum`, `Weekly Contest 167`

Given a `m x n` matrix `mat` and an integer `threshold`, return _the maximum side-length of a square with a sum less than or equal to `threshold` or return `0` if there is no such square_.

**Example 1:**

![e1](https://assets.leetcode.com/uploads/2019/12/05/e1.png)

- **Input:** mat = [[1,1,3,2,4,3,2],[1,1,3,2,4,3,2],[1,1,3,2,4,3,2]], threshold = 4
- **Output:** 2
- **Explanation:** The maximum side length of square with sum less than 4 is 2 as shown.

**Example 2:**

- **Input:** mat = [[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2]], threshold = 1
- **Output:** 0

**Constraints:**

- `m == mat.length`
- `n == mat[i].length`
- `1 <= m, n <= 300`
- `0 <= mat[i][j] <= 10⁴`
- `0 <= threshold <= 10⁵`



**Hint:**
1. Store prefix sum of all grids in another 2D array.
2. Try all possible solutions and if you cannot find one return `-1`.
3. If `x` is a valid answer then any `y < x` is also valid answer. Use binary search to find answer.






**Solution:**

We need to find the maximum side length of a square sub-matrix whose sum does not exceed a given threshold. The solution leverages **2D prefix sums** to efficiently compute the sum of any sub-matrix in constant time, and **binary search** to find the largest valid side length. This approach ensures efficiency within the constraints.

### Approach:

1. **Prefix Sum Calculation**: Build a 2D prefix sum array where `prefix[i+1][j+1]` represents the sum of the sub-matrix from `(0,0)` to `(i,j)`. This allows computing the sum of any sub-matrix in O(1) time.
2. **Binary Search**: Since the side length of valid squares is monotonic (if a side length `L` is valid, any smaller length is also valid), binary search is used to find the maximum `L` between 0 and `min(m, n)`.
3. **Validation**: For a candidate side length `L`, iterate over all possible top-left corners `(i, j)` of the square in the matrix. Use the prefix sum array to compute the sum of the `L×L` square. If any square has a sum ≤ threshold, `L` is valid.

Let's implement this solution in PHP: **[1292. Maximum Side Length of a Square with Sum Less than or Equal to Threshold](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001292-maximum-side-length-of-a-square-with-sum-less-than-or-equal-to-threshold/solution.php)**

```php
<?php
class Solution {

    private array $prefix = [];
    private int $m, $n;
    private int $threshold;

    /**
     * @param Integer[][] $mat
     * @param Integer $threshold
     * @return Integer
     */
    function maxSideLength(array $mat, int $threshold): int
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param int $side
     * @return bool
     */
    private function isValid(int $side): bool {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Test cases
$maxSideLength = new Solution();
print_r($maxSideLength->maxSideLength([[1,1,3,2,[[1,1,3,2,4,3,2],[1,1,3,2,4,3,2],[1,1,3,2,4,3,2]], 4));         // Output: 2
print_r($maxSideLength->maxSideLength([[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2],[2,2,2,2,2]], 1));       // Output: 0
print_r($maxSideLength->maxSideLength([[1,1,1,1],[1,0,0,1],[1,0,0,1],[1,1,1,1]], 6));                           // Output: 3
print_r($maxSideLength->maxSideLength([[18,70],[61,1]], 401));                                                  // Output: 1
?>
```

### Explanation:

1. **Prefix Sum Construction**:
   - The prefix sum array is built with an extra row and column of zeros to simplify boundary conditions.
   - Each element `prefix[i+1][j+1]` is computed using the formula:  
     `prefix[i+1][j+1] = mat[i][j] + prefix[i][j+1] + prefix[i+1][j] - prefix[i][j]`.

2. **Binary Search Execution**:
   - The search space for the side length is from 0 to the smaller dimension of the matrix.
   - The middle value `mid` is tested using the `isValid` method. If valid, the search continues in the upper half; otherwise, it continues in the lower half.

3. **Validation for a Given Side Length**:
   - The `isValid` method iterates over all possible top-left corners of a square with side length `side`.
   - For each corner `(i, j)`, the sum of the square is computed using the prefix sum formula:  
     `sum = prefix[i+side][j+side] - prefix[i][j+side] - prefix[i+side][j] + prefix[i][j]`.
   - If any square's sum is within the threshold, `side` is valid.

### Complexity
- **Time Complexity**:
   - Building the prefix sum array: **O(m × n)**.
   - Binary search runs **O(log(min(m, n)))** times, each validation checks up to **(m × n)** squares.
   - Overall: **O(m × n × log(min(m, n)))**.

- **Space Complexity**:
   - The prefix sum array uses **O(m × n)** extra space.



**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**