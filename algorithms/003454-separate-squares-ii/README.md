3454\. Separate Squares II

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Segment Tree`, `Line Sweep`, `Biweekly Contest 150`

You are given a 2D integer array `squares`. Each `squares[i] = [xᵢ, yᵢ, lᵢ]` represents the coordinates of the bottom-left point and the side length of a square parallel to the x-axis.

Find the **minimum** y-coordinate value of a horizontal line such that the total area covered by squares above the line equals the total area covered by squares below the line.

Answers within `10⁻⁵` of the actual answer will be accepted.

**Note**: Squares **may** overlap. Overlapping areas should be counted **only once** in this version.

**Example 1:**

- **Input:** squares = [[0,0,1],[2,2,1]]
- **Output:** 1.00000
- **Explanation:**

  ![4065example1drawio](https://assets.leetcode.com/uploads/2025/01/15/4065example1drawio.png)
   - Any horizontal line between `y = 1` and `y = 2` results in an equal split, with 1 square unit above and 1 square unit below. The minimum y-value is 1.


**Example 2:**

- **Input:** squares = [[0,0,2],[1,1,1]]
- **Output:** 1.00000
- **Explanation:**

  ![4065example2drawio](https://assets.leetcode.com/uploads/2025/01/15/4065example2drawio.png)
   - Since the blue square overlaps with the red square, it will not be counted again. Thus, the line `y = 1` splits the squares into two equal parts.

**Constraints:**

- `1 <= squares.length <= 5 * 10⁴`
- `squares[i] = [xᵢ, yᵢ, lᵢ]`
- `squares[i].length == 3`
- `0 <= xᵢ, yᵢ <= 10⁹`
- `1 <= lᵢ <= 10⁹`
- The total area of all the squares will not exceed `10¹⁵`.



**Hint:**
1. Use a line sweep and a segment tree.
2. The line must lie in one of the squares.



**Similar Questions:**
1. [850. Rectangle Area II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000850-rectangle-area-ii)






**Solution:**

We are given a problem to find the minimum y-coordinate of a horizontal line that splits the total area of a set of squares (with overlaps counted only once) into two equal parts.

### Approach:

The solution uses a line sweep algorithm along the y-axis combined with a segment tree for maintaining the union of x-intervals. Here's the step-by-step approach:

1. **Event Generation**:
   - For each square `[x, y, l]`, create two events:
      - `(y, +1, x, x+l)` at the bottom edge (add interval)
      - `(y+l, -1, x, x+l)` at the top edge (remove interval)
   - Collect all unique x-coordinates (left and right edges) for coordinate compression.

2. **Coordinate Compression**:
   - Sort unique x-coordinates to map continuous x-ranges to discrete indices for the segment tree.

3. **Total Area Calculation** (First Pass):
   - Sort events by y-coordinate.
   - Sweep through events, maintaining the current union width of active x-intervals using a segment tree.
   - Accumulate area between consecutive event y-values as `union_width × Δy`.
   - Compute total union area of all squares.

4. **Finding the Split Line** (Second Pass):
   - Reset the segment tree and sweep through events again.
   - Track accumulated area until it reaches `total_area / 2`.
   - When the accumulated area in a segment (between two event y-values) would exceed the target:
      - Interpolate linearly to find the exact y where area equals half the total.
   - Return this y-coordinate.

Let's implement this solution in PHP: **[3454. Separate Squares II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003454-separate-squares-ii/solution.php)**

```php
<?php
class Solution {

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
     * @param array $events
     * @param array $xs
     * @return float
     */
    private function getArea(array $events, array $xs): float {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}


class SegmentTree {
    private array $xs;
    private int $n;
    private array $coverCount;
    private array $coverWidth;

    /**
     * @param array $xs
     */
    public function __construct(array $xs) {
        $this->xs = $xs;
        $this->n = count($xs) - 1;
        $this->coverCount = array_fill(0, 4 * $this->n, 0);
        $this->coverWidth = array_fill(0, 4 * $this->n, 0);
    }

    /**
     * @param int $i
     * @param int $j
     * @param int $val
     * @return void
     */
    public function add(int $i, int $j, int $val): void {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @return int
     */
    public function getCoveredWidth(): int {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param int $treeIndex
     * @param int $lo
     * @param int $hi
     * @param int $i
     * @param int $j
     * @param int $val
     * @return void
     */
    private function addHelper(int $treeIndex, int $lo, int $hi, int $i, int $j, int $val): void {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

// Test cases
$separateSquares = new Solution();
print_r($separateSquares->separateSquares([[0,0,1],[2,2,1]])) . "\n";                       // Output: 1.00000
print_r($separateSquares->separateSquares([[0,0,2],[1,1,1]])) . "\n";                       // Output: 1.00000
print_r($separateSquares->separateSquares([[0,0,3],[1,1,1],[2,2,1]])) . "\n";               // Output: 2.5
print_r($separateSquares->separateSquares([[0,0,4],[1,1,2],[2,2,2],[3,3,2]])) . "\n";       // Output: 3.0
?>
```

### Explanation:

### Key Insights:
- **Line Sweep**: Horizontal lines only matter at y-values where the set of active squares changes (square boundaries).
- **Union Area**: Overlaps must be counted once → use segment tree to track active x-intervals and compute their union width.
- **Binary Search Alternative**: Direct binary search on y is inefficient due to overlapping areas. The sweep approach processes only O(n) critical y-values.

### Segment Tree Role:
- Maintains the union length of active x-intervals at current y.
- Supports:
    - `add(l, r, val)`: Add/remove interval `[l, r]` with value `+1` (add) or `-1` (remove).
    - `getCoveredWidth()`: Return total union length of all active intervals.
- Uses coordinate compression to handle large x-ranges (up to 10⁹).

### Algorithm Details:
1. **Events Processing**:
    - Events sorted by y. For each event:
        - Compute area added since previous event using current union width.
        - Update segment tree with interval addition/removal.
        - Update previous y to current event y.

2. **Accuracy**:
    - Area between events changes linearly → exact split point found via linear interpolation.
    - Handles cases where split falls exactly on event y or between events.

3. **Complexity**:
    - **Time**: O(n log m) where n = number of squares, m = number of unique x-coordinates (≤ 2n).
    - **Space**: O(m) for segment tree and coordinate compression.

### Edge Cases Handled:
- Squares may overlap (union area counted once).
- Split line may coincide with square edges or fall between them.
- Large coordinate ranges handled via compression.
- Zero-width intervals (when no squares active) correctly skip division by zero.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**