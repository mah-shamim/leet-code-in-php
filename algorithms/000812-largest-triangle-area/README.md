812\. Largest Triangle Area

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Geometry`, `Weekly Contest 79`

Given an array of points on the **X-Y** plane points where <code>points[i] = [x<sub>i</sub>, y<sub>i</sub>]</code>, return _the area of the largest triangle that can be formed by any three different points_. Answers within <code>10<sub>-5</sub></code> of the actual answer will be accepted.

**Example 1:**

![1027](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/04/04/1027.png)

- **Input:** points = [[0,0],[0,1],[1,0],[0,2],[2,0]]
- **Output:** 2.00000
- **Explanation:** The five points are shown in the above figure. The red triangle is the largest.

**Example 2:**

- **Input:** points = [[1,0],[0,0],[0,1]]
- **Output:** 0.50000

**Constraints:**

- `3 <= points.length <= 50`
- <code>-50 <= x<sub>i</sub>, y<sub>i</sub> <= 50</code>
- All the given points are **unique**.



**Similar Questions:**
1. [976. Largest Perimeter Triangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000976-largest-perimeter-triangle)






**Solution:**

We need to find the largest triangle area that can be formed by any three distinct points from a given list of points on the X-Y plane. The solution involves checking all possible triplets of points and calculating the area of the triangle they form using a mathematical formula. The key is to efficiently compute the area for each triplet and keep track of the maximum area found.

### Approach
1. **Brute Force Triplet Check**: Since the number of points is small (up to 50), we can use a brute-force approach to check all possible triplets of points. This involves three nested loops to iterate over all combinations of three distinct points.
2. **Area Calculation**: For each triplet of points, we calculate the area of the triangle they form using the formula based on the determinant (shoelace formula). The formula for the area of a triangle given three points (x1, y1), (x2, y2), and (x3, y3) is:
   ### <center> Area = ½ | x1(y2 - y3) + x2(y3 - y1) + x3(y1 - y2) | </center>
   This formula efficiently computes the area using the coordinates of the points.
3. **Track Maximum Area**: We keep track of the maximum area encountered during the iteration over all triplets.

Let's implement this solution in PHP: **[812. Largest Triangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000812-largest-triangle-area/solution.php)**

```php
<?php
/**
 * @param Integer[][] $points
 * @return Float
 */
function largestTriangleArea($points) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$points1 = [[0,0],[0,1],[1,0],[0,2],[2,0]];
echo largestTriangleArea($points1) . "\n";  // Output: 2.0

$points2 = [[1,0],[0,0],[0,1]];
echo largestTriangleArea($points2) . "\n";  // Output: 0.5
?>
```

### Explanation:

1. **Initialization**: We initialize `maxArea` to 0 to keep track of the largest triangle area found.
2. **Triplet Iteration**: Using three nested loops, we iterate over all possible triplets of points. The loops ensure that each triplet is considered exactly once without repetition.
3. **Area Calculation**: For each triplet, we extract the coordinates of the three points and compute the area using the determinant-based formula. The absolute value ensures the area is non-negative.
4. **Update Maximum Area**: If the computed area for the current triplet is larger than the current `maxArea`, we update `maxArea` to this new value.
5. **Return Result**: After checking all triplets, the function returns the largest area found.

This approach efficiently checks all possible triangles by leveraging the mathematical formula for area calculation, ensuring correctness while maintaining simplicity due to the constraints on the number of points. The complexity is O(n³), which is feasible given the maximum input size of 50 points.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**