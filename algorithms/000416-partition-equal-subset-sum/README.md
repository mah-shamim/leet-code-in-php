416\. Partition Equal Subset Sum

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

Given an integer array `nums`, return _`true` if you can partition the array into two subsets such that the sum of the elements in both subsets is equal or `false` otherwise_.

**Example 1:**

- **Input:** nums = [1,5,11,5]
- **Output:** true
- **Explanation:** The array can be partitioned as [1, 5, 5] and [11].

**Example 2:**

- **Input:** nums = [1,2,3,5]
- **Output:** false
- **Explanation:** The array cannot be partitioned into equal sum subsets.



**Constraints:**

- `1 <= nums.length <= 200`
- `1 <= nums[i] <= 100`




**Solution:**

We need to determine if a given integer array can be partitioned into two subsets such that the sum of the elements in both subsets is equal. This can be efficiently achieved using a dynamic programming approach.

### Approach
1. **Check Total Sum**: First, calculate the total sum of the array. If the sum is odd, it's impossible to split it into two equal parts, so return false immediately.
2. **Target Subset Sum**: If the total sum is even, each subset must sum to half of the total sum. We need to check if there exists a subset of the array that sums up to this target value.
3. **Dynamic Programming**: Use a dynamic programming (DP) approach to determine if a subset with the target sum exists. We maintain a boolean array `dp` where `dp[j]` indicates whether a subset with sum `j` can be formed. Initialize `dp[0]` to true because a sum of 0 is always possible. For each number in the array, update the `dp` array from the target sum down to the number's value to avoid reusing the same element multiple times.

Let's implement this solution in PHP: **[416. Partition Equal Subset Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000416-partition-equal-subset-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function canPartition($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
var_dump(canPartition([1, 5, 11, 5])); // true
var_dump(canPartition([1, 2, 3, 5]));  // false
?>
```

### Explanation:

1. **Initial Check**: The total sum of the array is calculated. If it's odd, return false immediately as it's impossible to split an odd sum into two equal parts.
2. **Target Calculation**: If the sum is even, compute the target sum as half of the total sum.
3. **DP Array Initialization**: Initialize a boolean array `dp` where `dp[j]` indicates if sum `j` can be formed. Initially, only `dp[0]` is true because a sum of 0 is always possible.
4. **Updating DP Array**: For each number in the array, update the `dp` array from the target sum down to the number's value. This ensures that each number is only considered once per iteration, preventing reuse in the same subset.
5. **Result Check**: Finally, check if `dp[target]` is true, indicating that a subset with the target sum exists.

This approach efficiently checks for the possibility of partitioning the array using dynamic programming, ensuring optimal time and space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**