1848\. Minimum Distance to the Target Element

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Weekly Contest 239`

Given an integer array `nums` **(0-indexed)** and two integers `target` and `start`, find an index `i` such that `nums[i] == target` and `abs(i - start)` is **minimized**. Note that `abs(x)` is the absolute value of `x`.

Return `abs(i - start)`.

It is **guaranteed** that `target` exists in `nums`.

**Example 1:**

- **Input:** nums = [1,2,3,4,5], target = 5, start = 3
- **Output:** 1
- **Explanation:** `nums[4] = 5` is the only value equal to `target`, so the answer is `abs(4 - 3) = 1`.

**Example 2:**

- **Input:** nums = [1], target = 1, start = 0
- **Output:** 0
- **Explanation:** `nums[0] = 1` is the only value equal to `target`, so the answer is `abs(0 - 0) = 0`.

**Example 3:**

- **Input:** nums = [1,1,1,1,1,1,1,1,1,1], target = 1, start = 0
- **Output:** 0
- **Explanation:** Every value of `nums` is `1`, but` nums[0]` minimizes `abs(i - start)`, which is `abs(0 - 0) = 0`.

**Example 4:**

- **Input:** nums = [5,3,8,2,9,1,4,6,7], target = 9, start = 4
- **Output:** 0

**Example 5:**

- **Input:** nums = [1,5,2,5,3,5,4], target = 5, start = 3
- **Output:** 0

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 10⁴`
- `0 <= start < nums.length`
- `target` is in `nums`.



**Hint:**
1. Loop in both directions until you find the target element.
2. For each index `i` such that `nums[i] == target calculate abs(i - start)`.






**Solution:**

The solution finds the minimum distance between a given starting index and any occurrence of a target value in an array. It iterates through the entire array once, computing the absolute distance for each matching element and tracking the smallest distance found.

### Approach:

- **Linear scan with distance calculation**: Iterate through all array elements once, checking each index where `nums[i] == target`
- **Absolute difference computation**: For each matching element, calculate `abs(i - start)` as the distance
- **Minimum tracking**: Maintain a running minimum distance value, updating whenever a smaller distance is found
- **Early optimization**: Since we need the absolute minimum, we can't stop early without checking all elements (though theoretically we could optimize by expanding outward from `start`)

Let's implement this solution in PHP: **[1848. Minimum Distance to the Target Element](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001848-minimum-distance-to-the-target-element/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @param Integer $start
 * @return Integer
 */
function getMinDistance(array $nums, int $target, int $start): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getMinDistance([1,2,3,4,5], 5, 3) . "\n";                      // Output: 1
echo getMinDistance([1], 1, 0) . "\n";                              // Output: 0
echo getMinDistance([1,1,1,1,1,1,1,1,1,1], 1, 0) . "\n";            // Output: 0
echo getMinDistance([5,3,8,2,9,1,4,6,7], 9, 4) . "\n";              // Output: 0
echo getMinDistance([1,5,2,5,3,5,4], 5, 3) . "\n";                  // Output: 0
?>
```

### Explanation:

- **Initialization**: Start with `minDistance` set to `PHP_INT_MAX` (largest possible integer).
- **Iteration**: Loop through the array with both index `$i` and value `$num`.
- **Condition check**: When `$num == $target`, calculate the absolute difference between current index and start.
- **Comparison**: If the calculated distance is less than current `minDistance`, update `minDistance`.
- **Return value**: After checking all elements, return the minimum distance found.

### Complexity
- **Time Complexity**: _**O(n)**_ - where n is the length of the array, as we potentially need to check every element.
- **Space Complexity**: _**O(1)**_ - only using a constant amount of extra space for variables.
- **Optimality**: This is optimal for time complexity since we must examine all elements to find the minimum distance when the array is unsorted.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**