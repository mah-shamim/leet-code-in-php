1914\. Cyclically Rotating a Grid

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Matrix`, `Simulation`, `Weekly Contest 247`

You are given an `m x n` integer matrix `grid`, where `m` and `n` are both **even** integers, and an integer `k`.

The matrix is composed of several layers, which is shown in the below image, where each color is its own layer:

![ringofgrid](https://assets.leetcode.com/uploads/2021/06/10/ringofgrid.png)

A cyclic rotation of the matrix is done by cyclically rotating **each layer** in the matrix. To cyclically rotate a layer once, each element in the layer will take the place of the adjacent element in the **counter-clockwise** direction. An example rotation is shown below:

![explanation_grid](https://assets.leetcode.com/uploads/2021/06/22/explanation_grid.jpg)

Return _the matrix after applying `k` cyclic rotations to it_.


**Example 1:**

![rod2](https://assets.leetcode.com/uploads/2021/06/19/rod2.png)

- **Input:** grid = [[40,10],[30,20]], k = 1
- **Output:** [[10,20],[40,30]]
- **Explanation:** The figures above represent the grid at every state.

**Example 2:**

![ringofgrid5](https://assets.leetcode.com/uploads/2021/06/10/ringofgrid5.png)

![ringofgrid6](https://assets.leetcode.com/uploads/2021/06/10/ringofgrid6.png)

![ringofgrid7](https://assets.leetcode.com/uploads/2021/06/10/ringofgrid7.png)

- **Input:** grid = [[1,2,3,4],[5,6,7,8],[9,10,11,12],[13,14,15,16]], k = 2
- **Output:** [[3,4,8,12],[2,11,10,16],[1,7,6,15],[5,9,13,14]]
- **Explanation:** The figures above represent the grid at every state.

**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `2 <= m, n <= 50`
- Both `m` and `n` are **even** integers.
- `1 <= grid[i][j] <= 5000`
- `1 <= k <= 10⁹`



**Hint:**
1. First, you need to consider each layer separately as an array.
2. Just cycle this array and then re-assign it.






**Solution:**

The solution extracts each **layer** of the matrix into a 1D array, performs a **counter-clockwise rotation** by `k` positions (modulo the layer’s length), and then places the rotated values back into the layer in the correct order. This process is repeated for all layers.

### Approach:

- Since both `m` and `n` are even, the number of layers is `min(m, n) / 2`.
- For each layer, extract its elements in **counter-clockwise order**: top row → right column → bottom row → left column.
- Compute effective rotations: `rot = k % len(elements)`.
- Rotate the array using `array_slice` to move the first `rot` elements to the end (counter-clockwise = shift left).
- Place the rotated elements back into the grid in the same traversal order.

Let's implement this solution in PHP: **[1914. Cyclically Rotating a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001914-cyclically-rotating-a-grid/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @param Integer $k
 * @return Integer[][]
 */
function rotateGrid(array $grid, int $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo rotateGrid([[40,10],[30,20]], 1) . "\n";                                           // Output: [[10,20],[40,30]]
echo rotateGrid([[1,2,3,4],[5,6,7,8],[9,10,11,12],[13,14,15,16]], 2) . "\n";            // Output: [[3,4,8,12],[2,11,10,16],[1,7,6,15],[5,9,13,14]]
?>
```

### Explanation:

- **Layer extraction order** matches the rotation direction (counter-clockwise), so rotating the 1D array corresponds to the required layer rotation.
- **Modulo operation** reduces large `k` (up to _**10⁹**_) to at most the layer’s perimeter length, making the solution efficient.
- **Traversal for reinsertion** mirrors the extraction order to correctly place rotated elements into the grid.
- The algorithm works for any **even dimensions**, with a straightforward way to handle each rectangular concentric layer.

### Complexity
- **Time Complexity**: _**O(m × n)**_  
  - Each element is visited a constant number of times (once to extract, once to reinsert).  
  - Layers are processed independently, and total elements = _**m × n**_.
- **Space Complexity**: _**O(m + n)**_, In each layer, we store its perimeter elements in a temporary array. The largest perimeter is at the outermost layer: _**2 × (m + n) - 4**_, which is _**O(m + n)**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**