1288\. Remove Covered Intervals

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Sorting`, `Biweekly Contest 15`

Given an array `intervals` where `intervals[i] = [lᵢ, rᵢ]` represent the interval `[lᵢ, rᵢ)`, remove all intervals that are covered by another interval in the list.

The interval `[a, b)` is covered by the interval `[c, d)` if and only if `c <= a` and `b <= d`.

Return _the number of remaining intervals_.

**Example 1:**

- **Input:** intervals = [[1,4],[3,6],[2,8]]
- **Output:** 2
- **Explanation:** Interval [3,6] is covered by [2,8], therefore it is removed.

**Example 2:**

- **Input:** intervals = [[1,4],[2,3]]
- **Output:** 1

**Example 3:**

- **Input:** intervals = [[1,2],[2,3]]
- **Output:** 2

**Example 4:**

- **Input:** intervals = [[1,5],[2,4],[3,6]]
- **Output:** 2

**Example 5:**

- **Input:** intervals = [[0,10],[1,9],[2,8],[3,7]]
- **Output:** 1

**Example 6:**

- **Input:** intervals = [[1,2]]
- **Output:** 1

**Example 7:**

- **Input:** intervals = [[1,4],[2,5],[3,6]]
- **Output:** 3

**Constraints:**

- `1 <= intervals.length <= 1000`
- `intervals[i].length == 2`
- `0 <= lᵢ < rᵢ <= 10⁵`
- All the given intervals are **unique**.


**Hint:**
1. How to check if an interval is covered by another?
2. Compare each interval to all others and check if it is covered by any interval.


**Solution:**

We implement a direct _**O(n²)**_ comparison solution that checks every interval against all others to determine if it is covered. By iterating through each interval and testing the covering condition against every other interval, we count only those intervals that are not covered by any other interval.

## Approach
- Initialize a counter `remaining` to 0.
- For each interval `i` in the input array:
   - Assume it is not covered (`covered = false`).
   - Compare it with every other interval `j` where `j ≠ i`.
   - If any `j` satisfies `c <= a` and `b <= d` (where `[a,b)` is interval `i` and `[c,d)` is interval `j`), mark it as covered and break out of the inner loop.
   - If after checking all `j` the interval is still not covered, increment `remaining`.
- Return `remaining`.

Let's implement this solution in PHP: **[1288. Remove Covered Intervals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001288-remove-covered-intervals/solution.php)**

```php
<?php
/**
 * @param Integer[][] $intervals
 * @return Integer
 */
function removeCoveredIntervals(array $intervals): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo removeCoveredIntervals([[1,4],[3,6],[2,8]]) .  "\n";           // Output: 2
echo removeCoveredIntervals([[1,4],[2,3]]) .  "\n";                 // Output: 1
echo removeCoveredIntervals([[1,2],[2,3]]) .  "\n";                 // Output: 2
echo removeCoveredIntervals([[1,5],[2,4],[3,6]]) .  "\n";           // Output: 2
echo removeCoveredIntervals([[0,10],[1,9],[2,8],[3,7]]) .  "\n";    // Output: 1
echo removeCoveredIntervals([[1,2]]) .  "\n";                       // Output: 1
echo removeCoveredIntervals([[1,4],[2,5],[3,6]]) .  "\n";           // Output: 3
?>
```

### Explanation:
- The covering condition is directly translated: an interval `[a,b)` is covered by `[c,d)` if `c` starts at or before `a`, and `d` ends at or after `b`.
- We compare every interval against every other interval, including intervals that might be identical (though the problem guarantees uniqueness, so no equal intervals exist).
- If a covering interval is found, we stop checking further for that interval to save time.
- The outer loop processes each interval once, and the inner loop checks all possible covering candidates.
- This brute-force approach works well given the constraint `n ≤ 1000`, where _**O(n²)**_ is acceptable.

## Complexity Analysis

- **Time Complexity:** _**O(n²)**_, where `n` is the number of intervals. For each of the `n` intervals, we scan up to `n−1` other intervals.
- **Space Complexity:** _**O(1)**_ additional space (excluding input storage), as we only use a few integer variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**