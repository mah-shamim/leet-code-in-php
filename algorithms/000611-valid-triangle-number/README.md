611\. Valid Triangle Number

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Greedy`, `Sorting`

Given an integer array `nums`, return _the number of triplets chosen from the array that can make triangles if we take them as side lengths of a triangle_.

**Example 1:**

- **Input:** nums = [2,2,3,4]
- **Output:** 3
- **Explanation:** Valid combinations are:
  2,3,4 (using the first 2)
  2,3,4 (using the second 2)
  2,2,3

**Example 2:**

- **Input:** nums = [4,2,3,4]
- **Output:** 4

**Constraints:**

- `1 <= nums.length <= 1000`
- `0 <= nums[i] <= 1000`



**Similar Questions:**
1. [259. 3Sum Smaller](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000259-3sum-smaller)
2. [2971. Find Polygon With the Largest Perimeter](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002971-find-polygon-with-the-largest-perimeter)






**Solution:**

We need to find the number of triplets in an array that can form a triangle. The key property of a triangle is that the sum of any two sides must be greater than the third side.

### Approach
1. **Sort the Array**: Sorting helps in efficiently checking the triangle condition. After sorting, we can fix the largest side and then check for pairs of smaller sides that satisfy the triangle inequality.
2. **Two Pointers Technique**: For each element as the potential largest side (starting from the end of the sorted array), use two pointers to find pairs of smaller sides such that their sum is greater than the largest side. If such a pair is found, all elements between the two pointers will also satisfy the condition (due to the sorted order), allowing us to count all valid triplets efficiently.

Let's implement this solution in PHP: **[611. Valid Triangle Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000611-valid-triangle-number/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function triangleNumber($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums1 = [2, 2, 3, 4];
echo triangleNumber($nums1) . "\n"; // Output: 3

// Example 2
$nums2 = [4, 2, 3, 4];
echo triangleNumber($nums2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Sorting**: The array is sorted first to facilitate the two-pointer technique.
2. **Iterate from the End**: Starting from the largest element (index `k`), we check pairs of elements from the start (index `i`) and just before `k` (index `j`).
3. **Check Triangle Condition**: If the sum of elements at `i` and `j` is greater than the element at `k`, then all elements between `i` and `j-1` will also satisfy the condition with `j` and `k`. This allows us to add `(j - i)` to the count and decrement `j` to check the next smaller pair.
4. **Adjust Pointers**: If the sum is not greater, we increment `i` to consider a larger smallest element.

This approach efficiently narrows down the valid triplets by leveraging the sorted property and the two-pointer technique, ensuring an optimal solution with a time complexity of O(n²) due to the nested loops, which is efficient given the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**