1266\. Minimum Time Visiting All Points

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Geometry`, `Weekly Contest 164`

On a 2D plane, there are `n` points with integer coordinates `points[i] = [xᵢ, yᵢ]`. Return _the **minimum time** in seconds to visit all the points in the order given by `points`_.

You can move according to these rules:

- In `1` second, you can either:
   - move vertically by one unit,
   - move horizontally by one unit, or
   - move diagonally `sqrt(2)` units (in other words, move one unit vertically then one unit horizontally in `1` second).
- You have to visit the points in the same order as they appear in the array.
- You are allowed to pass through points that appear later in the order, but these do not count as visits.


**Example 1:**

![1626_example_1](https://assets.leetcode.com/uploads/2019/11/14/1626_example_1.PNG)

- **Input:** points = [[1,1],[3,4],[-1,0]]
- **Output:** 7
- **Explanation:** One optimal path is `[1,1]` -> [2,2] -> [3,3] -> `[3,4]` -> [2,3] -> [1,2] -> [0,1] -> `[-1,0]`   
  Time from [1,1] to [3,4] = 3 seconds
  Time from [3,4] to [-1,0] = 4 seconds
  Total time = 7 seconds

**Example 2:**

- **Input:** points = [[3,2],[-2,2]]
- **Output:** 5

**Constraints:**

- `points.length == n`
- `1 <= n <= 100`
- `points[i].length == 2`
- `-1000 <= points[i][0], points[i][1] <= 1000`



**Hint:**
1. To walk from point A to point B there will be an optimal strategy to walk ?
2. Advance in diagonal as possible then after that go in straight line.
3. Repeat the process until visiting all the points.






**Solution:**

We need to find the minimum time to visit all points in order, where we can move in 8 directions (like a king in chess). The key insight is that moving diagonally allows me to cover both horizontal and vertical distance simultaneously.

### Approach:

- Iterate through consecutive point pairs in the given order
- For each pair, calculate the minimum travel time using the Chebyshev distance
- Sum up all individual travel times to get the total minimum time

Let's implement this solution in PHP: **[1266. Minimum Time Visiting All Points](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001266-minimum-time-visiting-all-points/solution.php)**

```php
<?php
/**
 * @param Integer[][] $points
 * @return Integer
 */
function minTimeToVisitAllPoints(array $points): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minTimeToVisitAllPoints([[1,1],[3,4],[-1,0]]) . "\n";      // Output: 7
echo minTimeToVisitAllPoints([[3,2],[-2,2]]) . "\n";            // Output: 5
?>
```

### Explanation:

- The key insight is that moving diagonally is equivalent to moving horizontally and vertically simultaneously
- For moving from point (x1, y1) to (x2, y2), the minimum time equals the maximum of the absolute differences in x and y coordinates
- This is because:
   - We can move diagonally to cover both x and y distance simultaneously until one coordinate matches
   - Then we move straight in the remaining direction
   - The time is determined by whichever coordinate difference is larger (Chebyshev distance)
- Mathematically: time = max(|x2 - x1|, |y2 - y1|)
- We calculate this for each consecutive point pair and sum the results

### Complexity
- **Time complexity:** O(n), where n is the number of points. We process each point once.
- **Space complexity:** O(1), using only constant extra space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**