2333\. Minimum Sum of Squared Difference

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Binary Search`, `Greedy`, `Sorting`, `Heap (Priority Queue)`, `Biweekly Contest 82`

You are given two positive **0-indexed** integer arrays `nums1` and `nums2`, both of length `n`.

The **sum of squared difference** of arrays `nums1` and `nums2` is defined as the **sum** of `(nums1[i] - nums2[i])²` for each `0 <= i < n`.

You are also given two positive integers `k1` and `k2`. You can modify any of the elements of `nums1` by `+1` or `-1` at most `k1` times. Similarly, you can modify any of the elements of `nums2` by `+1` or `-1` at most `k2` times.

Return _the minimum **sum of squared difference** after modifying array `nums1` at most `k1` times and modifying array `nums2` at most `k2` times_.

**Note:** You are allowed to modify the array elements to become **negative** integers.

**Example 1:**

- **Input:** nums1 = [1,2,3,4], nums2 = [2,10,20,19], k1 = 0, k2 = 0
- **Output:** 579
- **Explanation:** 
  - The elements in nums1 and nums2 cannot be modified because k1 = 0 and k2 = 0.
  - The sum of square difference will be: (1 - 2)² + (2 - 10)² + (3 - 20)² + (4 - 19)² = 579.

**Example 2:**

- **Input:** nums1 = [1,4,10,12], nums2 = [5,8,6,9], k1 = 1, k2 = 1
- **Output:** 43
- **Explanation:** 
  - One way to obtain the minimum sum of square difference is:
    - Increase nums1[0] once.
    - Increase nums2[2] once.
  - The minimum of the sum of square difference will be: (2 - 5)² + (4 - 8)² + (10 - 7)² + (12 - 9)² = 43.
  - Note that, there are other ways to obtain the minimum of the sum of square difference, but there is no way to obtain a sum smaller than 43.

**Example 3:**

- **Input:** nums1 = [1,1], nums2 = [1,1], k1 = 100, k2 = 100
- **Output:** 0

**Example 4:**

- **Input:** nums1 = [1,2,3], nums2 = [4,5,6], k1 = 5, k2 = 4
- **Output:** 0

**Example 5:**

- **Input:** nums1 = [0], nums2 = [10], k1 = 3, k2 = 4
- **Output:** 9

**Example 6:**

- **Input:** nums1 = [0], nums2 = [10], k1 = 4, k2 = 4
- **Output:** 4

**Example 7:**

- **Input:** nums1 = [100000], nums2 = [0], k1 = 1000000000, k2 = 1000000000
- **Output:** 0

**Constraints:**

- `n == nums1.length == nums2.length`
- `1 <= n <= 10⁵`
- `0 <= nums1[i], nums2[i] <= 10⁵`
- `0 <= k1, k2 <= 10⁹`


**Hint:**

1. There is no difference between the purpose of `k1` and `k2`. Adding `+1` to one element in `nums1` is same as performing `-1` to one element in `nums2`, and vice versa.
2. Reduce the sum of squared difference greedily. One operation of k should use the index that has the current maximum difference.
3. Binary search the maximum difference for the final result.


**Similar Questions:**
1. [1818. Minimum Absolute Sum Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001818-minimum-absolute-sum-difference)
2. [2035. Partition Array Into Two Arrays to Minimize Sum Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002035-partition-array-into-two-arrays-to-minimize-sum-difference)


**Solution:**

We combine `k1` and `k2` into one total budget `K = k1 + k2`, because increasing `nums1[i]` by `1` and decreasing `nums2[i]` by `1` both reduce `abs(nums1[i] - nums2[i])` by `1`. We then binary search the smallest possible maximum remaining difference `m` after using at most `K` operations. Finally, we reduce all differences greater than `m` down to `m`, use any leftover operations to reduce some `m` values to `m - 1`, and compute the minimum sum of squares.

## Approach

- Compute `d[i] = abs(nums1[i] - nums2[i])` for every index.
- Let `K = k1 + k2`. The two modification budgets are interchangeable for reducing absolute differences.
- Binary search the target maximum difference `m` in `[0, max(d)]`.
- For a candidate `m`, the minimum operations needed to make every difference `<= m` is:
    - `sum(d[i] - m)` for all `d[i] > m`.
- If this cost is `<= K`, then `m` is feasible; otherwise, it is too small.
- After binary search, `m` is the smallest feasible maximum remaining difference.
- Compute the exact cost to reduce every `d[i] > m` down to `m`.
- Let `remain = K - cost`.
- Build the answer:
    - If `d[i] > m`, contribute `m²`.
    - Otherwise, contribute `d[i]²`.
- Each leftover operation can reduce one current difference from `m` to `m - 1`.
    - Decrease in square: `m² - (m - 1)² = 2m - 1`.
- Subtract `remain * (2m - 1)` from the answer.
- If `m == 0`, all differences can become zero, so return `0`.

Let's implement this solution in PHP: **[2333. Minimum Sum of Squared Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002333-minimum-sum-of-squared-difference/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @param Integer $k1
 * @param Integer $k2
 * @return Integer
 */
function minSumSquareDiff(array $nums1, array $nums2, int $k1, int $k2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minSumSquareDiff([1,2,3,4],[2,10,20,19],0,0) .  "\n";                  // Output: 579
echo minSumSquareDiff([1,4,10,12],[5,8,6,9],1,1) .  "\n";                   // Output: 43
echo minSumSquareDiff([1,1],[1,1],100,100) .  "\n";                         // Output: 0
echo minSumSquareDiff([1,2,3],[4,5,6],5,4) .  "\n";                         // Output: 0
echo minSumSquareDiff([0],[10],3,4) .  "\n";                                // Output: 9
echo minSumSquareDiff([0],[10],4,4) .  "\n";                                // Output: 4
echo minSumSquareDiff([100000],[0],1000000000,1000000000) .  "\n";          // Output: 0
?>
```

### Explanation:

- `k1` and `k2` are equivalent because changing either array by `±1` changes the absolute difference by `1`.
- For a fixed maximum allowed difference `m`, the cheapest way is to reduce only differences larger than `m`.
- The feasibility condition is monotonic:
    - Larger `m` requires fewer or equal operations.
    - Smaller `m` requires more operations.
- Therefore, binary search can find the smallest feasible `m`.
- After making all differences `<= m`, some operations may remain.
- Since `m` is the smallest feasible maximum, the leftover operations cannot reduce all remaining `m` values to `m - 1`.
- Instead, they reduce as many `m` values as possible by `1`, which is captured by `remain * (2m - 1)`.

## Complexity Analysis

- **Time Complexity:** `O(n log M)`, where `M = max(abs(nums1[i] - nums2[i]))`. Since `M <= 10⁵`, this is effectively `O(n log 10⁵)`.
- **Space Complexity:** `O(n)` for storing the absolute differences.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**