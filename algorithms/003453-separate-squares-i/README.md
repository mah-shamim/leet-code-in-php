3453\. Separate Squares I

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Biweekly Contest 150`

You are given a 2D integer array `squares`. Each `squares[i] = [xᵢ, yᵢ, lᵢ]` represents the coordinates of the bottom-left point and the side length of a square parallel to the x-axis.

Find the **minimum** y-coordinate value of a horizontal line such that the total area of the squares above the line _equals_ the total area of the squares below the line.

Answers within `10⁻⁵` of the actual answer will be accepted.

**Note**: Squares **may** overlap. Overlapping areas should be counted **multiple times**.

**Example 1:**

- **Input:** squares = [[0,0,1],[2,2,1]]
- **Output:** 1.00000
- **Explanation:**

    ![4062example1drawio](https://assets.leetcode.com/uploads/2025/01/06/4062example1drawio.png)
    - Any horizontal line between `y = 1` and `y = 2` will have 1 square unit above it and 1 square unit below it. The lowest option is 1.


**Example 2:**

- **Input:** squares = [[0,0,2],[1,1,1]]
- **Output:** 1.16667
- **Explanation:**

    ![4062example2drawio](https://assets.leetcode.com/uploads/2025/01/15/4062example2drawio.png)
    - The areas are:
      - Below the line: `7/6 * 2 (Red) + 1/6 (Blue) = 15/6 = 2.5`.
      - Above the line: `5/6 * 2 (Red) + 5/6 (Blue) = 15/6 = 2.5`.
    - Since the areas above and below the line are equal, the output is `7/6 = 1.16667`.

**Constraints:**

- `1 <= squares.length <= 5 * 10⁴`
- `squares[i] = [xᵢ, yᵢ, lᵢ]`
- `squares[i].length == 3`
- `0 <= xᵢ, yᵢ <= 10⁹`
- `1 <= lᵢ <= 10⁹`
- The total area of all the squares will not exceed `10¹²`.



**Hint:**
1. Binary search on the answer.






**Solution:**

We need to find a horizontal line y = L such that:
- Total area of squares above the line = Total area of squares below the line
- Return the minimum possible y-coordinate L

Key points:
- Squares are axis-aligned with bottom-left at (xᵢ, yᵢ) and side length lᵢ
- Squares can overlap, and overlapping areas count multiple times
- We're working with continuous values (y can be fractional)
- Total area ≤ 10¹² (so 64-bit integers/doubles are fine)

### Approach:

* **Binary Search on y-coordinate**: Since we need to find a horizontal line position where areas above and below are equal, we can treat the difference between these areas as a function of the line position and binary search for where this difference equals zero.
* **Monotonic Function**: As the line moves upward, the area above decreases and the area below increases, making the difference (area_above - area_below) a decreasing function. This monotonicity enables binary search.
* **Calculate Area Difference**: For each candidate line position, compute the total area of squares above and below by iterating through all squares and calculating how much of each square is above/below the line.
* **Precision Handling**: Continue binary search until the interval width is within the required precision (1e-5).

Let's implement this solution in PHP: **[3453. Separate Squares I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003453-separate-squares-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $squares
 * @return Float
 */
function separateSquares(array $squares): float
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Calculate f(L) = (total area above L) - (total area below L)
 *
 * @param $squares
 * @param $L
 * @return float|int
 */
function calculateDifference($squares, $L): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo separateSquares([[0,0,1],[2,2,1]]) . "\n";         // Output: 1.00000
echo separateSquares([[0,0,2],[1,1,1]]) . "\n";         // Output: 1.16667
?>
```

### Explanation:

* **Initialization**:
    - Find the minimum and maximum possible y-values for the line. The line must be between the bottom of the lowest square and the top of the highest square.
    - Initialize binary search bounds with these values.

* **Binary Search Process**:
    - At each iteration, compute the midpoint `L` as a candidate line position.
    - Calculate `f(L) = (total area above L) - (total area below L)`.
    - If `f(L) > 0`, area above is greater than area below, so we need to move the line up (increase `L`) to transfer more area from above to below.
    - If `f(L) ≤ 0`, area below is greater or equal, so we move the line down (decrease `L`).

* **Area Calculation**:
    - For each square with bottom `y`, side length `l`, and top `y + l`:
        - If `L ≤ y`: Entire square is above the line → add full area to `area_above`.
        - If `L ≥ y + l`: Entire square is below the line → add full area to `area_below`.
        - Otherwise: Line cuts through the square → compute partial areas proportionally to the heights above and below.

* **Termination**:
    - Stop when search interval width is less than `1e-5`.
    - Return the left bound as the answer (minimum valid y-coordinate).

### Complexity
- **Time Complexity**: O(n log((maxY-minY)/ε)), where n is the number of squares and ε is precision (1e-5).
- **Space Complexity**: O(1), excluding input storage.

**Note**: The solution handles overlapping squares correctly by summing each square's contribution independently, without deduplication.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**