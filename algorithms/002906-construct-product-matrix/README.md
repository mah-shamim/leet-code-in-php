2906\. Construct Product Matrix

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Matrix`, `Prefix Sum`, `Weekly Contest 367`

Given a **0-indexed** 2D integer matrix `grid` of size `n * m`, we define a **0-indexed** 2D matrix `p` of size `n * m` as the **product** matrix of `grid` if the following condition is met:

- Each element `p[i][j]` is calculated as the product of all elements in `grid` except for the element `grid[i][j]`. This product is then taken modulo `12345`.

Return _the product matrix of `grid`_.

**Example 1:**

- **Input:** grid = [[1,2],[3,4]]
- **Output:** [[24,12],[8,6]]
- **Explanation:** 
  - `p[0][0] = grid[0][1] * grid[1][0] * grid[1][1] = 2 * 3 * 4 = 24`
  - `p[0][1] = grid[0][0] * grid[1][0] * grid[1][1] = 1 * 3 * 4 = 12`
  - `p[1][0] = grid[0][0] * grid[0][1] * grid[1][1] = 1 * 2 * 4 = 8`
  - `p[1][1] = grid[0][0] * grid[0][1] * grid[1][0] = 1 * 2 * 3 = 6`
  - So the answer is `[[24,12],[8,6]]`.

**Example 2:**

- **Input:** grid = [[12345],[2],[1]]
- **Output:** [[2],[0],[0]]
- **Explanation:** 
  - `p[0][0] = grid[0][1] * grid[0][2] = 2 * 1 = 2.`
  - `p[0][1] = grid[0][0] * grid[0][2] = 12345 * 1 = 12345. 12345 % 12345 = 0. So p[0][1] = 0.`
  - `p[0][2] = grid[0][0] * grid[0][1] = 12345 * 2 = 24690. 24690 % 12345 = 0. So p[0][2] = 0.`
  - So the answer is `[[2],[0],[0]]`.

**Constraints:**

- `1 <= n == grid.length <= 10⁵`
- `1 <= m == grid[i].length <= 10⁵`
- `2 <= n * m <= 10⁵`
- `1 <= grid[i][j] <= 10⁹`



**Hint:**
1. Try to solve this without using the `'/'` (division operation).
2. Create two 2D arrays for **suffix** and **prefix** product, and use them to find the product for each position.



**Similar Questions:**
1. [238. Product of Array Except Self](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000238-product-of-array-except-self)






**Solution:**

The solution constructs the product matrix without using division. It flattens the original 2D grid into a 1D array, computes prefix products (cumulative product of all elements to the left of each position), and then traverses from right to left maintaining a running suffix product (product of all elements to the right). The result for each position is the product of the prefix product before it and the suffix product after it, taken modulo 12345. Finally, the 1D result is reshaped back into the original matrix dimensions.

### Approach:

- Flatten the input matrix into a 1D array of length `N = n * m` to simplify the calculation of products for each element.
- Compute prefix products in a separate array where `prefix[i]` holds the product of the first `i` elements (i.e., all elements with indices `< i`).
- Initialize a suffix variable to 1 and iterate from the last element back to the first. For each index `i`, the answer is `(prefix[i] * suffix) % 12345`, because `prefix[i]` contains the product of all elements before `i`, and `suffix` holds the product of all elements after `i`.
- Update the suffix by multiplying it with the current element (the one we just skipped).
- After obtaining the 1D result array, reshape it back into a 2D matrix of size `n × m`.

Let's implement this solution in PHP: **[2906. Construct Product Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002906-construct-product-matrix/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer[][]
 */
function constructProductMatrix(array $grid): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo constructProductMatrix([[1,2],[3,4]]) . "\n";              // Output: [[24,12],[8,6]]
echo constructProductMatrix([[12345],[2],[1]]) . "\n";          // Output: [[2],[0],[0]]
?>
```

### Explanation:

- **Flattening** reduces the problem to the classic "Product of Array Except Self" (LeetCode 238) but on a 1D representation of the matrix.
- **Prefix product array** of length `N+1` allows O(1) access to the product of all elements before index `i` (store at `prefix[i]`).
- **Suffix product** is computed on the fly, eliminating the need for a separate suffix array and saving space.
- At each index `i`, the desired product (excluding `grid[i][j]`) is exactly the product of everything to the left times everything to the right.
- The **modulo 12345** is applied after each multiplication to keep numbers within a manageable range and avoid overflow.
- Reshaping preserves the original order because the flattening used row‑major traversal, and the answers are placed back in the same order.

### Complexity
- **Time Complexity**: _**O(n × m)**_ – we traverse the matrix three times (flattening, prefix calculation, suffix pass) with constant work per element.
- **Space Complexity**: _**O(n × m)**_ – we store the flattened array and prefix array (both of size N), plus the result array. The space usage is linear in the total number of elements.

This solution efficiently finds the shortest subarray to be removed to make the array sorted by using a two-pointer technique, and it handles large arrays up to the constraint of `10^5` elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**