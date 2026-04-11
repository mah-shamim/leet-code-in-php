3741\. Minimum Distance Between Three Equal Elements II

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Weekly Contest 475`

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

- `1 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= n`



**Hint:**
1. The distance formula `abs(i - j) + abs(j - k) + abs(k - i)` simplifies to `2 * (max(i, j, k) - min(i, j, k))`.
2. Group the indices for each unique number. For a number to form a good tuple, it must appear at least 3 times.
3. For each number that appears at least 3 times, we want to find three of its indices `p < q < r` that minimize `r - p`. This is achieved by considering every three consecutive indices in the sorted list of indices.






**Solution:**

We are given an array and need to find the minimum distance among three equal elements, where distance is defined as `abs(i-j) + abs(j-k) + abs(k-i)`. This simplifies to `2 * (max(i,j,k) - min(i,j,k))`. The solution groups indices by value, considers only values with at least three occurrences, and checks consecutive triples in sorted index lists to minimize the range between the smallest and largest index. The final answer is twice that minimum range.

### Approach:

- **Group indices by value:** Use a hash map to store all indices where each value appears.
- **Filter values with ≥3 occurrences:** Only those can form a valid triple.
- **Sort indices for each value:** Since we add indices in increasing order during iteration, they are naturally sorted.
- **Slide a window of size 3 over indices:** For each consecutive triple `(p, q, r)` in sorted order, compute `r - p` and track the minimum.
- **Compute final distance:** Multiply the minimum range by 2 to get the required distance.

Let's implement this solution in PHP: **[3741. Minimum Distance Between Three Equal Elements II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003741-minimum-distance-between-three-equal-elements-ii/solution.php)**

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

- **Distance simplification:**  
  - For three indices `i < j < k`, the expression `abs(i-j) + abs(j-k) + abs(k-i)` becomes `(j-i) + (k-j) + (k-i) = 2*(k-i)`.  
  - So minimizing the sum is equivalent to minimizing `k - i`.
- **Why consecutive indices in sorted order?** For a given sorted list of indices, the smallest `k - i` for any triple occurs when we take three consecutive indices. Any triple with a gap between would have a larger spread.
- **Sliding window of size 3:** Iterate through `indices[0..m-3]` and check `(indices[i], indices[i+1], indices[i+2])`. This is efficient (_**O(m)**_) and guarantees finding the minimal range.
- **Return -1 if no value appears at least 3 times**

### Complexity
- **Time Complexity**: _**O(n)**_
   - One pass to group indices into hash map.
   - For each value, iterating over its indices in order takes O(m) per value, and sum of all m over values = n.
   - Overall linear.
- **Space Complexity**: _**O(1)**_ - Hash map stores up to n indices in total.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**