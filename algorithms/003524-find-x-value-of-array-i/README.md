3524\. Find X Value of Array I

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Dynamic Programming`, `Weekly Contest 446`

You are given an array of **positive** integers `nums`, and a **positive** integer `k`.

You are allowed to perform an operation **once** on `nums`, where in each operation you can remove any **non-overlapping** prefix and suffix from `nums` such that `nums` remains **non-empty**.

You need to find the **x-value** of `nums`, which is the number of ways to perform this operation so that the **product** of the remaining elements leaves a remainder of `x` when divided by `k`.

Return an array `result` of size `k` where `result[x]` is the **x-value** of `nums` for `0 <= x <= k - 1`.

A **prefix** of an array is a **subarray[^1]** that starts from the beginning of the array and extends to any point within it.

A **suffix** of an array is a **subarray[^1]** that starts at any point within the array and extends to the end of the array.

**Note** that the prefix and suffix to be chosen for the operation can be **empty**.

[^1]: **Subarray:** A **subarray** is a contiguous sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,3,4,5], k = 3
- **Output:** [9,2,4]
- **Explanation:**
  - For `x = 0`, the possible operations include all possible ways to remove non-overlapping prefix/suffix that do not remove `nums[2] == 3`.
  - For `x = 1`, the possible operations are:
    - Remove the empty prefix and the suffix `[2, 3, 4, 5]`. nums becomes `[1]`.
    - Remove the prefix `[1, 2, 3]` and the suffix `[5]`. `nums` becomes `[4]`.
  - For `x = 2`, the possible operations are:
    - Remove the empty prefix and the suffix `[3, 4, 5]`. `nums` becomes `[1, 2]`.
    - Remove the prefix `[1]` and the suffix `[3, 4, 5]`. `nums` becomes `[2]`.
    - Remove the prefix `[1, 2, 3]` and the empty suffix. `nums` becomes `[4, 5]`.
    - Remove the prefix `[1, 2, 3, 4]` and the empty suffix. `nums` becomes `[5]`.


**Example 2:**

- **Input:** nums = [1,2,4,8,16,32], k = 4
- **Output:** [18,1,2,0]
- **Explanation:**
  - For `x = 0`, the only operations that **do not** result in `x = 0` are:
    - Remove the empty prefix and the suffix `[4, 8, 16, 32]`. `nums` becomes `[1, 2]`.
    - Remove the empty prefix and the suffix `[2, 4, 8, 16, 32]`. `nums` becomes `[1]`.
    - Remove the prefix `[1]` and the suffix `[4, 8, 16, 32]`. `nums` becomes `[2]`.
  - For `x = 1`, the only possible operation is:
    - Remove the empty prefix and the suffix `[2, 4, 8, 16, 32]`. `nums` becomes `[1]`.
  - For `x = 2`, the possible operations are:
    - Remove the empty prefix and the suffix `[4, 8, 16, 32]`. `nums` becomes `[1, 2]`.
    - Remove the prefix `[1]` and the suffix `[4, 8, 16, 32]`. `nums` becomes `[2]`.
  - For `x = 3`, there is no possible way to perform the operation.


**Example 3:**

- **Input:** nums = [1,1,2,1,1], k = 2
- **Output:** [9,6]


**Example 4:**

- **Input:** nums = [5], k = 3
- **Output:** [0,0,1]


**Example 5:**

- **Input:** nums = [1,1,1], k = 5
- **Output:** [0,6,0,0,0]


**Example 6:**

- **Input:** nums = [2,3,4], k = 1
- **Output:** [6]

**Constraints:**

- `1 <= nums[i] <= 10⁹`
- `1 <= nums.length <= 10⁵`
- `1 <= k <= 5`


**Hint:**

1. Use dynamic programming.
2. Define `dp[i][r]` as the count of subarrays ending at index `i` whose product modulo `k` equals `r`.
3. Compute `dp[i][r]` for each index `i` in `nums` and sum over all indices to get the final counts for each remainder.


**Solution:**

We treat every valid operation as choosing exactly one non-empty contiguous subarray to remain after removing a prefix and suffix. We count all such subarrays whose product modulo `k` equals each remainder `x`. This is done with a rolling DP over remainders modulo `k`, since `k <= 5`.

## Approach

- A valid operation is equivalent to selecting a non-empty subarray `nums[l..r]` to keep.
- So the task becomes: count all non-empty contiguous subarrays by `(product of subarray) % k`.
- Process `nums` from left to right.
- Maintain `dp[r]`: number of subarrays ending at the previous index whose product modulo `k` is `r`.
- For the current number `num`, let `m = num % k`.
- New subarrays ending here are:
    - The single-element subarray `[num]`, giving remainder `m`.
    - Every previous subarray extended by `num`, changing remainder from `r` to `(r * m) % k`.
- Accumulate these counts into the final answer array.

Let's implement this solution in PHP: **[3524. Find X Value of Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003524-find-x-value-of-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function resultArray(array $nums, int $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo resultArray([1,2,3,4,5], 3) .  "\n";           // Output: [9,2,4]
echo resultArray([1,2,4,8,16,32], 4) .  "\n";       // Output: [18,1,2,0]
echo resultArray([1,1,2,1,1], 2) .  "\n";           // Output: [9,6]
echo resultArray([5], 3) .  "\n";                   // Output: [0,0,1]
echo resultArray([1,1,1], 5) .  "\n";               // Output: [0,6,0,0,0]
echo resultArray([2,3,4], 1) .  "\n";               // Output: [6]
?>
```

### Explanation:

- Initialize `ans` and `dp` as arrays of size `k` filled with `0`.
- For each `num` in `nums`:
    - Compute `m = num % k`.
    - Create `next` array of size `k` filled with `0`.
    - Add the single-element subarray: `next[m] += 1`.
    - For every remainder `r` from `0` to `k - 1`:
        - If `dp[r] > 0`, extend those subarrays:
            - `next[(r * m) % k] += dp[r]`
    - Add all counts in `next` to `ans`.
    - Set `dp = next`.
- Return `ans`, where `ans[x]` is the number of valid operations giving remainder `x`.

## Complexity Analysis

- **Time Complexity:** `O(n * k)`  
  For each element, we iterate over `k` possible remainders. Since `k <= 5`, this is effectively `O(n)`.
- **Space Complexity:** `O(k)`  
  We only store DP and answer arrays of size `k`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**