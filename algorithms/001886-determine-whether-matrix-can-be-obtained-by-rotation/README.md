1886\. Determine Whether Matrix Can Be Obtained By Rotation

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Matrix`, `Weekly Contest 244`

Given two `n x n` binary matrices `mat` and `target`, return `true` if it is possible to make `mat` equal to `target` by **rotating** `mat` in **90-degree increments**, or `false` otherwise.

**Example 1:**

![grid3](https://assets.leetcode.com/uploads/2021/05/20/grid3.png)

- **Input:** mat = [[0,1],[1,0]], target = [[1,0],[0,1]]
- **Output:** true
- **Explanation:** We can rotate mat 90 degrees clockwise to make mat equal target.

**Example 2:**

![grid4](https://assets.leetcode.com/uploads/2021/05/20/grid4.png)

- **Input:** mat = [[0,1],[1,1]], target = [[1,0],[0,1]]
- **Output:** false
- **Explanation:** It is impossible to make mat equal to target by rotating mat.

**Example 3:**

![grid4](https://assets.leetcode.com/uploads/2021/05/26/grid4.png)

- **Input:** mat = [[0,0,0],[0,1,0],[1,1,1]], target = [[1,1,1],[0,1,0],[0,0,0]]
- **Output:** true
- **Explanation:** We can rotate mat 90 degrees clockwise two times to make mat equal target.

**Example 4:**

- **Input:** mat = [[0]], target = [[0]]
- **Output:** true

**Example 5:**

- **Input:** mat = [[1]], target = [[0]]
- **Output:** false

**Constraints:**

- `n == mat.length == target.length`
- `n == mat[i].length == target[i].length`
- `1 <= n <= 10`
- `mat[i][j]` and `target[i][j]` are either `0` or `1`.



**Hint:**
1. What is the maximum number of rotations you have to check?
2. Is there a formula you can use to rotate a matrix 90 degrees?



**Similar Questions:**
1. [48. Rotate Image](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000048-rotate-image)






**Solution:**

We need to determine if one binary matrix can be rotated in 90-degree increments to match another. Since only four possible rotations exist (0°, 90°, 180°, 270°), we can generate each rotation and compare it to the target. A helper function rotates a matrix 90 degrees clockwise by mapping elements from `(i, j)` to `(j, n-1-i)`.

### Approach:

- **Check original orientation** – If `mat` already equals `target`, return `true`.
- **Generate rotations** – For each of the three remaining orientations (90°, 180°, 270°), compute the next clockwise rotation and compare with `target`.
- **Early exit** – As soon as a match is found, return `true`; otherwise, after all rotations are checked, return `false`.
- **Rotation implementation** – Create a new matrix of the same size and fill it using the formula for a 90° clockwise turn:  `rotated[j][n-1-i] = original[i][j]`.

Let's implement this solution in PHP: **[1886. Determine Whether Matrix Can Be Obtained By Rotation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001886-determine-whether-matrix-can-be-obtained-by-rotation/solution.php)**

```php
<?php
/**
 * @param Integer[][] $mat
 * @param Integer[][] $target
 * @return Boolean
 */
function findRotation(array $mat, array $target): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Rotates an n x n matrix 90 degrees clockwise.
 *
 * @param Integer[][] $matrix
 * @return Integer[][]
 */
function rotate90(array $matrix): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findRotation([[0,1],[1,0]], [[1,0],[0,1]]) . "\n";                                 // Output: true
echo findRotation([[0,1],[1,1]], [[1,0],[0,1]]) . "\n";                                 // Output: false
echo findRotation([[0,0,0],[0,1,0],[1,1,1]], [[1,1,1],[0,1,0],[0,0,0]]) . "\n";         // Output: true
echo findRotation([[0]], [[0]]) . "\n";                                                 // Output: true
echo findRotation([[1]], [[0]]) . "\n";                                                 // Output: false
?>
```

### Explanation:

- Because a 90° rotation can be applied at most four times before returning to the original orientation, only four matrices need to be examined.
- The `rotate90` function builds a new matrix by mapping each element `(i, j)` in the original matrix to position `(j, n-1-i)` in the rotated matrix.
- After each rotation, the rotated matrix is compared element‑wise to the target.
- The process uses simple array comparisons; no extra data structures or complex transformations are required.

### Complexity
- **Time Complexity**: _**O(n²)**_ – Each rotation traverses all n² elements, and we perform up to 3 rotations (plus one initial comparison).
- **Space Complexity**: _**O(n²)**_ – A new matrix of the same size is allocated for each rotation, so the peak space usage is _**O(n²)**_ (but only one rotation matrix exists at a time).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**