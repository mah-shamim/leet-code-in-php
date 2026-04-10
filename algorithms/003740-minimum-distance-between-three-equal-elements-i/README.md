3740\. Minimum Distance Between Three Equal Elements I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Weekly Contest 475`

You are given an integer array `nums`.

A tuple `(i, j, k)` of 3 **distinct** indices is **good** if `nums[i] == nums[j] == nums[k]`.

The **distance** of a **good** tuple is `abs(i - j) + abs(j - k) + abs(k - i)`, where `abs(x)` denotes the **absolute value** of `x`.

Return an integer denoting the **minimum** possible **distance** of a **good** tuple. If no **good** tuples exist, return `-1`.

**Example 1:**

- **Input:** nums = [1,2,1,1,3]
- **Output:** 6
- **Explanation:**
   - The minimum distance is achieved by the good tuple `(0, 2, 3)`.
   - `(0, 2, 3)` is a good tuple because `nums[0] == nums[2] == nums[3] == 1`. Its distance is `abs(0 - 2) + abs(2 - 3) + abs(3 - 0) = 2 + 1 + 3 = 6`.

**Example 2:**

- **Input:** nums = [1,1,2,3,2,1,2]
- **Output:** 8
- **Explanation:**
   - The minimum distance is achieved by the good tuple `(2, 4, 6)`.
   - `(2, 4, 6)` is a good tuple because `nums[2] == nums[4] == nums[6] == 2`. Its distance is `abs(2 - 4) + abs(4 - 6) + abs(6 - 2) = 2 + 2 + 4 = 8`.

**Example 3:**

- **Input:** nums = [1]
- **Output:** -1
- **Explanation:** There are no good tuples. Therefore, the answer is -1.

**Constraints:**

- `1 <= n == nums.length <= 100`
- `1 <= nums[i] <= n`



**Hint:**
1. Use bruteforce






**Solution:**

This solution finds the **minimum possible distance** among all **good tuples** `(i, j, k)` where all three array elements are equal.  
It groups indices by value, then checks only **consecutive triples** of indices for each value, because the minimal distance for a fixed set of positions occurs when they are as close as possible.  
If no value appears at least 3 times, it returns `-1`.

### Approach:

- **Group indices by value** – Store all indices where each value occurs.
- **Check each value with ≥3 occurrences** – For each such value, look at its list of sorted indices.
- **Only examine consecutive triples** – For three sorted indices `a < b < c`, the distance formula simplifies to `2*(c - a)`, which is minimized when `a`, `b`, `c` are consecutive in the list.
- **Track the minimum distance** – Update the global minimum whenever a smaller distance is found.
- **Return the result** – If no valid triple is found, return `-1`.

Let's implement this solution in PHP: **[3740. Minimum Distance Between Three Equal Elements I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003740-minimum-distance-between-three-equal-elements-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return float|int
 */
function minimumDistance(array $nums): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDistance([1,2,1,1,3]) . "\n";               // Output: 6
echo minimumDistance([1,1,2,3,2,1,2]) . "\n";           // Output: 8
echo minimumDistance([1]) . "\n";                       // Output: -1
?>
```

### Explanation:

- The distance formula `abs(i - j) + abs(j - k) + abs(k - i)` for sorted indices `i < j < k` simplifies to `(j - i) + (k - j) + (k - i) = 2*(k - i)`.
- Therefore, for fixed `i` and `k`, the middle index `j` doesn’t affect the total distance — only the outer indices matter.
- To minimize `2*(k - i)`, we want `i` and `k` as close as possible, which happens when they are consecutive in the sorted index list for a given value.
- This means checking all windows of 3 consecutive indices suffices — no need to check non-consecutive triples.
- The algorithm runs in **O(n + m * k)** where `m` is the number of distinct values and `k` is the number of indices per value, but effectively **O(n)** in practice for this input size.

### Complexity
- **Time Complexity**: _**O(n)**_ – Each index is examined once during grouping, and each triple window is _**O(1)**_ per value.
- **Space Complexity**: _**O(n)**_ – For storing the index lists of each value.
- **Simplified for constraints:** Since `n ≤ 100`, even a brute-force _**O(n³)**_ solution would work, but this optimized version is still efficient.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**