539\. Minimum Time Difference

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `String`, `Sorting`

Given a list of 24-hour clock time points in **"HH:MM"** format, return _the minimum **minutes** difference between any two time-points in the list_.

**Example 1:**

- **Input:** timePoints = ["23:59","00:00"]
- **Output:** 1

**Example 2:**

- **Input:** timePoints = ["00:00","23:59","00:00"]
- **Output:** 0

**Constraints:**

- <code>2 <= timePoints.length <= 2 * 10<sup>4</sup></code>
- `timePoints[i]` is in the format **"HH:MM"**.


**Solution:**

The approach can be broken down as follows:

### Approach:

1. **Convert time points to minutes**:
   Each time point is in `"HH:MM"` format, so we can convert it into the total number of minutes from `00:00`. For example, `"23:59"` would be `23 * 60 + 59 = 1439` minutes.

2. **Sort the time points**:
   Once all the time points are converted into minutes, sort them to calculate the differences between consecutive time points.

3. **Handle the circular nature of the clock**:
   The difference between the first and last time points also needs to be considered, because of the circular nature of the clock. This can be handled by adding `1440` (24 hours) to the last time point and comparing it with the first time point.

4. **Find the minimum difference**:
   After sorting, find the minimum difference between consecutive time points, including the difference between the first and last time points.


Let's implement this solution in PHP: **[539. Minimum Time Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000539-minimum-time-difference/solution.php)**

```php
<?php
/**
 * @param String[] $timePoints
 * @return Integer
 */
function findMinDifference($timePoints) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */

}

// Example 1:
$timePoints1 = ["23:59", "00:00"];
echo findMinDifference($timePoints1) . "\n";  // Output: 1

// Example 2:
$timePoints2 = ["00:00", "23:59", "00:00"];
echo findMinDifference($timePoints2) . "\n";  // Output: 0
?>
```

### Explanation:

1. **`array_map()`**: This function is used to convert each time point from `"HH:MM"` format into the total number of minutes from `00:00`.
2. **`sort($minutes)`**: After converting the time points into minutes, we sort them to calculate the difference between consecutive time points.
3. **Calculate consecutive differences**: The difference between consecutive time points is computed and tracked as the minimum difference.
4. **Circular difference**: The difference between the last and the first time point is calculated as `1440 - last + first`, which ensures that the circular nature of the clock is accounted for.

### Time Complexity:
- **Sorting the array** takes _**O(n log n)**_, where _**n **_ is the number of time points.
- **Comparing consecutive time points** takes _**O(n)**_.
- Overall time complexity: _**O(n log n)**_, which is efficient for _**n**_ up to 20,000 (as given in the constraints).

This solution should work efficiently within the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
