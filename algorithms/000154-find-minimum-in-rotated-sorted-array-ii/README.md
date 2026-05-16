154\. Find Minimum in Rotated Sorted Array II

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`

Suppose an array of length `n` sorted in ascending order is **rotated** between `1` and `n` times. For example, the array `nums = [0,1,4,4,5,6,7]` might become:

- `[4,5,6,7,0,1,4]` if it was rotated `4` times.
- `[0,1,4,4,5,6,7]` if it was rotated `7` times.

Notice that **rotating** an array `[a[0], a[1], a[2], ..., a[n-1]]` 1 time results in the array `[a[n-1], a[0], a[1], a[2], ..., a[n-2]]`.

Given the sorted rotated array `nums` that may contain **duplicates**, return _the minimum element of this array_.

You must decrease the overall operation steps as much as possible.

**Example 1:**

- **Input:** nums = [1,3,5]
- **Output:** 1

**Example 2:**

- **Input:** nums = [2,2,2,0,1]
- **Output:** 0

**Constraints:**

- `n == nums.length`
- `1 <= n <= 5000`
- `-5000 <= nums[i] <= 5000`
- `nums` is sorted and rotated between `1` and `n` times.



**Follow up:** This problem is similar to [Find Minimum in Rotated Sorted Array](https://leetcode.com/problems/find-minimum-in-rotated-sorted-array/description/), but `nums` may contain **duplicates**. Would this affect the runtime complexity? How and why?



**Similar Questions:**
1. [153. Find Minimum in Rotated Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000153-find-minimum-in-rotated-sorted-array)






**Solution:**

This solution uses a modified **binary search** to find the minimum element in a rotated sorted array that may contain duplicates.  
Unlike the standard version (Leetcode 153), duplicate values can appear anywhere in the array, which can make it impossible to determine which half contains the minimum using a simple comparison of `nums[mid]` and `nums[high]`.  
The algorithm handles this by reducing the search space when a tie occurs between `nums[mid]` and `nums[high]`.

### Approach:

- **Binary Search with Duplicate Handling** Use two pointers `low` and `high` to define the current search range.
- **Compare `nums[mid]` and `nums[high]`**
   - If `nums[mid] > nums[high]`: Minimum is in the right half → move `low` to `mid + 1`.
   - If `nums[mid] < nums[high]`: Minimum is in the left half → move `high` to `mid`.
   - If `nums[mid] == nums[high]`: Cannot decide, so reduce `high` by 1 to remove a duplicate from consideration.
- **Terminate when `low == high`** At that point, `nums[low]` is the minimum.

Let's implement this solution in PHP: **[154. Find Minimum in Rotated Sorted Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000154-find-minimum-in-rotated-sorted-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findMin(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findMin([1,3,5]) . "\n";               // Output: 1
echo findMin([2,2,2,0,1]) . "\n";           // Output: 0
?>
```

### Explanation:

- **Binary search** is efficient for sorted rotated arrays, but duplicates can break the deterministic half-elimination.
- When `nums[mid] > nums[high]`, the array is rotated such that the minimum lies strictly to the right of `mid`.
- When `nums[mid] < nums[high]`, the segment from `mid` to `high` is properly sorted, so the minimum must be at or before `mid`.
- When `nums[mid] == nums[high]`, we can't tell if the minimum is left or right — but since `nums[mid]` equals `nums[high]`, we can safely shrink the range by ignoring `high`.
- This approach still works in **O(log n)** on average, but degrades to **O(n)** in worst case (e.g., when all elements are equal).

### Complexity
- **Time Complexity**:
   - Average: **O(log n)**
   - Worst case (all elements equal): **O(n)**
- **Space Complexity**: _**O(1)**_ — only a few variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**