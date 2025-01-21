962\. Maximum Width Ramp

**Difficulty:** Medium

**Topics:** `Array`, `Stack`, `Monotonic Stack`

A **ramp** in an integer array `nums` is a pair `(i, j)` for which `i < j` and `nums[i] <= nums[j]`. The **width** of such a ramp is `j - i`.

Given an integer array `nums`, return _the maximum width of a **ramp** in `nums`_. If there is no **ramp** in `nums`, return `0`.

**Example 1:**

- **Input:** nums = [6,0,8,2,1,5]
- **Output:** 4
- **Explanation:** The maximum width ramp is achieved at (i, j) = (1, 5): nums[1] = 0 and nums[5] = 5.

**Example 2:**

- **Input:** nums = [9,8,1,0,1,9,4,0,4,1]
- **Output:** 7
- **Explanation:** The maximum width ramp is achieved at (i, j) = (2, 9): nums[2] = 1 and nums[9] = 1.



**Constraints:**

- <code>2 <= nums.length <= 5 * 10<sup>4</sup></code>
- <code>0 <= nums[i] <= 5 * 10<sup>4</sup></code>


**Solution:**

We can leverage the concept of a **monotonic stack**. Here's the solution and explanation:

### Approach:
1. **Monotonic Decreasing Stack**: We create a stack that keeps track of indices of elements in a way such that `nums[stack[i]]` is in a decreasing order. This allows us to later find pairs `(i, j)` where `nums[i] <= nums[j]`.
2. **Traverse from the End**: After creating the stack, we traverse the array from the end (`j` from `n-1` to `0`) to try and find the farthest `i` for each `j` where `nums[i] <= nums[j]`.
3. **Update the Maximum Width**: Whenever `nums[i] <= nums[j]` holds for the current top of the stack, calculate the ramp width `j - i` and update the maximum width if it's larger.

Let's implement this solution in PHP: **[962. Maximum Width Ramp](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000962-maximum-width-ramp/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxWidthRamp($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [6, 0, 8, 2, 1, 5];
echo maxWidthRamp($nums);  // Output: 4

// Example 2
$nums = [9, 8, 1, 0, 1, 9, 4, 0, 4, 1];
echo maxWidthRamp($nums);  // Output: 7
?>
```

### Explanation:

1. **Create a Decreasing Stack**:
   - Iterate through the array and add indices to the stack.
   - Only add an index if it corresponds to a value that is less than or equal to the value of the last index in the stack. This ensures that values in the stack are in a decreasing order.

2. **Traverse from the End**:
   - As we go backward through the array, for each `j`, pop indices `i` from the stack as long as `nums[i] <= nums[j]`.
   - Calculate the width `j - i` and update `maxWidth`.

3. **Why This Works**:
   - By maintaining a decreasing stack of indices, we ensure that when we encounter a `j` with a larger value, it can give us a larger width `j - i` when `i` is popped from the stack.

4. **Time Complexity**:
   - Building the stack takes `O(n)` time since each index is pushed once.
   - The traversal from the end and popping indices also takes `O(n)` since each index is popped at most once.
   - Overall, the solution runs in `O(n)` time, which is efficient for input size up to `5 * 10^4`.

### Output:
- For `nums = [6, 0, 8, 2, 1, 5]`, the output is `4`, corresponding to the ramp `(1, 5)`.
- For `nums = [9, 8, 1, 0, 1, 9, 4, 0, 4, 1]`, the output is `7`, corresponding to the ramp `(2, 9)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
