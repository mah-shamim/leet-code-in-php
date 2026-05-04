48\. Rotate Image

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Matrix`

You are given an `n x n` 2D `matrix` representing an image, rotate the image by **90** degrees (clockwise).

You have to rotate the image [in-place](https://en.wikipedia.org/wiki/In-place_algorithm), which means you have to modify the input 2D matrix directly. **DO NOT** allocate another 2D matrix and do the rotation.

**Example 1:**

![mat1](https://assets.leetcode.com/uploads/2020/08/28/mat1.jpg)

- **Input:** matrix = [[1,2,3],[4,5,6],[7,8,9]]
- **Output:** [[7,4,1],[8,5,2],[9,6,3]]

**Example 2:**

![mat2](https://assets.leetcode.com/uploads/2020/08/28/mat2.jpg)

- **Input:** matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]
- **Output:** [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]

**Constraints:**

- `n == matrix.length == matrix[i].length`
- `1 <= n <= 20`
- `-1000 <= matrix[i][j] <= 1000`



**Similar Questions:**
1. [1886. Determine Whether Matrix Can Be Obtained By Rotation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001886-determine-whether-matrix-can-be-obtained-by-rotation)






**Solution:**

The solution rotates an `n x n` matrix 90 degrees clockwise **in-place** without using extra memory. It achieves this by a **two-step process**: first transposing the matrix (swap rows and columns), then reversing each row. This approach is a standard and efficient solution for this problem.

### Approach:

- **Transpose the matrix** — Convert all `matrix[i][j]` to `matrix[j][i]` by swapping elements across the diagonal.
- **Reverse each row** — After transposition, reversing the order of elements in each row effectively completes the 90° clockwise rotation.
- **In-place operations** — Both steps modify the original matrix directly, satisfying the problem constraint.

Let's implement this solution in PHP: **[48. Rotate Image](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000048-rotate-image/solution.php)**

```php
<?php
/**
 * @param Integer[][] $matrix
 * @return NULL
 */
function rotate(array &$matrix) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo rotate([[1,2,3],[4,5,6],[7,8,9]]) . "\n";                                  // Output: [[7,4,1],[8,5,2],[9,6,3]]
echo rotate([[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]) . "\n";           // Output: [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]
?>
```

### Explanation:

- **Transpose** brings rows into columns, which is part of the rotation but in the wrong order.
   - In a 3×3 matrix, first row `[1, 2, 3]` becomes first column `[1, 4, 7]` after transpose.
- **Reversing each row** arranges these columns horizontally in the correct order for clockwise rotation.
   - After transpose, first row is `[1, 4, 7]`. After reversal → `[7, 4, 1]`, which matches final first row.
- For a matrix of size `n`, the inner loop for transpose starts at `i + 1` to avoid double-swapping.
- The reversal step uses `array_reverse` for simplicity, but a manual swap loop would also work and be just as efficient.

### Complexity
- **Time Complexity**: _**O(n²)**_ — Each element is accessed once during transpose (n²/2 swaps) and once during row reversal (n × n/2 swaps).
- **Space Complexity**: _**O(1)**_ — Only a constant amount of extra space is used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**