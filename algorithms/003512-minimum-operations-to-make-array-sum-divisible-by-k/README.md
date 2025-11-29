3512\. Minimum Operations to Make Array Sum Divisible by K

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Biweekly Contest 154`

You are given an integer array `nums` and an integer `k`. You can perform the following operation any number of times:

- Select an index `i` and replace `nums[i]` with `nums[i] - 1`.

Return _the **minimum** number of operations required to make the sum of the array divisible by `k`_.

**Example 1:**

- **Input:** nums = [3,9,7], k = 5
- **Output:** 4
- **Explanation:**
  - Perform 4 operations on `nums[1] = 9`. Now, `nums = [3, 5, 7]`.
  - The sum is 15, which is divisible by 5.


**Example 2:**

- **Input:** nums = [4,1,3], k = 4
- **Output:** 0
- **Explanation:**
  - The sum is 8, which is already divisible by 4. Hence, no operations are needed.


**Example 3:**

- **Input:** nums = [3,2], k = 6
- **Output:** 5
- **Explanation:**
  - Perform 3 operations on `nums[0] = 3` and 2 operations on `nums[1] = 2`. Now, `nums = [0, 0]`.
  - The sum is 0, which is divisible by 6.


**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 1000`
- `1 <= k <= 100`



**Hint:**
1. `sum(nums) % k`






**Solution:**

We need to determine the minimum number of operations required to make the sum of the array elements divisible by a given integer `k`. Each operation allows us to decrease any element in the array by 1. The solution involves calculating the remainder when the total sum of the array is divided by `k`. If the remainder is zero, no operations are needed. Otherwise, the remainder itself is the number of operations required, as reducing the total sum by the remainder will make it divisible by `k`.

### Approach

1. **Calculate Total Sum**: Compute the sum of all elements in the array.
2. **Compute Remainder**: Find the remainder when the total sum is divided by `k`.
3. **Check Divisibility**: If the remainder is zero, the sum is already divisible by `k`, so return zero. Otherwise, return the remainder as the number of operations needed.

Let's implement this solution in PHP: **[3512. Minimum Operations to Make Array Sum Divisible by K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003512-minimum-operations-to-make-array-sum-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minOperations($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minOperations([3,9,7], 5) . "\n";      // Output: 4
echo minOperations([4,1,3], 4) . "\n";      // Output: 0
echo minOperations([3,2], 6) . "\n";        // Output: 5
?>
```

### Explanation:

1. **Total Sum Calculation**: The `array_sum` function efficiently computes the sum of all elements in the array.
2. **Remainder Calculation**: Using the modulo operator `%`, we determine the remainder of the total sum when divided by `k`.
3. **Result Determination**: If the remainder is zero, the sum is already divisible by `k`, so no operations are needed. Otherwise, the remainder value directly gives the minimum number of operations required to reduce the sum to a value divisible by `k`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**