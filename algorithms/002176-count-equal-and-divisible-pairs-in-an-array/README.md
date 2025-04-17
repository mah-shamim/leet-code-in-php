2176\. Count Equal and Divisible Pairs in an Array

**Difficulty:** Easy

**Topics:** `Array`

Given a **0-indexed** integer array `nums` of length `n` and an integer `k`, return the number of pairs `(i, j)` where `0 <= i < j < n`, such that `nums[i] == nums[j]` and `(i * j)` is divisible by `k`.

**Example 1:**

- **Input:** nums = [3,1,2,2,2,1,3], k = 2
- **Output:** 4
- **Explanation:**   There are 4 pairs that meet all the requirements:
  - nums[0] == nums[6], and 0 * 6 == 0, which is divisible by 2.
  - nums[2] == nums[3], and 2 * 3 == 6, which is divisible by 2.
  - nums[2] == nums[4], and 2 * 4 == 8, which is divisible by 2.
  - nums[3] == nums[4], and 3 * 4 == 12, which is divisible by 2.

**Example 2:**

- **Input:** nums = [1,2,3,4], k = 1
- **Output:** 0
- **Explanation:** Since no value in nums is repeated, there are no pairs (i,j) that meet all the requirements.



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i], k <= 100`


**Hint:**
1. For every possible pair of indices (i, j) where i < j, check if it satisfies the given conditions.



**Solution:**

We need to count the number of pairs (i, j) in a given array such that the elements at these indices are equal and the product of their indices is divisible by a given integer k.

### Approach
The approach involves iterating through all possible pairs of indices (i, j) where i < j. For each pair, we check two conditions:
1. The elements at indices i and j are equal.
2. The product of i and j is divisible by k.

Given the constraints that the array length is at most 100, a brute-force approach is feasible. This approach involves checking each pair directly, which is manageable due to the small size of the input.

Let's implement this solution in PHP: **[2176. Count Equal and Divisible Pairs in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002176-count-equal-and-divisible-pairs-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countPairs($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$nums1 = array(3, 1, 2, 2, 2, 1, 3);
$k1 = 2;
echo "Output: " . countPairs($nums1, $k1) . "\n"; // Output: 4

// Example 2:
$nums2 = array(1, 2, 3, 4);
$k2 = 1;
echo "Output: " . countPairs($nums2, $k2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Initialization**: We start by initializing a counter to keep track of valid pairs.
2. **Nested Loops**: We use two nested loops to generate all possible pairs (i, j) where i < j. The outer loop runs from 0 to n-2, and the inner loop runs from i+1 to n-1.
3. **Condition Check**: For each pair (i, j), we check if the elements at these indices are equal and if their product modulo k is zero. If both conditions are met, we increment the counter.
4. **Return Result**: Finally, we return the count of valid pairs.

This approach ensures that we check all possible pairs efficiently within the constraints, providing the correct result with a time complexity of O(n^2), which is acceptable given the input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**