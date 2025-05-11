3191\. Minimum Operations to Make Binary Array Elements Equal to One I

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Queue`, `Sliding Window`, `Prefix Sum`

You are given a binary array[^1] nums.

You can do the following operation on the array **any** number of times (possibly zero):

- Choose **any** 3 **consecutive** elements from the array and **flip all** of them.

**Flipping** an element means changing its value from 0 to 1, and from 1 to 0.

Return _the **minimum** number of operations required to make all elements in `nums` equal to `1`_. If it is impossible, return _`-1`_.

**Example 1:**

- **Input:** nums = [0,1,1,1,0,0]
- **Output:** 3
- **Explanation:** We can do the following operations:
  - Choose the elements at indices 0, 1 and 2. The resulting array is `nums = [1,0,0,1,0,0]`.
  - Choose the elements at indices 1, 2 and 3. The resulting array is `nums = [1,1,1,0,0,0]`.
  - Choose the elements at indices 3, 4 and 5. The resulting array is `nums = [1,1,1,1,1,1]`.


**Example 2:**

- **Input:** nums = [0,1,1,1]
- **Output:** -1
- **Explanation:** It is impossible to make all elements equal to 1.



**Constraints:**

- <code>3 <= nums.length <= 10<sup>5</sup></code>
- `0 <= nums[i] <= 1`


**Hint:**
1. If `nums[0]` is 0, then the only way to change it to 1 is by doing an operation on the first 3 elements of the array.
2. After Changing `nums[0]` to 1, use the same logic on the remaining array.

[^1]: **Binary Array** `A binary array is an array which contains only 0 and 1`.


**Solution:**

We need to determine the minimum number of operations required to convert all elements of a binary array to 1 using the allowed operation of flipping any three consecutive elements. If it is impossible, we return -1.

### Approach
The key idea is to process the array from left to right, flipping three consecutive elements whenever we encounter a 0. Each flip operation affects the current element and the next two elements. We use a queue to track the positions where flips have been made and adjust our calculations based on the active flips affecting the current element. This ensures we efficiently compute the minimum number of flips required without redundant operations.

Let's implement this solution in PHP: **[3191. Minimum Operations to Make Binary Array Elements Equal to One I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003191-minimum-operations-to-make-binary-array-elements-equal-to-one-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minOperations($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
$nums1 = [0,1,1,1,0,0];
$nums2 = [0,1,1,1];

echo minOperations($nums1) . "\n"; // Output: 3
echo minOperations($nums2) . "\n"; // Output: -1
?>
```

### Explanation:

1. **Initialization**: We initialize a queue to keep track of the positions where flips have been made, a start index to efficiently track the active flips, and a counter for the number of operations.

2. **Processing Each Element**: For each element in the array:
   - **Adjust Active Flips**: Remove flips from the queue that no longer affect the current element using the start index.
   - **Compute Current Flips**: Determine the number of active flips affecting the current element using the queue size and start index.
   - **Check Current Bit**: Calculate the current bit value considering the active flips. If it is 0, check if we can flip the next three elements. If not possible (i.e., near the end of the array), return -1. Otherwise, record the flip and increment the operation count.

3. **Result**: After processing all elements, return the total number of operations required. If all elements are converted to 1, this count is the minimum number of operations. If any element remains 0, the result is -1.

This approach ensures we efficiently track and apply flips, leading to an optimal solution with linear time complexity O(n) and linear space complexity O(n) in the worst case.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**