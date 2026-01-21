3315\. Construct the Minimum Bitwise Array II

**Difficulty:** Medium

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
  - For `i = 3`, the smallest `ans[3]` that satisfies `ans[3] OR (ans[3] + 1) = 7` is `3`, because `3 OR (3 + 1) = 7`

**Example 2:**

- **Input:** nums = [11,13,31]
- **Output:** [9,12,15]
- **Explanation:**
  - For `i = 0`, the smallest `ans[0]` that satisfies `ans[0] OR (ans[0] + 1) = 11` is `9`, because `9 OR (9 + 1) = 11`.
  - For `i = 1`, the smallest `ans[1]` that satisfies `ans[1] OR (ans[1] + 1) = 13` is `12`, because `12 OR (12 + 1) = 13`.
  - For `i = 2`, the smallest `ans[2]` that satisfies `ans[2] OR (ans[2] + 1) = 31` is `15`, because `15 OR (15 + 1) = 31`.


**Constraints:**

- `1 <= nums.length <= 100`
- `2 <= nums[i] <= 10⁹`
- `nums[i]` is a prime number.



**Hint:**
1. Consider the binary representation of `nums[i]`.
2. Answer is -1 for even `nums[i]`.
3. Try unsetting a single bit from `nums[i]`.


[^1]: **Prime :** A prime number is a natural number greater than 1 with only two factors, 1 and itself.



**Solution:**

We are given an array `nums` of prime numbers. For each prime number `p = nums[i]`, we need to find the smallest non-negative integer `x` such that `x OR (x+1) = p`. If no such `x` exists, we set `ans[i] = -1`.

### Approach:

The problem requires constructing an array `ans` such that for each `i`, `ans[i] OR (ans[i] + 1) == nums[i]`, with `ans[i]` minimized. If no solution exists, `ans[i] = -1`. The solution leverages bitwise properties of the equation.

Key observations:
- For even `nums[i]` (specifically 2, the only even prime), no solution exists because `x OR (x+1)` is always odd for integer `x`.
- For odd `nums[i]`, we analyze the binary representation to find the minimal `x` satisfying the equation.

**Steps:**
1. **For each prime `p` in `nums`:**
   - If `p == 2`, set `ans[i] = -1`.
   - If `p` is of the form `2^t - 1` (all bits are 1 in binary), set `ans[i] = (p-1)/2`.
   - Otherwise, find the index `m` of the least significant `0` bit in `p` (0-indexed from right). Then, set `ans[i] = p - (1 << (m-1))`.

2. **Return the constructed array `ans`.**

Let's implement this solution in PHP: **[3315. Construct the Minimum Bitwise Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003315-construct-the-minimum-bitwise-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function minBitwiseArray(array $nums): array
{
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

- **Why even primes (except 2) are not considered:**  
  All primes except 2 are odd. For even numbers, `x OR (x+1)` is always odd, so no solution exists for even `nums[i]`. Since the input consists of primes, the only even prime is 2, which yields no solution.

- **Understanding the equation `x OR (x+1) = p`:**  
  Let `x` be a number. In binary, `x+1` flips the trailing `1`s to `0` and the first `0` to `1`. The OR operation results in a number `p` where:
   - All bits to the right of the first `0` in `x` become `1` in `p`.
   - The first `0` in `x` becomes `1` in `p`.
   - Higher bits remain unchanged.

  Thus, `p` must have a suffix of at least one `1` (i.e., `p` is odd). For `p` to be valid, its binary representation must have a contiguous block of trailing `1`s, except possibly when `p` is all `1`s.

- **Case when `p` is all `1`s (`2^t - 1`):**  
  Here, any `x` with `t-1` trailing `1`s and a `0` at the next bit works. The minimal `x` is obtained by setting the highest such bit to `0`, yielding `x = (p-1)/2`.

- **General case (odd `p` not all `1`s):**  
  Find the least significant `0` bit in `p` (index `m`). This implies that bits `0` to `m-1` in `p` are `1`. The minimal `x` is obtained by turning off the bit at position `m-1` in `p`, which is `x = p - (1 << (m-1))`. This ensures `x` has the required trailing `1`s and a `0` at position `m-1`, satisfying the equation.

- **Minimization:**  
  The approach maximizes the power of two subtracted from `p` (by choosing the largest possible `m`), thereby minimizing `x`.

### Complexity
- **Time Complexity:** O(n log(max(nums))), where `n` is the length of `nums`. For each number, we may iterate through its bits (up to 31 for 32-bit integers).
- **Space Complexity:** O(1) extra space (excluding the output array).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**