3000\. Maximum Area of Longest Diagonal Rectangle

**Difficulty:** Easy

**Topics:** `Array`, `Weekly Contest 379`

You are given a 2D **0-indexed** integer array `dimensions`.

For all indices `i`, `0 <= i < dimensions.length`, `dimensions[i][0]` represents the length and `dimensions[i][1]` represents the width of the rectangle `i`.

Return _the **area** of the rectangle having the **longest** diagonal. If there are multiple rectangles with the longest diagonal, return the area of the rectangle having the **maximum** area_.

**Example 1:**

- **Input:** dimensions = [[9,3],[8,6]]
- **Output:** 48
- **Explanation:**
  For index = 0, length = 9 and width = 3. Diagonal length = sqrt(9 * 9 + 3 * 3) = sqrt(90) ≈ 9.487.
  For index = 1, length = 8 and width = 6. Diagonal length = sqrt(8 * 8 + 6 * 6) = sqrt(100) = 10.
  So, the rectangle at index 1 has a greater diagonal length therefore we return area = 8 * 6 = 48.

**Example 2:**

- **Input:** dimensions = [[3,4],[4,3]]
- **Output:** 12
- **Explanation:** Length of diagonal is the same for both which is 5, so maximum area = 12.

**Constraints:**

- `1 <= dimensions.length <= 100`
- `dimensions[i].length == 2`
- `1 <= dimensions[i][0], dimensions[i][1] <= 100`



**Hint:**
1. Diagonal of rectangle is <code>sqrt(length<sup>2</sup> + width<sup>2</sup>)</code>.






**Solution:**

We need to find the rectangle with the longest diagonal from a given list of rectangles. If multiple rectangles have the same longest diagonal, we then select the one with the largest area. The solution involves calculating the diagonal length for each rectangle and comparing these lengths, while also considering the area in case of ties.

### Approach
1. **Problem Analysis**: The problem requires processing each rectangle's dimensions to determine which one has the longest diagonal. The diagonal of a rectangle can be calculated using the Pythagorean theorem: <code>diagonal = sqrt(length<sup>2</sup> + width<sup>2</sup>)</code>. However, to avoid floating-point inaccuracies, we compare the squares of the diagonals (i.e., <code>length<sup>2</sup> + width<sup>2</sup></code>) instead of the actual diagonal lengths.
2. **Key Insight**: For each rectangle, compute the square of its diagonal. Track the maximum value of these squares. If two rectangles have the same diagonal square, compare their areas (length * width) and keep the larger area.
3. **Algorithm Selection**: Iterate through each rectangle, compute its diagonal square and area. Update the best candidate whenever a larger diagonal square is found, or if the same diagonal square is found but with a larger area.
4. **Complexity Analysis**: The algorithm processes each rectangle exactly once, resulting in a time complexity of O(n), where n is the number of rectangles. This is efficient given the constraints.

Let's implement this solution in PHP: **[3000. Maximum Area of Longest Diagonal Rectangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003000-maximum-area-of-longest-diagonal-rectangle/solution.php)**

```php
<?php
/**
 * @param Integer[][] $dimensions
 * @return Integer
 */
function areaOfMaxDiagonal($dimensions) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$dimensions1 = array(array(9,3), array(8,6));
echo areaOfMaxDiagonal($dimensions1) . "\n"; // Output: 48

// Example 2
$dimensions2 = array(array(3,4), array(4,3));
echo areaOfMaxDiagonal($dimensions2) . "\n"; // Output: 12
?>
```

### Explanation:

1. **Initialization**: We start by initializing `maxDiagonalSq` to zero to keep track of the largest diagonal square encountered, and `maxArea` to zero to store the area of the rectangle with the longest diagonal.
2. **Iteration**: For each rectangle in the input list, we extract its length (`l`) and width (`w`). We compute the square of its diagonal (`diagonalSq`) as <code>l<sup>2</sup> + w<sup>2</sup></code> and its area as `l * w`.
3. **Comparison**:
    - If the current rectangle's diagonal square is greater than `maxDiagonalSq`, we update `maxDiagonalSq` and set `maxArea` to the current rectangle's area.
    - If the current rectangle's diagonal square equals `maxDiagonalSq`, we check if its area is larger than `maxArea` and update `maxArea` accordingly.
4. **Result**: After processing all rectangles, `maxArea` holds the area of the rectangle with the longest diagonal. In case of multiple rectangles with the same diagonal length, it holds the area of the rectangle with the largest area.

This approach efficiently narrows down the candidate rectangles by leveraging simple arithmetic and comparisons, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**