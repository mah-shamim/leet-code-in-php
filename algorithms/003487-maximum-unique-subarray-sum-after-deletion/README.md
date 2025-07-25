3487\. Maximum Unique Subarray Sum After Deletion

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Greedy`, `Weekly Contest 441`

You are given an integer array `nums`.

You are allowed to delete any number of elements from `nums` without making it **empty**. After performing the deletions, select a subarray[^1] of `nums` such that:

1. All elements in the subarray are **unique**.
2. The sum of the elements in the subarray is **maximized**.

Return _the **maximum sum** of such a subarray_.

**Example 1:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 15
- **Explanation:** Select the entire array without deleting any element to obtain the maximum sum.

**Example 2:**

- **Input:** nums = [1,1,0,1,1]
- **Output:** 1
- **Explanation:** Delete the element `nums[0] == 1`, `nums[1] == 1`, `nums[2] == 0`, and `nums[3] == 1`. Select the entire array `[1]` to obtain the maximum sum.

**Example 3:**

- **Input:** nums = [1,2,-1,-2,1,0,-1]
- **Output:** 3
- **Explanation:** Delete the elements `nums[2] == -1` and `nums[3] == -2`, and select the subarray `[2, 1]` from `[1, 2, 1, 0, -1]` to obtain the maximum sum.

**Constraints:**

- `1 <= nums.length <= 100`
- `-100 <= nums[i] <= 100`


**Hint:**
1. If the maximum element in the array is less than zero, the answer is the maximum element.
2. Otherwise, the answer is the sum of all unique values that are greater than or equal to zero.


**Similar Questions:**
1. [1186. Maximum Subarray Sum with One Deletion](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001186-maximum-subarray-sum-with-one-deletion)



[^1]: **Subarray:** A **subarray** is a contiguous non-empty sequence of elements within an array.


**Solution:**

We need to find the maximum sum of a contiguous subarray after deleting any number of elements (without making the array empty) such that all elements in the subarray are unique. The solution leverages the observation that if the maximum element in the array is negative, the answer is simply that maximum element. Otherwise, the solution involves summing all distinct non-negative elements in the array, as these can always be arranged into a contiguous subarray with unique elements after appropriate deletions.

### Approach
1. **Check for All Negative Elements**: If the maximum element in the array is negative, the solution is that maximum element since any subarray containing it would not yield a higher sum.
2. **Sum Distinct Non-Negative Elements**: If there are non-negative elements, sum all distinct non-negative elements. This works because:
    - We can delete all negative elements and duplicates of non-negative elements, leaving only distinct non-negative elements.
    - The remaining elements, when maintained in their original order, form a contiguous subarray in the modified array (after deletions), and their sum is maximized by including all distinct non-negative elements.

Let's implement this solution in PHP: **[3487. Maximum Unique Subarray Sum After Deletion](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003487-maximum-unique-subarray-sum-after-deletion/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSum([1, 2, 3, 4, 5]) . "\n";         // Output: 15
echo maxSum([1, 1, 0, 1, 1]) . "\n";         // Output: 1
echo maxSum([1, 2, -1, -2, 1, 0, -1]) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Finding Maximum Value**: The code first checks the maximum value in the array. If this value is negative, it returns it immediately since any subarray will have a sum less than or equal to this value.
2. **Summing Distinct Non-Negative Elements**: If there are non-negative elements, the code iterates through the array, adding each non-negative element to a set (to ensure uniqueness) and summing them. This sum represents the maximum possible sum of a contiguous subarray with unique elements after deleting any necessary elements (negatives and duplicates).
3. **Efficiency**: The algorithm efficiently processes the array in O(n) time, where n is the number of elements, by leveraging a set for O(1) lookups. The space complexity is O(n) in the worst case to store distinct non-negative elements.

This approach efficiently maximizes the subarray sum by leveraging the properties of distinct non-negative elements and their contiguity after deletions, providing an optimal solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**