3514\. Number of Unique XOR Triplets II

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Bit Manipulation`, `Enumeration`, `Biweekly Contest 154`

You are given an integer array `nums`.

A **XOR triplet** is defined as the XOR of three elements `nums[i] XOR nums[j] XOR nums[k]` where `i <= j <= k`.

Return the number of **unique** XOR triplet values from all possible triplets `(i, j, k)`.

**Example 1:**

- **Input:** nums = [1,3]
- **Output:** 2
- **Explanation:**
   - The possible XOR triplet values are:
      - `(0, 0, 0) → 1 XOR 1 XOR 1 = 1`
      - `(0, 0, 1) → 1 XOR 1 XOR 3 = 3`
      - `(0, 1, 1) → 1 XOR 3 XOR 3 = 1`
      - `(1, 1, 1) → 3 XOR 3 XOR 3 = 3`
   - The unique XOR values are `{1, 3}`. Thus, the output is 2.

**Example 2:**

- **Input:** nums = [6,7,8,9]
- **Output:** 4
- **Explanation:** The possible XOR triplet values are `{6, 7, 8, 9}`. Thus, the output is 4.

**Example 3:**

- **Input:** nums = [5, 5, 5]
- **Output:** 1

**Example 4:**

- **Input:** nums = [1]
- **Output:** 1

**Example 5:**

- **Input:** nums = [1500, 1500, 1500]
- **Output:** 1

**Example 6:**

- **Input:** nums = [1, 2, 4, 8, 16]
- **Output:** 15


**Constraints:**

- `1 <= nums.length <= 1500`
- `1 <= nums[i] <= 1500`


**Hint:**
1. What is the maximum possible XOR value achievable by any triplet?
2. Let the maximum possible XOR value be stored in `max_xor`.
3. For each index `i`, consider all pairs of indices `(j, k)` such that `i <= j <= k`. For each such pair, compute the triplet XOR as `nums[i] XOR nums[j] XOR nums[k]`.
4. You can optimize the calculation by precomputing or reusing intermediate XOR results. For example, after fixing an index `i`, compute XORs of pairs `(j, k)` in `O(n²)` time instead of checking all three indices independently.
5. Finally, count the number of unique XOR values obtained from all triplets.


**Solution:**

We need to count the number of unique XOR values obtainable from all triplets `(i, j, k)` where `i <= j <= k`. We solve this by enumerating all valid triplets using a nested loop structure that respects the index ordering constraint, computing each triplet's XOR value, and tracking uniqueness with a boolean array sized to the maximum possible XOR result (2047, since numbers are ≤1500 and XOR of three such numbers fits in 11 `bits`).

## Approach

- Determine the maximum possible XOR value based on input constraints.
- Initialize a boolean array `seen` to mark which XOR values have been produced.
- Use three nested loops with indices `i ≤ j ≤ k` to generate all triplets.
- Optimize by precomputing the XOR of the first two elements (`nums[i] ^ nums[j]`) before entering the third loop.
- For each triplet, compute the final XOR and mark it in `seen`.
- Count and return the number of `true` entries in `seen`.


Let's implement this solution in PHP: **[3514. Number of Unique XOR Triplets II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003514-number-of-unique-xor-triplets-ii/solution.php)**

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
echo uniqueXorTriplets([1, 3]) .  "\n";                     // Output: 2
echo uniqueXorTriplets([6, 7, 8, 9]) .  "\n";               // Output: 4
echo uniqueXorTriplets([5, 5, 5]) .  "\n";                  // Output: 1
echo uniqueXorTriplets([1]) .  "\n";                        // Output: 1
echo uniqueXorTriplets([1500, 1500, 1500]) .  "\n";         // Output: 1
echo uniqueXorTriplets([1, 2, 4, 8, 16]) .  "\n";           // Output: 15
?>
```

### Explanation:

- The triplet definition requires `i <= j <= k`, meaning indices must be non-decreasing, and elements can be reused (e.g., same index chosen multiple times).
- The maximum XOR value for any three numbers within the range `[1, 1500]` is achieved when all three numbers use the highest bits possible; 1500 in binary uses 11 bits (`2¹¹ = 2048`), so the maximum possible XOR is 2047 (all 11 bits set).
- We iterate `i` from 0 to `n-1`, then `j` from `i` to `n-1`, computing `pairXor = nums[i] ^ nums[j]` once per `(i, j)` pair.
- Then `k` iterates from `j` to `n-1`, and we compute `tripletXor = pairXor ^ nums[k]`, marking it as seen.
- This ensures all valid triplets are covered exactly once without redundant XOR computations.
- Finally, we scan the `seen` array to count distinct values.

## Complexity Analysis

- **Time Complexity:** _**O(n³)**_ in the worst case due to three nested loops. With `n ≤ 1500`, this can reach ~5.6×10⁸ operations in theory, but the actual number of triplets is `n*(n+1)*(n+2)/6`, which is about 563 million for n=1500. The precomputation of pair XORs saves a constant factor but does not change asymptotic complexity.
- **Space Complexity:** _**O(1)**_ extra space besides the `seen` array of size 2048, which is constant and independent of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**