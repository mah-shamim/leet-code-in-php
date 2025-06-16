2016\. Maximum Difference Between Increasing Elements

**Difficulty:** Easy

**Topics:** `Array`

Given a **0-indexed** integer array nums of size `n`, find the **maximum difference** between `nums[i]` and `nums[j]` (i.e., `nums[j] - nums[i]`), such that `0 <= i < j < n` and `nums[i] < nums[j]`.

Return the **maximum difference**. If no such `i` and `j` exists, return `-1`.

**Example 1:**

- **Input:** nums = [7,<ins>1</ins>,<ins>5</ins>,4]
- **Output:** 4
- **Explanation:**
  The maximum difference occurs with i = 1 and j = 2, nums[j] - nums[i] = 5 - 1 = 4.
  Note that with i = 1 and j = 0, the difference nums[j] - nums[i] = 7 - 1 = 6, but i > j, so it is not valid.

**Example 2:**

- **Input:** nums = [9,4,3,2]
- **Output:** -1
- **Explanation:** There is no i and j such that i < j and nums[i] < nums[j].

**Example 3:**

- **Input:** nums = [<ins>1</ins>,5,2,<ins>10</ins>]
- **Output:** 9
- **Explanation:** The maximum difference occurs with i = 0 and j = 3, nums[j] - nums[i] = 10 - 1 = 9.

**Constraints:**

- `n == nums.length`
- `2 <= n <= 1000`
- <code>1 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. Could you keep track of the minimum element visited while traversing?
2. We have a potential candidate for the answer if the prefix min is lesser than nums[i].






**Solution:**

We need to find the maximum difference between two elements in an array such that the smaller element appears before the larger element. If no such pair exists, we should return -1.

### Approach
1. **Initialization**: Start by initializing the minimum element encountered so far as the first element of the array. Also, initialize the maximum difference as -1, indicating no valid pair has been found yet.
2. **Iterate through the array**: For each subsequent element in the array:
   - **Check for Valid Pair**: If the current element is greater than the minimum element encountered so far, calculate the difference between the current element and the minimum element. Update the maximum difference if this difference is larger than the current maximum.
   - **Update Minimum Element**: If the current element is smaller than the minimum element encountered so far, update the minimum element. This ensures that for subsequent elements, we have the smallest possible element up to the current index, which helps in maximizing the difference.
3. **Return Result**: After processing all elements, return the maximum difference found. If no valid pair was found, return -1.

This approach efficiently tracks the smallest element encountered so far and checks each subsequent element to see if it forms a larger difference with this smallest element. The algorithm runs in linear time, O(n), where n is the number of elements in the array, as it processes each element exactly once. The space complexity is O(1) since only a few variables are used.

Let's implement this solution in PHP: **[2016. Maximum Difference Between Increasing Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002016-maximum-difference-between-increasing-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumDifference($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example tests
echo maximumDifference([7, 1, 5, 4]) . "\n";     // Output: 4
echo maximumDifference([9, 4, 3, 2]) . "\n";     // Output: -1
echo maximumDifference([1, 5, 2, 10]) . "\n";    // Output: 9
?>
```

### Explanation:

- **Initialization**: The variable `$min_so_far` is set to the first element of the array, and `$max_diff` is initialized to -1.
- **Loop Through Array**: Starting from the second element (index 1), the algorithm checks if the current element is greater than `$min_so_far`. If it is, the difference between the current element and `$min_so_far` is calculated. If this difference is larger than the current `$max_diff`, `$max_diff` is updated.
- **Update Minimum**: If the current element is smaller than `$min_so_far`, `$min_so_far` is updated to this element. This ensures that future elements have the smallest possible value up to that point for calculating differences.
- **Result**: After processing all elements, `$max_diff` is returned. If no valid pair was found during the iteration, `$max_diff` remains -1, indicating no such pair exists.

This approach efficiently finds the maximum difference by maintaining the smallest element encountered so far and leveraging it to compute potential differences with subsequent elements, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**