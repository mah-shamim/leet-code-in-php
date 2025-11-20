757\. Set Intersection Size At Least Two

**Difficulty:** Hard

**Topics:** `Array`, `Greedy`, `Sorting`, `Weekly Contest 65`

You are given a 2D integer array `intervals` where `intervals[i] = [startᵢ, endᵢ]` represents all the integers from `startᵢ` to `endᵢ` inclusively.

A **containing set** is an array `nums` where each interval from `intervals` has **at least two** integers in `nums`.

- For example, if `intervals = [[1,3], [3,7], [8,9]]`, then `[1,2,4,7,8,9]` and `[2,3,4,8,9]` are **containing sets**.

Return _the minimum possible size of a containing set_.

**Example 1:**

- **Input:** intervals = [[1,3],[3,7],[8,9]]
- **Output:** 5
- **Explanation:** let nums = [2, 3, 4, 8, 9].
  It can be shown that there cannot be any containing array of size 4.

**Example 2:**

- **Input:** intervals = [[1,3],[1,4],[2,5],[3,5]]
- **Output:** 3
- **Explanation:** let nums = [2, 3, 4].
  It can be shown that there cannot be any containing array of size 2.

**Example 3:**

- **Input:** intervals = [[1,2],[2,3],[2,4],[4,5]]
- **Output:** 5
- **Explanation:** let nums = [1, 2, 3, 4, 5].
  It can be shown that there cannot be any containing array of size 4.

**Constraints:**

- `1 <= intervals.length <= 3000`
- `intervals[i].length == 2`
- `0 <= startᵢ < endᵢ <= 10⁸`







**Solution:**

We need to find the smallest set of numbers that contains at least two elements from each given interval.

The key insight is to sort the intervals by their end points and use a greedy approach to select numbers that will cover as many intervals as possible.

### Approach:

1. Sort intervals by end point (ascending), and if end points are equal, sort by start point (descending)
2. Maintain two variables to track the last two numbers selected
3. For each interval:
   - If it already contains both last selected numbers, skip it
   - If it contains only one of them, add the largest number from the current interval
   - If it contains none of them, add the two largest numbers from the current interval

Let's implement this solution in PHP: **[757. Set Intersection Size At Least Two](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000757-set-intersection-size-at-least-two/solution.php)**

```php
<?php
/**
 * @param Integer[][] $intervals
 * @return Integer
 */
function intersectionSizeTwo($intervals) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo intersectionSizeTwo([[1,3],[3,7],[8,9]]) . "\n";                                   // Output: 5
echo intersectionSizeTwo([[1,3],[1,4],[2,5],[3,5]]) . "\n";                             // Output: 3
echo intersectionSizeTwo([[1,2],[2,3],[2,4],[4,5]]) . "\n";                             // Output: 5
echo intersectionSizeTwo([[5,10]]) . "\n";                                              // Output: 2
echo intersectionSizeTwo([[1,2],[4,5],[7,8]]) . "\n";                                   // Output: 6
echo intersectionSizeTwo([[1,10],[2,9],[3,8],[4,7]]) . "\n";                            // Output: 2
echo intersectionSizeTwo([[1,5],[3,7],[6,9]]) . "\n";                                   // Output: 4
echo intersectionSizeTwo([[2,6],[2,4],[2,7],[2,10]]) . "\n";                            // Output: 2
echo intersectionSizeTwo([[3,8],[5,8],[1,8]]) . "\n";                                   // Output: 2
echo intersectionSizeTwo([[1,2],[2,3],[3,4],[4,5]]) . "\n";                             // Output: 4
echo intersectionSizeTwo([[1,100],[2,99],[3,98],[4,97],[80,120],[85,130]]) . "\n";      // Output: 2
echo intersectionSizeTwo([[1,5],[1,4],[1,3],[1,2],[4,6]]) . "\n";                       // Output: 3
echo intersectionSizeTwo([[1,10],[20,30],[40,60]]) . "\n";                              // Output: 6
echo intersectionSizeTwo([[5,9],[5,9],[5,9],[5,9]]) . "\n";                             // Output: 2
echo intersectionSizeTwo([[1,4],[2,6],[4,8],[7,9],[8,11]]) . "\n";                      // Output: 4
echo intersectionSizeTwo([[1,1000],[50,51],[51,200],[600,601]]) . "\n";                 // Output: 4
echo intersectionSizeTwo([[1,3],[2,4],[3,5],[4,6],[5,7]]) . "\n";                       // Output: 4
echo intersectionSizeTwo([[1,2],[1,3],[2,3],[2,4]]) . "\n";                             // Output: 3
?>
```

### Explanation:

1. **Sorting:** We sort intervals primarily by their end points. When end points are equal, we sort by start points in descending order. This ensures that wider intervals (with smaller start points) come after narrower ones when they end at the same point.

2. **Greedy Selection:** We maintain `first` and `second` to represent the two most recently added numbers to our set.

3. **Processing Intervals:**
   - If both `first` and `second` are within the current interval, we're already covered.
   - If only `second` is within the interval, we add the current interval's end point (the largest possible number that can help cover future intervals).
   - If neither is within the interval, we add the two largest numbers from the current interval (`end-1` and `end`).

4. **Why it works:** By always selecting the largest possible numbers from each interval, we maximize the chance that these numbers will also cover subsequent intervals, thus minimizing the total set size.

**Time Complexity:** O(n log n) due to sorting  
**Space Complexity:** O(1) excluding the space needed for sorting

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**