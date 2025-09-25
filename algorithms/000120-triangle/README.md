120\. Triangle

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

Given a `triangle` array, return _the minimum path sum from top to bottom_.

For each step, you may move to an adjacent number of the row below. More formally, if you are on index `i` on the current row, you may move to either index `i` or index `i + 1` on the next row.

**Example 1:**

- **Input:** triangle = [[2],[3,4],[6,5,7],[4,1,8,3]]
- **Output:** 11
- **Explanation:** The triangle looks like:\
     2\
    <ins>3</ins> 4\
   6 <ins>5</ins> 7\
  4 <ins>1</ins> 8 3\
  The minimum path sum from top to bottom is 2 + 3 + 5 + 1 = 11 (underlined above)

**Example 2:**

- **Input:** triangle = [[-10]]
- **Output:** -10

**Constraints:**

- `1 <= triangle.length <= 200`
- `triangle[0].length == 1`
- `triangle[i].length == triangle[i - 1].length + 1`
- <code>-10<sup>4</sup> <= triangle[i][j] <= 10<sup>4</sup></code>


**Follow up:** Could you do this using only `O(n)` extra space, where `n` is the total number of rows in the triangle?







**Solution:**

We need to find the minimum path sum from the top to the bottom of a given triangle array. Each step allows moving to an adjacent number in the row below, either to the same index or the next index. The goal is to compute the minimum sum efficiently using dynamic programming with optimal space complexity.

### Approach
1. **Dynamic Programming (Bottom-Up):** We start from the bottom row of the triangle and work our way up. For each element in the current row, we update its value by adding the minimum of the two adjacent elements from the row below. This way, each element in the current row will store the minimum path sum from that element to the bottom.
2. **Space Optimization:** Instead of using extra space, we modify the triangle in place. This allows us to achieve O(1) extra space (excluding the input storage), as we only need to update the values within the triangle itself.

Let's implement this solution in PHP: **[120. Triangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000120-triangle/solution.php)**

```php
<?php
/**
 * @param Integer[][] $triangle
 * @return Integer
 */
function minimumTotal($triangle) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$triangle1 = [[2],[3,4],[6,5,7],[4,1,8,3]];
echo minimumTotal($triangle1) . "\n"; // Output: 11

// Example 2
$triangle2 = [[-10]];
echo minimumTotal($triangle2) . "\n"; // Output: -10
?>
```

### Explanation:

1. **Initialization:** We start from the second last row of the triangle (since the last row doesn't have any row below it).
2. **Updating Values:** For each element in the current row, we update its value by adding the minimum of the two adjacent elements from the row immediately below. This step ensures that each element now contains the minimum path sum from that element to the bottom of the triangle.
3. **Result Extraction:** After processing all rows from bottom to top, the top element of the triangle (`triangle[0][0]`) will contain the minimum path sum from the top to the bottom.

This approach efficiently computes the minimum path sum by leveraging dynamic programming principles and minimizes space usage by modifying the input triangle in place. The time complexity is O(n<sup>2</sup>), where n is the number of rows, which is optimal for this problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**