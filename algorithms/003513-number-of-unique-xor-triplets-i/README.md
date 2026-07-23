3513\. Number of Unique XOR Triplets I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Math`, `Bit Manipulation`, `Biweekly Contest 154`

You are given an integer array `nums` of length `n`, where `nums` is a **permutation[^1]** of the numbers in the range `[1, n]`.

An **XOR triplet** is defined as the XOR of three elements `nums[i] XOR nums[j] XOR nums[k]` where `i <= j <= k`.

Return the number of **unique** XOR triplet values from all possible triplets `(i, j, k)`.

[^1]: **Permutation:** A permutation is a rearrangement of all the elements of a set.

**Example 1:**

- **Input:** nums = [1,2]
- **Output:** 2
- **Explanation:**
   - The possible XOR triplet values are:
      - `(0, 0, 0) → 1 XOR 1 XOR 1 = 1`
      - `(0, 0, 1) → 1 XOR 1 XOR 2 = 2`
      - `(0, 1, 1) → 1 XOR 2 XOR 2 = 1`
      - `(1, 1, 1) → 2 XOR 2 XOR 2 = 2`
   - The unique XOR values are `{1, 2}`, so the output is 2.

**Example 2:**

- **Input:** nums = [3,1,2]
- **Output:** 4
- **Explanation:**

   - The possible XOR triplet values include:
      - `(0, 0, 0) → 3 XOR 3 XOR 3 = 3`
      - `(0, 0, 1) → 3 XOR 3 XOR 1 = 1`
      - `(0, 0, 2) → 3 XOR 3 XOR 2 = 2`
      - `(0, 1, 2) → 3 XOR 1 XOR 2 = 0`
   - The unique XOR values are `{0, 1, 2, 3}`, so the output is 4.

**Example 3:**

- **Input:** nums = [1]
- **Output:** 1

**Example 4:**

- **Input:** nums = [1, 2, 3]
- **Output:** 4

**Example 5:**

- **Input:** nums = [1, 2, 3, 4]
- **Output:** 8

**Example 6:**

- **Input:** nums =  [5, 1, 4, 2, 3]
- **Output:** 8

**Example 7:**

- **Input:** nums = [1..7]
- **Output:** 8

**Example 8:**

- **Input:** nums = [1..8]
- **Output:** 16

**Example 9:**

- **Input:** nums =  [10, 9, 8, 7, 6, 5, 4, 3, 2, 1]
- **Output:** 16

**Example 10:**

- **Input:** nums =  [1..100000]
- **Output:** 131072


**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= n`
- `nums` is a permutation of integers from `1` to `n`.


**Hint:**
1. What is the maximum and minimum value we can obtain using the given numbers?
2. Can we generate all numbers within that range?
3. For `n >= 3` we can obtain all numbers in `[0, 2⁽ᵐˢᵇ⁽ⁿ⁾ ⁺ ¹⁾ - 1]`, where `msb(n)` is the index of the most significant bit in `n`’s binary representation (i.e., the highest power of 2 less than or equal to `n`). Handle the case when `n <= 2` separately.


**Solution:**

We solve this problem by leveraging the mathematical property that for any permutation of numbers 1 to n where `n ≥ 3`, all values from 0 to `2ᵏ - 1` can be formed as XOR triplets, where `k` is the smallest integer such that `2ᵏ > n`. The solution reduces to finding the next power of two greater than n and returning that value as the count. For the base cases `n = 1` and `n = 2`, we handle them separately.

## Approach

1. **Base Cases**: For `n = 1`, only one triplet exists (the single element XORed with itself three times), giving 1 unique value. For `n = 2`, the possible XOR values are `{1, 2}`, giving 2 unique values.
2. **Mathematical Property**: For `n ≥ 3`, with nums being a permutation of `[1, n]`, the set of all possible XOR triplet values covers the entire range `[0, 2ᵐ - 1]` where `m` is the smallest integer such that `2ᵐ > n`.
3. **Find m**: Determine the bit length of `n`. If n is exactly a power of two, then `m = log2(n) + 1`; otherwise, `m = floor(log2(n)) + 1`. This is equivalent to finding the smallest power of two greater than `n`.
4. **Return Count**: The number of unique XOR triplet values equals `2ᵐ`, which is the next power of two greater than `n`.

Let's implement this solution in PHP: **[3513. Number of Unique XOR Triplets I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003513-number-of-unique-xor-triplets-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function uniqueXorTriplets(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo uniqueXorTriplets([1,2]) .  "\n";                              // Output: 2
echo uniqueXorTriplets([3,1,2]) .  "\n";                            // Output: 4
echo uniqueXorTriplets([1]) .  "\n";                                // Output: 1
echo uniqueXorTriplets([1, 2, 3]) .  "\n";                          // Output: 4
echo uniqueXorTriplets([1, 2, 3, 4]) .  "\n";                       // Output: 8
echo uniqueXorTriplets([1, 2, 3, 4]) .  "\n";                       // Output: 8
echo uniqueXorTriplets([1..7]) .  "\n";                             // Output: 8
echo uniqueXorTriplets([1..8]) .  "\n";                             // Output: 16
echo uniqueXorTriplets([10, 9, 8, 7, 6, 5, 4, 3, 2, 1]) .  "\n";    // Output: 16
echo uniqueXorTriplets([1..100000]) .  "\n";                        // Output: 131072 
?>
```

### Explanation:

1. **Why `n ≥ 3` covers all values**: With three elements from the set `[1, n]` where `n ≥ 3`, we can generate both 0 (by selecting three numbers that XOR to 0, e.g., `x, y, x XOR y`) and any value up to the next power of two minus 1 by appropriate selection of elements.
2. **`Bit` length significance**: If `n` has `bit` length `m` (i.e., `2⁽ᵐ⁻¹⁾ ≤ n < 2ᵐ`), then the maximum value we can produce is at least `2ᵐ - 1`, and since we can produce all values in between, the total count is `2ᵐ`.
3. **Example with n = 5**: `n` in binary is 101 (bit length 3), so the next power of two greater than n is 8. The solution returns 8, meaning all numbers 0 through 7 can be formed as XOR triplets.
4. **Example with n = 4**: `n` is exactly `2²`, so `bit` length is 3 (positions 0, 1, 2). The next power of two greater than n is 8, and indeed all values 0 through 7 are achievable.
5. **Implementation detail**: The code finds the bit length by right-shifting until temp becomes 0, then uses `1 << msb` to compute `2ᵐ`. For `n = 3`, `msb = 2`, so returns 4, matching the example where `{0, 1, 2, 3}` has 4 values.

## Complexity Analysis

- **Time Complexity**: _**O(log n)**_ - The while loop to find the most significant bit position takes at most 17 iterations for `n ≤ 10⁵` (since `2¹⁷ = 131072`), making it effectively constant time. The array itself is not iterated over at all.
- **Space Complexity**: _**O(1)**_ - Only a few integer variables are used regardless of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**