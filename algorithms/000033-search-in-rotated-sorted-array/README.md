33\. Search in Rotated Sorted Array

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

There is an integer array `nums` sorted in ascending order (with **distinct** values).

Prior to being passed to your function, `nums` is **possibly left rotated** at an unknown index `k` (`1 <= k < nums.length`) such that the resulting array is `[nums[k], nums[k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]]` (**0-indexed**). For example, `[0,1,2,4,5,6,7]` might be left rotated by `3` indices and become `[4,5,6,7,0,1,2]`.

Given the array `nums` **after** the possible rotation and an integer `target`, return _the index of `target` if it is in `nums`, or `-1` if it is not in `nums`_.

You must write an algorithm with `O(log n)` runtime complexity.

**Example 1:**

- **Input:** nums = [4,5,6,7,0,1,2], target = 0
- **Output:** 4

**Example 2:**

- **Input:** n = nums = [4,5,6,7,0,1,2], target = 3
- **Output:** -1

**Example 3:**

- **Input:** nums = [1], target = 0
- **Output:** -1

**Constraints:**

- `1 <= nums.length <= 5000`
- `-10⁴ <= nums[i] <= 10⁴`
- All values of `nums` **are unique**.
- `nums` is an ascending array that is possibly rotated.
- `-10⁴ <= target <= 10⁴`



**Similar Questions:**
1. [81. Search in Rotated Sorted Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000081-search-in-rotated-sorted-array-ii)
2. [153. Find Minimum in Rotated Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000153-find-minimum-in-rotated-sorted-array)
3. [2137. Pour Water Between Buckets to Make Water Levels Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002137-pour-water-between-buckets-to-make-water-levels-equal)






**Solution:**

We have an array that is sorted, then possibly rotated. We need to search for a target in **O(log n)** time.
A regular binary search would fail because the array isn’t monotonic globally, but **it is monotonic in two segments**.

The trick:
1. Find the pivot (smallest element) — but actually, we can combine pivot search and target search in one pass.
2. In each binary search step, we check whether the **left half** is sorted or the **right half** is sorted, then determine if `target` belongs there.

### Approach:

- Use **binary search** with two pointers: `low` and `high`.
- At each step, compute the middle index.
- Check if the target is at the middle → return index.
- Determine whether the **left half** (from `low` to `mid`) is sorted.
- If left half is sorted, check if the target lies in that range, else search the right half.
- If left half is not sorted, the right half must be sorted; check if target lies in that range.
- Repeat until found or search space exhausted.

Let's implement this solution in PHP: **[33. Search in Rotated Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000033-search-in-rotated-sorted-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function search(array $nums, int $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo search([4,5,6,7,0,1,2], 0) . "\n";             // Output: 4
echo search([4,5,6,7,0,1,2], 3) . "\n";             // Output: -1
echo search([1], 0) . "\n";                         // Output: -1
?>
```

### Explanation:

- **Binary search framework** is used, but we cannot simply compare `target` with `nums[mid]` as in a normal sorted array, because the array is rotated.
- **Identify the sorted part** of the array at each step:
   - If `nums[low] <= nums[mid]`, the left part is sorted.
   - Else, the right part is sorted.
- **Search in sorted half**:
   - If left part is sorted and `target` is between `nums[low]` and `nums[mid]` (inclusive at `low`, exclusive at `mid`), search left.
   - If right part is sorted and `target` is between `nums[mid]` and `nums[high]`, search right.
- Otherwise, search the other half.
- Continue until found or pointers cross → return -1.

### Complexity
- **Time Complexity**: _**O(log n)**_ — each step halves the search space.
- **Space Complexity**: _**O(1)**_ — only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**