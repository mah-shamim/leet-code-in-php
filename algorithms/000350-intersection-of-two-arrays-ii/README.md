350\. Intersection of Two Arrays II

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Two Pointers`, `Binary Search`, `Sorting`

Given two integer arrays `nums1` and `nums2`, return _an array of their intersection_. Each element in the result must appear as many times as it shows in both arrays, and you may return the result in **any order**.

**Example 1:**

- **Input:** nums1 = [1,2,2,1], nums2 = [2,2]
- **Output:** [2,2]

**Example 2:**

- **Input:** nums1 = [4,9,5], nums2 = [9,4,9,8,4]
- **Output:** [4,9]
- **Explanation:** [9,4] is also accepted.

**Constraints:**

- <code>1 <= nums1.length, nums2.length <= 1000</code>
- <code>0 <= nums1[i], nums2[i] <= 1000</code>

**Follow up:**

- What if the given array is already sorted? How would you optimize your algorithm?
- What if nums1's size is small compared to nums2's size? Which algorithm is better?
- What if elements of nums2 are stored on disk, and the memory is limited such that you cannot load all elements into the memory at once?


**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[350. Intersection of Two Arrays II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000350-intersection-of-two-arrays-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
function intersect($nums1, $nums2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
// Example usage:
$nums1 = [1, 2, 2, 1];
$nums2 = [2, 2];
print_r(intersect($nums1, $nums2)); //Output: [2,2]

$nums1 = [4, 9, 5];
$nums2 = [9, 4, 9, 8, 4];
print_r(intersect($nums1, $nums2)); //Output: [4,9]
?>
```

### Explanation:

1. **Counting Occurrences**: The solution uses a hash table (`$counts`) to store the count of each number in `nums1`.

2. **Finding the Intersection**: As we iterate through `nums2`, we check if the current number exists in the `$counts` array and has a non-zero count. If so, it's added to the result array, and we decrement the count for that number in `$counts`.

3. **Output**:
    - For the first example, the output will be `[2, 2]`.
    - For the second example, the output could be `[4, 9]` or `[9, 4]`, as the order does not matter.

### Follow-Up Considerations:
1. **Sorted Arrays**: If `nums1` and `nums2` are already sorted, you can use two pointers to traverse both arrays and find the intersection in a single pass.

2. **Small `nums1` Compared to `nums2`**: If `nums1` is smaller, store its elements in a hash table and then iterate through `nums2` to find the intersection. This minimizes the space complexity.

3. **Handling Large `nums2` on Disk**: If `nums2` is too large to fit into memory, you can either:
    - Sort `nums2` and use a binary search for each element in `nums1`.
    - Process `nums2` in chunks, updating the hash table for the intersection on the fly.

This approach is efficient for the given problem constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


