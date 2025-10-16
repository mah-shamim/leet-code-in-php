2598\. Smallest Missing Non-negative Integer After Operations

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Greedy`, `Weekly Contest 337`

You are given a **0-indexed** integer array `nums` and an integer `value`.

In one operation, you can add or subtract `value` from any element of `nums`.

- For example, if `nums = [1,2,3]` and `value = 2`, you can choose to subtract `value` from `nums[0]` to make `nums = [-1,2,3]`.

The MEX (minimum excluded) of an array is the smallest missing **non-negative** integer in it.

- For example, the MEX of `[-1,2,3]` is `0` while the MEX of `[1,0,3]` is `2`.

Return _the maximum MEX of `nums` after applying the mentioned operation **any number of times**_.

**Example 1:**

- **Input:** nums = [1,-10,7,13,6,8], value = 5
- **Output:** 4
- **Explanation:** One can achieve this result by applying the following operations:
  - Add value to nums[1] twice to make nums = [1,<ins>**0**</ins>,7,13,6,8]
  - Subtract value from nums[2] once to make nums = [1,0,<ins>**2**</ins>,13,6,8]
  - Subtract value from nums[3] twice to make nums = [1,0,2,<ins>**3**</ins>,6,8]
    The MEX of nums is 4. It can be shown that 4 is the maximum MEX we can achieve.

**Example 2:**

- **Input:** nums = [1,-10,7,13,6,8], value = 7
- **Output:** 2
- **Explanation:** One can achieve this result by applying the following operation:
  - subtract value from nums[2] once to make nums = [1,-10,<ins>**0**</ins>,13,6,8]
    The MEX of nums is 2. It can be shown that 2 is the maximum MEX we can achieve.

**Constraints:**

- `1 <= nums.length, value <= 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`



**Hint:**
1. Think about using modular arithmetic.
2. if `x = nums[i]` (mod value), then we can make `nums[i]` equal to `x` after some number of operations
3. How does finding the frequency of (`nums[i]` mod value) help?


**Similar Questions:**
1. [41. First Missing Positive](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000041-first-missing-positive)






**Solution:**

We need to find the maximum MEX (minimum excluded non-negative integer) of an array after performing any number of operations where we can add or subtract a given value from any element. The key insight is that each element can be transformed to any non-negative integer that shares the same remainder when divided by the given value.

### Approach
1. **Modular Arithmetic**: Each element in the array can be transformed into any non-negative integer that has the same remainder modulo the given value. This means that for each remainder class, we can generate a sequence of non-negative integers (e.g., r, r + value, r + 2*value, etc.).
2. **Frequency Count**: We count how many elements fall into each remainder class after adjusting for negative remainders by converting them to their positive equivalents.
3. **Find MEX**: The MEX is determined by checking the smallest non-negative integer that cannot be formed. For each remainder class, the smallest integer that cannot be formed is `r + k * value`, where `k` is the count of elements in that remainder class. The overall MEX is the minimum of these values across all remainder classes.

Let's implement this solution in PHP: **[2598. Smallest Missing Non-negative Integer After Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002598-smallest-missing-non-negative-integer-after-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $value
 * @return Integer
 */
function findSmallestInteger($nums, $value) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums = array(1, -10, 7, 13, 6, 8);
$value = 5;
echo findSmallestInteger($nums, $value) . "\n"; // Output: 4

// Example 2
$nums = array(1, -10, 7, 13, 6, 8);
$value = 7;
echo findSmallestInteger($nums, $value) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Frequency Array Initialization**: We initialize an array `$freq` of size `$value` with zeros to count the occurrences of each remainder.
2. **Remainder Calculation**: For each number in the input array, we compute its remainder when divided by `$value`. If the remainder is negative, we adjust it to a positive value by adding `$value`.
3. **Frequency Update**: We update the frequency count for each computed remainder.
4. **MEX Calculation**: For each remainder `$r`, the smallest non-negative integer that cannot be formed in this remainder class is `$r + $freq[$r] * $value`. We find the minimum such value across all remainder classes, which gives us the MEX of the array after all possible operations.

This approach efficiently leverages modular arithmetic and frequency counting to determine the smallest missing non-negative integer, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**