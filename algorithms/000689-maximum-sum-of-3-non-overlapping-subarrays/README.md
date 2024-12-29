689\. Maximum Sum of 3 Non-Overlapping Subarrays

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`

Given an integer array `nums` and an integer `k`, find three non-overlapping subarrays of length `k` with maximum sum and return them.

Return _the result as a list of indices representing the starting position of each interval (**0-indexed**)_. If there are multiple answers, return _the lexicographically smallest one_.

**Example 1:**

- **Input:** nums = [1,2,1,2,6,7,5,1], k = 2
- **Output:** [0,3,5]
- **Explanation:** Subarrays [1, 2], [2, 6], [7, 5] correspond to the starting indices [0, 3, 5].
  We could have also taken [2, 1], but an answer of [1, 3, 5] would be lexicographically larger.

**Example 2:**

- **Input:** nums = [1,2,1,2,1,2,1,2,1], k = 2
- **Output:** [0,2,4]



**Constraints:**


- <code>1 <= nums.length <= 2 * 10<sup>4</sup></code>
- <code>1 <= nums[i] < 2<sup>16</sup></code>
- `1 <= k <= floor(nums.length / 3)`


**Solution:**

We will use a dynamic programming approach. The idea is to break down the problem into smaller subproblems, leveraging the overlap of subarrays to efficiently calculate the maximum sum of three non-overlapping subarrays of length `k`.

### Approach:

1. **Precompute the sums of subarrays of length `k`:**
   First, we compute the sum of all subarrays of length `k` in the input array `nums`. This can be done efficiently in linear time by using a sliding window technique.

2. **Dynamic Programming (DP):**
   We create two auxiliary arrays, `left` and `right`, to store the indices of the best subarrays found up to the current position. The `left[i]` will store the index of the best subarray ending before index `i`, and `right[i]` will store the index of the best subarray starting after index `i`.

3. **Iterate and Calculate the Maximum Sum:**
   For each possible middle subarray starting at index `j`, we calculate the total sum by considering the best left subarray before `j` and the best right subarray after `j`.

4. **Lexicographical Ordering:**
   If there are multiple valid answers (with the same sum), we return the lexicographically smallest one. This is ensured by the order of iteration.

Let's implement this solution in PHP: **[689. Maximum Sum of 3 Non-Overlapping Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000689-maximum-sum-of-3-non-overlapping-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function maxSumOfThreeSubarrays($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(maxSumOfThreeSubarrays([1,2,1,2,6,7,5,1], 2)); // [0, 3, 5]
print_r(maxSumOfThreeSubarrays([1,2,1,2,1,2,1,2,1], 2)); // [0, 2, 4]
?>
```

### Explanation:

1. **Subarray Sums Calculation:**
   - We calculate the sum of all possible subarrays of length `k`. This is done by first calculating the sum of the first `k` elements. Then, for each subsequent position, we subtract the element that is left behind and add the next element in the array, making it an efficient sliding window approach.

2. **Left and Right Arrays:**
   - `left[i]` holds the index of the subarray with the maximum sum that ends before index `i`.
   - `right[i]` holds the index of the subarray with the maximum sum that starts after index `i`.

3. **Final Calculation:**
   - For each middle subarray `j`, we check the combination of the best left subarray and the best right subarray, and update the result if the sum is greater than the current maximum.

4. **Lexicographically Smallest Answer:**
   - As we iterate from left to right, we ensure the lexicographically smallest solution by naturally choosing the first subarrays that yield the maximum sum.

### Example:

For the input:
```php
$nums = [1, 2, 1, 2, 6, 7, 5, 1];
$k = 2;
```

The output will be:
```php
[0, 3, 5]
```

This approach ensures that the time complexity remains efficient, with a time complexity of approximately O(n), where `n` is the length of the input array `nums`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
