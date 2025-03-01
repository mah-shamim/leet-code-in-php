2460\. Apply Operations to an Array

**Difficulty:** Easy

**Topics:** `Array`, `Two Pointers`, `Simulation`

You are given a **0-indexed** array nums of size `n` consisting of **non-negative** integers.

You need to apply `n - 1` operations to this array where, in the ith operation (**0-indexed**), you will apply the following on the ith element of `nums`:

- If `nums[i] == nums[i + 1]`, then multiply `nums[i]` by `2` and set `nums[i + 1]` to `0`. Otherwise, you skip this operation.

After performing **all** the operations, **shift** all the `0`'s to the end of the array.

- For example, the array `[1,0,2,0,0,1]` after shifting all its `0`'s to the end, is `[1,2,1,0,0,0]`.

Return _the resulting array_.

**Note** that the operations are applied **sequentially**, not all at once.

**Example 1:**

- **Input:** nums = [1,2,2,1,1,0]
- **Output:** [1,4,2,0,0,0]
- **Explanation:** We do the following operations:
  - i = 0: nums[0] and nums[1] are not equal, so we skip this operation.
  - i = 1: nums[1] and nums[2] are equal, we multiply nums[1] by 2 and change nums[2] to 0. The array becomes [1,4,0,1,1,0].
  - i = 2: nums[2] and nums[3] are not equal, so we skip this operation.
  - i = 3: nums[3] and nums[4] are equal, we multiply nums[3] by 2 and change nums[4] to 0. The array becomes [1,4,0,2,0,0].
  - i = 4: nums[4] and nums[5] are equal, we multiply nums[4] by 2 and change nums[5] to 0. The array becomes [1,4,0,2,0,0].
    After that, we shift the 0's to the end, which gives the array [1,4,2,0,0,0].

**Example 2:**

- **Input:** nums = [0,1]
- **Output:** [1,0]
- **Explanation:** No operation can be applied, we just shift the 0 to the end.



**Constraints:**

- `2 <= nums.length <= 2000`
- `0 <= nums[i] <= 1000`


**Hint:**
1. Iterate over the array and simulate the described process.



**Solution:**

We need to apply a series of operations on an array of non-negative integers and then shift all zeros to the end of the array. The operations are applied sequentially, and each operation affects subsequent steps. Let's break down the approach and solution step-by-step.

### Approach

1. **Apply Operations Sequentially**:
   - Iterate through the array from the first element to the second-to-last element.
   - For each element, check if it is equal to the next element. If they are equal, multiply the current element by 2 and set the next element to 0.
   - This step modifies the array in place, affecting subsequent operations.

2. **Shift Zeros to the End**:
   - After applying all operations, collect all non-zero elements in their original order.
   - Append the required number of zeros to the end of the collected non-zero elements to maintain the original array length.

Let's implement this solution in PHP: **[2460. Apply Operations to an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002460-apply-operations-to-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function applyOperations($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
$nums1 = [1,2,2,1,1,0];
$nums2 = [0,1];

print_r(applyOperations($nums1)); // Output: [1, 4, 2, 0, 0, 0]
print_r(applyOperations($nums2)); // Output: [1, 0]
?>
```

### Explanation:

1. **Applying Operations**:
   - We loop through each element from index 0 to the second-to-last element. For each element, if it is equal to the next element, we double the current element and set the next element to 0. This ensures that the operations are applied in sequence, modifying the array as we go.

2. **Shifting Zeros**:
   - After processing all operations, we create a new array to collect non-zero elements. This helps in maintaining the order of non-zero elements while efficiently moving zeros to the end.
   - We then append zeros to the end of the collected non-zero elements to match the original array's length, ensuring all zeros are shifted to the end.

This approach efficiently handles the operations and shifting in linear time, making it optimal for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**