3637\. Trionic Array I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Weekly Contest 461`

You are given an integer array `nums` of length `n`.

An array is trionic if there exist indices `0 < p < q < n − 1` such that:
- `nums[0...p]` is **strictly** increasing,
- `nums[p...q]` is **strictly** decreasing,
- `nums[q...n − 1]` is **strictly** increasing.

Return `true` if `nums` is trionic, otherwise return `false`.

**Example 1:**

- **Input:** nums = [1,3,5,4,2,6]
- **Output:** true
- **Explanation:** Pick `p = 2`, `q = 4`:
    - `nums[0...2] = [1, 3, 5]` is strictly increasing (`1 < 3 < 5`).
    - `nums[2...4] = [5, 4, 2]` is strictly decreasing (`5 > 4 > 2`).
    - `nums[4...5] = [2, 6]` is strictly increasing (`2 < 6`).


**Example 2:**

- **Input:** nums = [2,1,3]
- **Output:** false
- **Explanation:** There is no way to pick `p` and `q` to form the required three segments.

**Constraints:**

- `3 <= n <= 100`
- `-1000 <= nums[i] <= 1000`



**Hint:**
1. Use brute force






**Solution:**

We need to check if there exist indices `p` and `q` that split the array into three strictly monotonic segments. Let me analyze this carefully.

## Understanding the Problem

The array should be:
1. Strictly increasing from index 0 to `p` (inclusive)
2. Strictly decreasing from index `p` to `q` (inclusive)
3. Strictly increasing from index `q` to `n-1` (inclusive)

Constraints: `0 < p < q < n-1`

## Approach

Since the constraints are small (n ≤ 100), a brute force approach is feasible:
1. Try all possible `p` values (from 1 to n-3)
2. For each `p`, try all possible `q` values (from p+1 to n-2)
3. Check if all three segments satisfy the monotonic conditions

Let's implement this solution in PHP: **[3637. Trionic Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003637-trionic-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function isTrionic(array $nums): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1, 3, 5, 4, 2, 6];
echo isTrionic($nums1) ? "true\n" : "false\n"; // Output: true

$nums2 = [2, 1, 3];
echo isTrionic($nums2) ? "true\n" : "false\n"; // Output: false
?>
```

### Explanation:

1. **Longest Non-Decreasing Prefix and Suffix**:
   - The prefix is determined by traversing the array from the start until elements are in non-decreasing order.
   - Similarly, the suffix is determined by traversing from the end.

2. **Initial Minimum Removal**:
   - Calculate the removal length by keeping only the prefix or the suffix.

3. **Merging Prefix and Suffix**:
   - Use two pointers (`i` for prefix and `j` for suffix) to find the smallest subarray to remove such that the last element of the prefix is less than or equal to the first element of the suffix.

4. **Return Result**:
   - The result is the minimum length of the subarray to remove, calculated as the smaller of the initial removal or the merging of prefix and suffix.

### Complexity
- **Time Complexity**: O(n³) in the worst case, but with n ≤ 100, this is acceptable (100³ = 1,000,000 operations)
- **Space Complexity**: O(1) - we only use a few variables

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**