523\. Continuous Subarray Sum

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Prefix Sum`

Given an integer array nums and an integer k, return `true` _if `nums` has a **good subarray** or false otherwise_.

A **good subarray** is a subarray where:

- its length is **at least two**, and
- the sum of the elements of the subarray is a multiple of `k`.

Note that:

- A **subarray** is a contiguous part of the array.
- An integer `x` is a multiple of `k` if there exists an integer `n` such that `x = n * k`. `0` is **always** a multiple of `k`.


**Example 1:**

- **Input:** nums = [23,<u>2,4</u>,6,7], k = 6
- **Output:** true
- **Explanation:** [2, 4] is a continuous subarray of size 2 whose elements sum up to 6.

**Example 2:**

- **Input:** nums = [<u>23,2,6,4,7</u>], k = 6
- **Output:** true
- **Explanation:** [23, 2, 6, 4, 7] is a continuous subarray of size 5 whose elements sum up to 42.\
  42 is a multiple of 6 because 42 = 7 * 6 and 7 is an integer.

**Example 3:**

- **Input:** nums = [23,2,6,4,7], k = 13
- **Output:** false 

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>
- <code>0 <= sum(nums[i]) <= 2<sup>31</sup> - 1</code>
- <code>1 <= k <= 2<sup>31</sup> - 1</code>



**Solution:**

We need to check whether there is a subarray of at least two elements whose sum is a multiple of `k`.

### Key Observations:

1. **Modulo Property:**
   The sum of a subarray can be reduced to the remainder (modulo `k`). Specifically, for any two indices `i` and `j` (where `i < j`), if the prefix sums `prefix_sum[j] % k == prefix_sum[i] % k`, then the sum of the subarray between `i+1` and `j` is a multiple of `k`. This is because the difference between these prefix sums is divisible by `k`.

2. **HashMap for Prefix Modulo:**
   We'll store the modulo values of prefix sums in a hash table (or associative array). If the same modulo value repeats at a later index, it means the subarray sum between these indices is divisible by `k`.

3. **Handling Edge Cases:**
  - If `k == 0`, we simply need to check if any subarray has a sum of `0`.
  - If the subarray length is less than 2, we ignore it.

### Solution Strategy:

1. Initialize a hashmap (associative array) to store the modulo of the prefix sum.
2. Traverse the array and calculate the cumulative sum. For each element, compute the modulo with `k`.
3. If the same modulo value has already been seen and the subarray length is at least 2, return `true`.
4. Store the current modulo and its index in the hashmap if not already present.

Let's implement this solution in PHP: **[523. Continuous Subarray Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000523-continuous-subarray-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Boolean
 */
function checkSubarraySum($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [23, 2, 4, 6, 7];
$k = 6;
echo checkSubarraySum($nums, $k) ? 'true' : 'false';  // Output: true

// Example 2
$nums = [23, 2, 6, 4, 7];
$k = 6;
echo checkSubarraySum($nums, $k) ? 'true' : 'false';  // Output: true

// Example 3
$nums = [23, 2, 6, 4, 7];
$k = 13;
echo checkSubarraySum($nums, $k) ? 'true' : 'false';  // Output: false
?>
```

### Explanation:

1. **`mod_map` Initialization:**
   We initialize the `mod_map` with a key `0` and value `-1`. This is used to handle cases where a subarray from the start of the array is divisible by `k`.

2. **Iterating through `nums`:**
   We calculate the cumulative sum as we iterate through the array. For each element, we compute the sum modulo `k`.

3. **Modulo Check:**
   If the current modulo value has already been seen in the `mod_map`, it means there is a subarray whose sum is divisible by `k`. We also ensure the subarray length is greater than or equal to 2 by checking if the difference in indices is more than 1.

4. **Return Result:**
  - If a valid subarray is found, we return `true`.
  - If we finish iterating through the array without finding such a subarray, we return `false`.

### Time Complexity:

- **Time Complexity:** O(n), where `n` is the length of the array. We traverse the array once.
- **Space Complexity:** O(min(n, k)), since we store at most `k` unique remainders in the hashmap.

This solution is efficient and works within the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
