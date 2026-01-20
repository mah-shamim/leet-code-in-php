3314\. Construct the Minimum Bitwise Array I

**Difficulty:** Easy

**Topics:** `Array`, `Bit Manipulation`, `Biweekly Contest 141`

You are given an array `nums` consisting of `n` prime[^1] integers.

You need to construct an array `ans` of length `n`, such that, for each index `i`, the bitwise `OR` of `ans[i]` and `ans[i] + 1` is equal to `nums[i]`, i.e. `ans[i] OR (ans[i] + 1) == nums[i]`.

Additionally, you must **minimize** each value of `ans[i]` in the resulting array.

If it is not possible to find such a value for `ans[i]` that satisfies the **condition**, then set `ans[i] = -1`.

**Example 1:**

- **Input:** nums = [2,3,5,7]
- **Output:** [-1,1,4,3]
- **Explanation:**
  - For `i = 0`, as there is no value for `ans[0]` that satisfies `ans[0] OR (ans[0] + 1) = 2`, so `ans[0] = -1`.
  - For `i = 1`, the smallest `ans[1]` that satisfies `ans[1] OR (ans[1] + 1) = 3` is `1`, because `1 OR (1 + 1) = 3`.
  - For `i = 2`, the smallest `ans[2]` that satisfies `ans[2] OR (ans[2] + 1) = 5` is `4`, because `4 OR (4 + 1) = 5`.
  - For `i = 3`, the smallest `ans[3]` that satisfies `ans[3] OR (ans[3] + 1) = 7` is `3`, because `3 OR (3 + 1) = 7`.


**Example 2:**

- **Input:** nums = [11,13,31]
- **Output:** [9,12,15]
- **Explanation:**
  - For `i = 0`, the smallest `ans[0]` that satisfies `ans[0] OR (ans[0] + 1) = 11` is `9`, because `9 OR (9 + 1) = 11`.
  - For `i = 1`, the smallest `ans[1]` that satisfies `ans[1] OR (ans[1] + 1) = 13` is `12`, because `12 OR (12 + 1) = 13`.
  - For `i = 2`, the smallest `ans[2]` that satisfies `ans[2] OR (ans[2] + 1) = 31` is `15`, because `15 OR (15 + 1) = 31`.


**Constraints:**

- `1 <= nums.length <= 100`
- `2 <= nums[i] <= 1000`
- `nums[i]` is a prime number.



**Hint:**
1. The constraints are small, allowing you to iterate over all potential values for `ans[i]` directly.


[^1]: **Prime : ** A prime number is a natural number greater than 1 with only two factors, 1 and itself.



**Solution:**

We need to construct an array `ans` such that for each `i`, `ans[i] OR (ans[i] + 1) == nums[i]`, with `ans[i]` minimized. If no such value exists, set `ans[i] = -1`.

### Approach:

1. **Iterate through each prime number** in the input array `nums`.
2. **Handle the special case** where the number is 2 (the only even prime). Since `x OR (x+1)` is always odd, there is no solution for 2. Set the answer to -1.
3. **For odd primes**, iterate through all possible values of `x` from 0 to `n-1` (since `x+1` must be ≤ `n`).
4. **Check the condition** `x OR (x+1) == n` for each `x`. The first (smallest) `x` that satisfies the condition is chosen.
5. **If no such `x` is found** (which should not happen for odd primes, as `x = n-1` always works), set the answer to -1.

Let's implement this solution in PHP: **[3314. Construct the Minimum Bitwise Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003314-construct-the-minimum-bitwise-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function minBitwiseArray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minBitwiseArray([2,3,5,7]) . "\n";         // Output: [-1,1,4,3]
echo minBitwiseArray([11,13,31]) . "\n";        // Output: [9,12,15]
?>
```

### Explanation:

- The bitwise OR of two consecutive integers `x` and `x+1` always results in an **odd number** (except when `x` is negative, but we consider non-negative `x`). Therefore, even primes (only 2) have no solution.
- For odd primes, a solution always exists: setting `x = n-1` (which is even) gives `(n-1) OR n = n` because:
   - The least significant bit of `n-1` is 0 and of `n` is 1.
   - All higher bits are identical in `n-1` and `n`.
- However, a smaller `x` may exist (e.g., for `n=3`, `x=1` is smaller than `x=2`). Therefore, we search from `x=0` upward to find the minimum valid `x`.
- The constraints allow brute force: at most 1000 iterations per prime, with up to 100 primes, totalling 100,000 operations.

### Complexity

- **Time Complexity:** O(n * m), where `n` is the length of `nums` and `m` is the maximum value in `nums` (up to 1000). In practice, this is efficient given the constraints.
- **Space Complexity:** O(n) for storing the result array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**