974\. Subarray Sums Divisible by K

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Prefix Sum`

Given an integer array `nums` and an integer `k`, return _the number of non-empty **subarrays** that have a sum divisible by `k`_.

A **subarray** is a **contiguous** part of an array.

**Example 1:**

- **Input:** nums = [4,5,0,-2,-3,1], k = 5
- **Output:** 7
- **Explanation:** There are 7 subarrays with a sum divisible by k = 5:\
  [4, 5, 0, -2, -3, 1], [5], [5, 0], [5, 0, -2, -3], [0], [0, -2, -3], [-2, -3]

**Example 2:**

- **Input:** nums = [5], k = 9
- **Output:** 0

**Constraints:**

- <code1 <= nums.length <= 3 * 10<sup>4</sup></code>
- <code>-10<sup>4</sup> <= nums[i] <= 10<sup>4</sup></code>
- <code>2 <= k <= 10<sup>4</sup></code>


**Solution:**

The problem at hand asks us to find the number of non-empty subarrays of an integer array `nums` whose sum is divisible by a given integer `k`. A **subarray** is defined as a contiguous part of the array. The challenge requires an efficient solution given that the length of `nums` can be as large as _**3 \times 10^4**_.

### Key Points
- **Subarray**: A contiguous section of the array.
- **Divisibility**: We need to count subarrays where the sum is divisible by `k`.
- **Prefix Sum**: A technique that can help in reducing the problem to simpler subproblems.
- **Modulo Operation**: The key insight is using modulo arithmetic to efficiently track sums divisible by `k`.

### Approach
1. **Prefix Sum Modulo**: The idea is to keep a running sum of elements and compute its modulo with `k`. If the sum of a subarray from index `i` to `j` is divisible by `k`, then the difference between the prefix sums at `j` and `i-1` (inclusive) must be divisible by `k`. Using modulo, this can be tracked.

2. **Using a Hash Map (or Array)**: We maintain an array (`modGroups`) to count how many times each modulo value (from 0 to `k-1`) has occurred for prefix sums. This allows us to determine how many subarrays end at the current index and are divisible by `k`.

3. **Modulo Adjustment**: Modulo values may be negative, so we adjust the modulo result to always be between 0 and `k-1`.

### Plan
1. Initialize a `prefixMod` to store the current sum's modulo `k`, and a `modGroups` array to count occurrences of different modulo values.
2. Traverse through the array and update the `prefixMod`. For each number:
  - Compute the new `prefixMod`.
  - If `prefixMod` has been seen before, increment the result by the count of such occurrences (because each occurrence represents a valid subarray).
  - Update the count of the current `prefixMod`.
3. Return the result after traversing the entire array.

Let's implement this solution in PHP: **[974. Subarray Sums Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000974-subarray-sums-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function subarraysDivByK($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [4, 5, 0, -2, -3, 1];
$k = 5;
echo subarraysDivByK($nums, $k);  // Output: 7

// Example 2
$nums = [5];
$k = 9;
echo subarraysDivByK($nums, $k);  // Output: 0
?>
```

### Explanation:

- We use the prefix sum technique to keep track of the sum of elements up to the current position.
- By using modulo `k` at each step, we ensure that we only care about whether the sum of subarrays is divisible by `k`.
- The `modGroups` array efficiently tracks how many times each modulo value has appeared, which allows us to count subarrays whose sum is divisible by `k`.

### Example Walkthrough
Consider the input: `nums = [4, 5, 0, -2, -3, 1]` and `k = 5`.

- At the first element (4), the prefix sum modulo 5 is `4`. We haven't seen this before, so we store it.
- At the second element (5), the prefix sum modulo 5 is `(4 + 5) % 5 = 4 % 5 = 0`. This is divisible by 5, so we have one subarray that ends here (`[5]`).
- Continue with each element, updating the prefix sum modulo and counting valid subarrays where the sum is divisible by 5.

### Time Complexity
- **Time Complexity**: _**O(n)**_, where `n` is the length of the `nums` array. We iterate through the array once, performing constant-time operations for each element.
- **Space Complexity**: _**O(k)**_ due to the `modGroups` array, which stores counts for each possible modulo value (from 0 to `k-1`).

### Output for Example

1. For `nums = [4, 5, 0, -2, -3, 1]` and `k = 5`, the function returns `7`, as there are 7 subarrays whose sum is divisible by 5.
2. For `nums = [5]` and `k = 9`, the function returns `0`, as there are no subarrays whose sum is divisible by 9.

The problem can be efficiently solved using prefix sums and modulo arithmetic. By tracking the frequency of each modulo value encountered during the traversal of the array, we can determine how many subarrays have sums divisible by `k`. This approach leverages the power of hashing to avoid the need for checking all subarrays explicitly, which would be computationally expensive for large arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
- 