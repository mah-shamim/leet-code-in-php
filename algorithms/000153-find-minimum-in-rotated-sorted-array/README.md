153\. Find Minimum in Rotated Sorted Array

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

Suppose an array of length `n` sorted in ascending order is **rotated** between `1` and `n` times. For example, the array `nums = [0,1,2,4,5,6,7]` might become:

- `[4,5,6,7,0,1,2]` if it was rotated `4` times.
- `[0,1,2,4,5,6,7]` if it was rotated `7` times.

Notice that **rotating** an array `[a[0], a[1], a[2], ..., a[n-1]]` 1 time results in the array `[a[n-1], a[0], a[1], a[2], ..., a[n-2]]`.

Given the sorted rotated array `nums` of **unique** elements, return _the minimum element of this array_.

You must write an algorithm that runs in `O(log n) time`.

**Example 1:**

- **Input:** nums = [3,4,5,1,2]
- **Output:** 1
- **Explanation:** The original array was [1,2,3,4,5] rotated 3 times.

**Example 2:**

- **Input:** nums = [4,5,6,7,0,1,2]
- **Output:** 0
- **Explanation:** The original array was [0,1,2,4,5,6,7] and it was rotated 4 times.

**Example 3:**

- **Input:** nums = [11,13,15,17]
- **Output:** 11
- **Explanation:** The original array was [11,13,15,17] and it was rotated 4 times.

**Constraints:**

- `n == nums.length`
- `1 <= n <= 5000`
- `-5000 <= nums[i] <= 5000`
- All the integers of `nums` are **unique**.
- `nums` is sorted and rotated between `1` and `n` times.



**Hint:**
1. Array was originally in ascending order. Now that the array is rotated, there would be a point in the array where there is a small deflection from the increasing sequence. eg. The array would be something like [4, 5, 6, 7, 0, 1, 2].
2. You can divide the search space into two and see which direction to go. Can you think of an algorithm which has O(logN) search complexity?
3. All the elements to the left of inflection point > first element of the array.
4. All the elements to the right of inflection point < first element of the array.



**Similar Questions:**
1. [33. Search in Rotated Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000033-search-in-rotated-sorted-array)
2. [154. Find Minimum in Rotated Sorted Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000154-find-minimum-in-rotated-sorted-array-ii)






**Solution:**

This solution finds the minimum element in a rotated sorted array of unique integers using **binary search** in **O(log n)** time.  
It compares the middle element with the rightmost element to decide whether the minimum lies in the left or right half.

### Approach:

- **Binary search on rotated sorted array** Use `left` and `right` pointers, compute `mid`, and compare `nums[mid]` with `nums[right]`.
- **If `nums[mid] > nums[right]`** The smallest element must be in the right half, so move `left` to `mid + 1`.
- **If `nums[mid] <= nums[right]`** The smallest element is in the left half (including `mid`), so move `right` to `mid`.
- **Terminate when `left == right`** That position holds the minimum.

Let's implement this solution in PHP: **[153. Find Minimum in Rotated Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000153-find-minimum-in-rotated-sorted-array/solution.php)**

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
echo findMin([3,4,5,1,2]) . "\n";                   // Output: 1
echo findMin([4,5,6,7,0,1,2]) . "\n";               // Output: 0
echo findMin([11,13,15,17]) . "\n";                 // Output: 11
?>
```

### Explanation:

- The array is a sorted array that has been rotated, so it consists of two increasing segments:  
  `[large increasing part, small increasing part]`.
- The minimum is the start of the second segment.
- Comparing `mid` with `right` helps determine which segment `mid` lies in:
   - If `mid` > `right`, then `mid` is in the first larger segment, so min is to the right.
   - If `mid` <= `right`, then `mid` is in the second smaller segment or the right part, so min is to the left or at `mid`.
- This comparison works because all elements are unique and sorted, so no ambiguity.
- The loop ends when the search space narrows to one element — the minimum.

### Complexity
- **Time Complexity**: _**O(log n)**_ — each step halves the search space.
- **Space Complexity**: _**O(1)**_ — only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**