3020\. Find the Maximum Number of Elements in Subset

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Enumeration`, `Weekly Contest 382`

You are given an array of **positive** integers `nums`.

You need to select a subset[^1] of `nums` which satisfies the following condition:

- You can place the selected elements in a 0-indexed array such that it follows the pattern: `[x, x², x⁴, ..., xᵏ/², xᵏ, xᵏ/², ..., x⁴, x², x]` (**Note** that `k` can be be any **non-negative** power of `2`). For example, `[2, 4, 16, 4, 2]` and `[3, 9, 3]` follow the pattern while `[2, 4, 8, 4, 2]` does not.

Return _the **maximum** number of elements in a subset that satisfies these conditions_.

[^1]: **Subset:** A **subset** of an array is a selection of elements (possibly none) of the array.

**Example 1:**

- **Input:** nums = [5,4,1,2,2]
- **Output:** 3
- **Explanation:** We can select the subset {4,2,2}, which can be placed in the array as [2,4,2] which follows the pattern and 2² == 4. Hence the answer is 3.

**Example 2:**

- **Input:** nums = [1,3,2,4]
- **Output:** 1
- **Explanation:** We can select the subset {1}, which can be placed in the array as [1] which follows the pattern. Hence the answer is 1. Note that we could have also selected the subsets {2}, {3}, or {4}, there may be multiple subsets which provide the same answer.

**Constraints:**

- `2 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`


**Hint:**
1. We can select an odd number of `1`’s.
2. Put all the values into a HashSet. We can start from each `x > 1` as the smallest chosen value and we can find the longest subset by checking the new values (which are the square of the previous value) in the set by brute force.
3. Note when `x > 1`, `x²`, `x⁴`, `x⁸`, … increases very fast, the longest subset with smallest value x cannot be very long. (The length is `O(log(log(10⁹))`).
4. Hence we can directly check all lengths less than `10` for all values of `x`.


**Similar Questions:**
1. [128. Longest Consecutive Sequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000128-longest-consecutive-sequence)


**Solution:**

We solve this problem by leveraging frequency counting and the mathematical property that squaring positive integers greater than 1 grows extremely fast. We handle the special case of `1` separately, then for each unique number as a potential starting point, we build the longest possible chain by repeatedly squaring, checking if we have enough elements to form the symmetric pattern, and tracking the maximum length found.

## Approach

- **Frequency Counting**: Count occurrences of each number using a hash map since we need to know if we have enough copies for both sides of the symmetric pattern.
- **Special Case for 1**: Since `1² = 1`, we can take any odd number of 1s (the middle 1 plus pairs on both sides). If we have even count, we take one less to maintain odd length.
- **Chain Building for x > 1**: For each unique number as the smallest element, repeatedly square it to build the chain `[x, x², x⁴, ...]` until we run out of numbers or exceed `10⁹`.
- **Validation**: For each chain, verify we have at least 2 copies of every element except the peak (which needs only 1 copy), forming the symmetric pattern `[x, x², ..., peak, ..., x², x]`.
- **Optimization**: Stop squaring when `current > 31622` (since `31622² ≈ 10⁹`), preventing integer overflow and limiting chain length to at most 5-6 elements for most numbers.

Let's implement this solution in PHP: **[3020. Find the Maximum Number of Elements in Subset](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003020-find-the-maximum-number-of-elements-in-subset/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumLength(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumLength([5,4,1,2,2]) .  "\n";        // Output: 3
echo maximumLength([1,3,2,4]) .  "\n";          // Output: 1
?>
```

### Explanation:

- **Pattern Structure**: The pattern `[x, x², x⁴, ..., xᵏ/², xᵏ, xᵏ/², ..., x⁴, x², x]` is symmetric, meaning each element except the peak appears twice (once on each side), while the peak appears once.
- **Minimum Length**: We can always pick any single element, so `maxLength` starts at 1.
- **Handling 1s**: For value `1`, `1² = 1`, so the pattern would be `[1, 1, 1, ...]` with all elements equal. We can pick any odd number of 1s. If we have `n` ones, we can pick `n` if `n` is odd, otherwise `n-1`.
- **Building the Chain**: Starting from each `x > 1`, we generate the next element by squaring. The chain length is limited because squaring grows exponentially - for `x ≥ 2`, the chain doubles in exponent each step.
- **Counting Requirement**: For a chain of length `L` (where the peak is at position `L-1`), we need:
   - 2 copies of elements at positions `0` to `L-2`
   - 1 copy of the peak element at position `L-1`
- **Example [2,4,2]**: Chain is `[2,4]` (length 2). We need 2 copies of `2` and 1 copy of `4`. With `nums = [5,4,1,2,2]`, we have exactly this, giving length 3.
- **Efficiency**: Since chain length is at most 5-6 for any `x > 1` (e.g., `2 → 4 → 16 → 256 → 65536 → 4.29e9`), we only iterate a constant number of times per unique starting value.

## Complexity Analysis

- **Time Complexity**: `O(n + m * log(log(MAX)))` where `n` is array length and `m` is number of unique elements. Since `log(log(10⁹)) < 6`, this is effectively `O(n + m)` or `O(n)`.
- **Space Complexity**: `O(n)` for the frequency hash map.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**